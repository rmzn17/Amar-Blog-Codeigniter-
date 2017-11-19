<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Ramzan
 */
class Usercontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('uname'))
            return redirect('Maincontroller/login');

        $this->load->model('Usermodel');
    }

    public function login() {

        $this->load->view('Public/login');
    }

    //for search

    public function Search() {



        $query = $this->input->post('query');


        $this->load->helper('form');
        $this->load->model('Usermodel', 'articles');
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url("Usercontroller/Search/$query"),
            'per_page' => 5,
            'total_rows' => $this->articles->count_search_results($query),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "</ul>",
            'first_tag_open' => '<li>',
            'uri_segment' => 4,
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_close' => '</a></li>',
        ];


        $this->pagination->initialize($config);
        $articles = $this->articles->search($query, $config['per_page'], $this->uri->segment(4));
        $this->load->view('Private/User/search_results', compact('articles'));
        //return redirect("Usercontroller/search_results/$query");
    }

//for user homemage 
    public function Dashboard() {
//$uname = $this->session->userdata('uname');
// $data['uname'] = $uname;

        $Allarticles['articles'] = $this->Usermodel->Select_All_Article();
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();


//echo '<pre>';
// print_r($Allarticles);


        $this->load->view('Private/User/UserDashboard', $Allarticles);
    }

//for user profile

    public function Profile() {


        $uname = $this->session->userdata('uname');


        $Allarticles['userinfo'] = $this->Usermodel->specific_userprofile($uname);


        $Allarticles['articles'] = $this->Usermodel->Select_All_Article_specific_user($uname);
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();

        $this->load->view('Private/User/Profile', $Allarticles);
    }

//for user logout
    public function Logout() {
        $this->session->unset_userdata('uname');
        return redirect("Maincontroller");
    }

//for user edit request come from navbar then user details show in editprofile page
    public function Editprofile() {


        $uname = $this->session->userdata('uname');


        $dta = $this->Usermodel->userprofile($uname);

        $data = array();
        foreach ($dta as $col) {

            $data['Fname'] = $col->FirstName;
            $data['uname'] = $col->UserName;
            $data['email'] = $col->Email;
            $data['phone'] = $col->Phone;
            $data['password'] = $col->Password;
            $data['Photo'] = $col->Photo;
        }

        $this->load->view('Private/User/Editprofile', $data);
    }

//for user update with user given value from html form

    public function Updateprofile() {



        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'FirstName', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('password', 'Password', 'trim|alpha_numeric|min_length[6]');
        $this->form_validation->set_rules('conpassword', 'ConfirmPassword', 'trim|required|alpha_numeric|min_length[6]|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trimrequired|valid_email|');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|exact_length[11]');

        $users = array();
        $uname = $this->session->userdata('uname');
        $users['FirstName'] = $this->input->post('fname');
        $users['Password'] = $this->input->post('password');
        $users['Email'] = $this->input->post('email');
        $users['Phone'] = $this->input->post('phone');



        $dta = $this->Usermodel->userprofile($uname);
        foreach ($dta as $col) {

            $users['Gender'] = $col->Gender;
            $users['DOB'] = $col->DOB;
            $users['Joindate'] = $col->Joindate;
        }

        $config['upload_path'] = './Uploads/';
        $config['allowed_types'] = 'jpg|gif|png|jpeg';
        /* $config['max_size'] = 2048000;
          $config['max_width'] = 1024;
          $config['max_height'] = 768;
         */

        $this->load->library('upload', $config);

        $destination = base_url("Uploads/" . $_FILES['image']['name']);
        if ($this->upload->do_upload('image')) {

            $users['Photo'] = $destination;

            $insrt = $this->Usermodel->updateprofile($uname, $users);
        } else {
            $insrt = $this->Usermodel->updateprofile($uname, $users);
        }

        $FullName = array();

        $Fullname['articles_UserFullname'] = $this->input->post('fname');
        $ret = $this->Usermodel->update_article_Name($uname, $Fullname);

        return redirect('Usercontroller/Editprofile');
    }

//for user request come from navbar

    public function Addpost() {
        $this->load->view('Private/User/Newpost');
    }

