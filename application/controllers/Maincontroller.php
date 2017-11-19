<?php

/**
 * Description of Form
 *
 * @author Ramzan
 */
class Maincontroller extends CI_Controller {

    public function index() {

        $this->load->model('Usermodel');
        //$Allarticles['articles'] = $this->Usermodel->Select_All_Article();
        $Allarticles['articles'] = $this->Usermodel->Select_All_Article();
        $Allarticles['comments'] = $this->Usermodel->Select_All_Comments();
        $this->load->view('Public/Home', $Allarticles);
    }


    public function About()
    {
        $this->load->view('Public/About');
    }

    public function registration() {
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('uname', 'Username', 'trim|required|alpha|is_unique[user.UserName]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric|min_length[6]');
        $this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required|alpha_numeric|min_length[6]|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|exact_length[11]');
        $this->form_validation->set_rules('dob', 'Date of birth', 'trim|required');
        if ($this->form_validation->run()) {
            $users = array();
            $users['FirstName'] = $this->input->post('fname');
            $users['UserName'] = $this->input->post('uname');
            $users['Password'] = $this->input->post('password');
            $users['Email'] = $this->input->post('email');
            $users['Phone'] = $this->input->post('phone');
            $users['Gender'] = $this->input->post('gender');
            $users['DOB'] = $this->input->post('dob');

            $data['raw_name'] = 'DefoultProfile';
            $data['file_ext'] = '.png';


            $image_path = base_url("Uploads/" . $data['raw_name'] . $data['file_ext']);
            ;
            $users['Photo'] = $image_path;

            $users['Joindate'] = date('Y-m-d H:i:s');
            $users['Follower'] = 0;
            $users['Enemy'] = 0;


            $this->load->model('Usermodel');

            $insrt = $this->Usermodel->insert($users);
            if ($insrt) {

/*
                echo '<script language="javascript">';
                echo 'alert("Registration successfull Now Try to login")';
                echo '</script>';
                */

                return redirect('Usercontroller/login');
            } else {

                $this->load->view('Public/registration');
            }
        } else {
            $this->load->view('Public/registration');
        }
    }

    public function login() {

        if ($this->session->userdata('uname')) {
            return redirect('Usercontroller/Dashboard');
        } else {


            $this->load->library('form_validation');
            $this->form_validation->set_rules('uname', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run()) {


                $uname = $this->input->post('uname');
                $pass = $this->input->post('password');
                $this->load->model('Usermodel');

                if ($this->Usermodel->IsUser($uname, $pass)) {


                    $this->session->set_userdata('uname', $uname);

                    return redirect('Usercontroller/Dashboard');
                } else {

                    echo '<script language="javascript">';
                    echo 'alert("Wrong Username or Password Try Again")';
                    echo '</script>';
                    $this->load->view('Public/login');
                }
            } else {

                $this->load->view('Public/login');
            }
        }
    }

    public function iamramzanlogin() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {


            $uname = $this->input->post('uname');
            $pass = $this->input->post('password');
            $this->load->model('Usermodel');

            if ($this->Usermodel->IsUser($uname, $pass)) {


                $this->session->set_userdata('uname', $uname);

                return redirect('Usercontroller/Dashboard');
            } else {

                echo '<script language="javascript">';
                echo 'alert("Wrong Username or Password Try Again")';
                echo '</script>';
                $this->load->view('Public/login');
            }
        } else {

            $this->load->view('Public/login');
        }
    }

}