//for user articles post in database
    public function Article_post() {

        $this->load->library('form_validation');

        $config['upload_path'] = './Article_image/';
        $config['allowed_types'] = 'jpg|gif|png|jpeg';

        $this->load->library('upload', $config);

        $users_post = array();

        $destination = base_url("Article_image/" . $_FILES['image']['name']);

// $this->upload->do_upload('image');


        if ($this->upload->do_upload('image')) {
            $uname = $this->session->userdata('uname');


            $Result = $this->Usermodel->userprofile($uname);

            $fullname = array();

            foreach ($Result as $value) {

                $fullname['fname'] = $value->FirstName;
            }
            $users_post['articles_UserFullname'] = $fullname['fname'];


            $users_post = $this->input->post();
            $users_post['articles_UserName'] = $uname;
            $users_post['articles_UserFullname'] = $fullname['fname'];
            $users_post['articles_Like'] = 0;
            $users_post['articles_Comment'] = 0;
            $users_post['articles_date'] = date('Y-m-d H:i:s');
            $users_post['articles_photo'] = $destination;
// echo '<pre>';
//print_r($users_post);



            $status = $this->Usermodel->post_article($users_post);

            if ($status) {
                return redirect('Usercontroller/Dashboard');
            } else {
                return redirect('Usercontroller/Addpost');
            }
        } else {

            echo '<script language="javascript">';
            echo 'alert("Please Choose Image!! Extension(gif|jpg|png|jpeg)';
            echo '</script>';

            $this->load->view('Private/User/Newpost');
        }
    }

    public function Delete_Article($article_id) {

        $ret = $this->Usermodel->Delete_Article($article_id);

        return redirect('Usercontroller/Dashboard');
    }

    public function Add_Like($article_id) {

        $likes = $this->Usermodel->Count_Like($article_id);

        $liker = $this->session->userdata('uname');


        $rows = $this->Usermodel->Search_if_Already_Liked($article_id, $liker);

        $disliked = $this->Usermodel->Search_if_Already_Disliked($article_id, $liker);

        if ($rows > 0) {

            return redirect('Usercontroller/Dashboard');
        }

        if ($disliked > 0) {

            $Dislikes = $this->Usermodel->Count_Dislike($article_id);


            $Dislike = array();



            foreach ($Dislikes as $col) {

                $tempdislike = $col->articles_Dislike;
            }
            $Dislike['articles_Dislike'] = $tempdislike - 1;

            $Dislikes = $this->Usermodel->update_article($article_id, $Dislike);

            $Dislikes = $this->Usermodel->Delete_Dislike($article_id, $liker);
        }

        $data = array();
        $data['Articles_id'] = $article_id;
        $data['Liker'] = $liker;
        $this->Usermodel->Add_Like($data);



        $like = array();



        foreach ($likes as $col) {

            $templike = $col->articles_Like;
            $username = $col->articles_UserName;
            $article_title = $col->articles_title;
        }
        $like['articles_Like'] = $templike + 1;

        $likes = $this->Usermodel->update_article($article_id, $like);


        $notification = array();
        $notification['To_Username'] = $username;
        $notification['From_Username'] = $liker;
        $notification['Notification'] = "$liker likes your article '$article_title' ";
        $notification['Notification_Time'] = date('Y-m-d H:i:s');
        $notification['Seen'] = 0;

        $this->Usermodel->Add_Notification($notification);
        return redirect('Usercontroller/Dashboard');
    }

    public function Add_Dislike($article_id) {


        $Dislikes = $this->Usermodel->Count_Dislike($article_id);
        $Likes = $this->Usermodel->Count_Like($article_id);

        $Disliker = $this->session->userdata('uname');


        $rows = $this->Usermodel->Search_if_Already_Disliked($article_id, $Disliker);
        $liked = $this->Usermodel->Search_if_Already_Liked($article_id, $Disliker);

        if ($rows > 0) {

            return redirect('Usercontroller/Dashboard');
        }

        if ($liked > 0) {


            $like = array();



            foreach ($Likes as $col) {

                $templike = $col->articles_Like;
                $username = $col->articles_UserName;
                $article_title = $col->articles_title;
            }
            $like['articles_Like'] = $templike - 1;

            $likes = $this->Usermodel->update_article($article_id, $like);
            $Dis = $this->Usermodel->Delete_Like($article_id, $Disliker);
        }


        $data = array();
        $data['Articles_id'] = $article_id;
        $data['Disliker'] = $Disliker;
        $this->Usermodel->Add_Dislike($data);



        $Dislike = array();



        foreach ($Dislikes as $col) {

            $tempdislike = $col->articles_Dislike;
            $username = $col->articles_UserName;
            $article_title = $col->articles_title;
        }
        $Dislike['articles_Dislike'] = $tempdislike + 1;

        $Dislikes = $this->Usermodel->update_article($article_id, $Dislike);


        $notification = array();
        $notification['To_Username'] = $username;
        $notification['From_Username'] = $Disliker;
        $notification['Notification'] = "$Disliker Dislikes your article '$article_title' ";
        $notification['Notification_Time'] = date('Y-m-d H:i:s');
        $notification['Seen'] = 0;

        $this->Usermodel->Add_Notification($notification);
        return redirect('Usercontroller/Dashboard');
    }

    public function view_article() {

        $article_id = $this->input->get('article_id');
        
       // echo $article_id;

        //$this->load->model('Usermodel');
        $Allarticles['articles'] = $this->Usermodel->Select_specific_article($article_id);
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments_specific_article($article_id);

        $this->load->view('Private/User/View_Article', $Allarticles);
    }

//Whene one user want to view other user
    public function user_profile_view() {

        $uname = $this->input->get('uname');

        $user = $this->session->userdata('uname');




//$this->load->model('Usermodel');
        $Allarticles['userinfo'] = $this->Usermodel->specific_userprofile($uname);

//$this->load->model('Usermodel');
        $Allarticles['articles'] = $this->Usermodel->Select_All_Article_specific_user($uname);
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();


        $follow = $this->Usermodel->Search_if_Follower($uname, $user);
        $enemy = $this->Usermodel->Search_if_Enemy($uname, $user);


        if ($uname == $user) {
            $this->load->view('Private/User/Profile', $Allarticles);
        } else if ($follow > 0 && $enemy > 0) {

            $this->load->view('Private/User/User_Profile_Follow_Enemy', $Allarticles);
        } else if ($follow > 0 && $enemy == 0) {

            $this->load->view('Private/User/User_Profile_Following', $Allarticles);
        } else if ($enemy > 0 && $follow <= 0) {
            $this->load->view('Private/User/User_Profile_Enemy', $Allarticles);
        } else {

            $this->load->view('Private/User/User_Profile', $Allarticles);
        }
    }

    public function Follower_Profile_View($uname) {

//$uname = $this->input->get('uname');

        $user = $this->session->userdata('uname');


//$this->load->model('Usermodel');
        $Allarticles['userinfo'] = $this->Usermodel->specific_userprofile($uname);

//$this->load->model('Usermodel');
        $Allarticles['articles'] = $this->Usermodel->Select_All_Article_specific_user($uname);
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();


        $follow = $this->Usermodel->Search_if_Follower($uname, $user);
        $enemy = $this->Usermodel->Search_if_Enemy($uname, $user);


        if ($uname == $user) {
            $this->load->view('Private/User/Profile', $Allarticles);
        } else if ($follow > 0 && $enemy > 0) {

            $this->load->view('Private/User/User_Profile_Follow_Enemy', $Allarticles);
        } else if ($follow > 0 && $enemy == 0) {

            $this->load->view('Private/User/User_Profile_Following', $Allarticles);
        } else if ($enemy > 0 && $follow <= 0) {
            $this->load->view('Private/User/User_Profile_Enemy', $Allarticles);
        } else {

            $this->load->view('Private/User/User_Profile', $Allarticles);
        }
    }

//update followers of a specific user


    public function My_Followers() {

        $uname = $this->session->userdata('uname');
        $user = array();
        $user['userdata'] = $this->Usermodel->My_Follower($uname);

        $this->load->view('Private/User/My_Followers', $user);
    }

    public function Add_follower($victim_name) {

        $want_name = $this->session->userdata('uname');

        $tot_enemy = $this->Usermodel->Count_Enemy($victim_name);

        $tot_follower = $this->Usermodel->Count_Follower($victim_name);

//insert notifications table
        $notification = array();
        $notification['To_Username'] = $victim_name;
        $notification['From_Username'] = $want_name;
        $notification['Notification'] = "$want_name is started following you check your follower list";
        $notification['Notification_Time'] = date('Y-m-d H:i:s');
        $notification['Seen'] = 0;

        $this->Usermodel->Add_Notification($notification);

//insert first follow message   
        $tot_message = $this->Usermodel->Count_Message($victim_name, $want_name);


        if ($tot_message <= 0) {
            $messages = array();

            $messages['To_Username'] = $victim_name;
            $messages['From_Username'] = $want_name;
            $messages['Message'] = 'Lets chat!!';
            $messages['Time'] = date('Y-m-d H:i:s');


            $this->Usermodel->Add_Message($messages);
        }
//insert in follow table

        $data = array();
        $data['Follow_Name'] = $victim_name;
        $data['Follower_Name'] = $want_name;

        $ret = $this->Usermodel->Add_Follower($data);

        $tot_follower++;
        $this->Usermodel->Update_Follower_Enemy($victim_name, $tot_follower, $tot_enemy);

        $realtionship = $this->Usermodel->Search_if_Enemy($victim_name, $want_name);


        $Allarticles['userinfo'] = $this->Usermodel->specific_userprofile($victim_name);


        $Allarticles['articles'] = $this->Usermodel->Select_All_Article_specific_user($victim_name);
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();


        if ($realtionship) {
            $this->load->view('Private/User/User_Profile_Follow_Enemy', $Allarticles);
        } else {
            $this->load->view('Private/User/User_Profile_Following', $Allarticles);
        }
    }

    public function Remove_follower($victim_name) {


        $want_name = $this->session->userdata('uname');

        $tot_enemy = $this->Usermodel->Count_Enemy($victim_name);

        $tot_follower = $this->Usermodel->Count_Follower($victim_name);


//insert in follow table
//$this->load->model('Usermodel');


        $ret = $this->Usermodel->Remove_Follower($victim_name, $want_name);

        $tot_follower--;
        $this->Usermodel->Update_Follower_Enemy($victim_name, $tot_follower, $tot_enemy);



        $realtionship = $this->Usermodel->Search_if_Enemy($victim_name, $want_name);


        $Allarticles['userinfo'] = $this->Usermodel->specific_userprofile($victim_name);

//$this->load->model('Usermodel');
        $Allarticles['articles'] = $this->Usermodel->Select_All_Article_specific_user($victim_name);
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();




        if ($realtionship) {
            $this->load->view('Private/User/User_Profile_Enemy', $Allarticles);
        } else {
            $this->load->view('Private/User/User_Profile', $Allarticles);
        }
    }

    public function Add_enemy($Enemy_Name) {


        $enemy_maker_name = $this->session->userdata('uname');


        $tot_enemy = $this->Usermodel->Count_Enemy($Enemy_Name);

        $tot_follower = $this->Usermodel->Count_Follower($Enemy_Name);

//For Notifications
        $notification = array();
        $notification['To_Username'] = $Enemy_Name;
        $notification['From_Username'] = $enemy_maker_name;
        $notification['Notification'] = "$Enemy_Name, someone adds you his/her enemy list! be carefull :P ";
        $notification['Notification_Time'] = date('Y-m-d H:i:s');
        $notification['Seen'] = 0;

        $this->Usermodel->Add_Notification($notification);


//insert in follow table
        $data = array();
        $data['Enemy_Name'] = $Enemy_Name;
        $data['Enemy_maker_Name'] = $enemy_maker_name;

        $ret = $this->Usermodel->Add_Enemy($data);


        $tot_enemy++;


        $this->Usermodel->Update_Follower_Enemy($Enemy_Name, $tot_follower, $tot_enemy);

        $Allarticles['userinfo'] = $this->Usermodel->specific_userprofile($Enemy_Name);

        $Allarticles['articles'] = $this->Usermodel->Select_All_Article_specific_user($Enemy_Name);

        $realtionship = $this->Usermodel->Search_if_Follower($Enemy_Name, $enemy_maker_name);
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();

        if ($realtionship) {
            $this->load->view('Private/User/User_Profile_Follow_Enemy', $Allarticles);
        } else {
            $this->load->view('Private/User/User_Profile_Enemy', $Allarticles);
        }
    }

    public function Remove_enemy($Enemy_Name) {


        $enemy_maker_name = $this->session->userdata('uname');


        $tot_enemy = $this->Usermodel->Count_Enemy($Enemy_Name);

        $tot_follower = $this->Usermodel->Count_Follower($Enemy_Name);


//insert in follow table


        $ret = $this->Usermodel->Remove_Enemy($Enemy_Name, $enemy_maker_name);


        $tot_enemy--;


        $this->Usermodel->Update_Follower_Enemy($Enemy_Name, $tot_follower, $tot_enemy);

        $Allarticles['userinfo'] = $this->Usermodel->specific_userprofile($Enemy_Name);

        $Allarticles['articles'] = $this->Usermodel->Select_All_Article_specific_user($Enemy_Name);
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();

        $realtionship = $this->Usermodel->Search_if_Follower($Enemy_Name, $enemy_maker_name);

        if ($realtionship) {
            $this->load->view('Private/User/User_Profile_Following', $Allarticles);
        } else {
            $this->load->view('Private/User/User_Profile', $Allarticles);
        }
    }

//Messaging related 


    public function My_Message() {

        $uname = $this->session->userdata('uname');
        $data['messages'] = $this->Usermodel->My_Message($uname);
        $this->load->view('Private/User/My_Message', $data);
    }

    public function Send_Message($to) {
//echo $to;
        $messages = array();
        $uname = $this->session->userdata('uname');
        $messages['To_Username'] = $to;
        $messages['From_Username'] = $uname;
        $messages['Message'] = $this->input->post('message');
        $messages['Time'] = date('Y-m-d H:i:s');


        $this->Usermodel->Add_Message($messages);

        $data['message'] = $this->Usermodel->Chatting($to, $uname);



        $this->load->view('Private/User/Messaging', $data);
    }

    public function Message_User($to) {

        $from = $this->session->userdata('uname');

        $data['message'] = $this->Usermodel->Chatting($to, $from);

//echo '<pre>';
// print_r($data);


        $this->load->view('Private/User/Messaging', $data);
    }

    public function My_Notifications() {


        $uname = $this->session->userdata('uname');
        $data['notifications'] = $this->Usermodel->View_Notification($uname);


        $this->load->view('Private/User/My_Notifications', $data);
    }

    public function Add_Comment() {

        $article_id = $this->input->post('article_id');
        $owner = $this->input->post('owner');
        $comment = $this->input->post('comment');
        $commentator = $this->session->userdata('uname');
        $data = array();

        $data['Articles_id'] = $article_id;
        $data['Commentator'] = $commentator;
        $data['Time'] = date('Y-m-d H:i:s');
        $data['Comment'] = $comment;

        $rep = $this->Usermodel->Add_Comments($data);


        $comments = $this->Usermodel->Count_Comment($article_id);


        $cmt = array();



        foreach ($comments as $col) {

            $tempcmt = $col->articles_Comment;
            $title = $col->articles_title;
        }
        $cmt['articles_Comment'] = $tempcmt + 1;

        $ret = $this->Usermodel->update_article($article_id, $cmt);


        if ($owner != $commentator) {
            $notification = array();
            $notification['To_Username'] = $owner;
            $notification['From_Username'] = $commentator;
            $notification['Notification'] = "$commentator Comment on your article '$title' ";
            $notification['Notification_Time'] = date('Y-m-d H:i:s');
            $notification['Seen'] = 0;

            $this->Usermodel->Add_Notification($notification);
        }
        return redirect('Usercontroller/Dashboard');
    }

}
