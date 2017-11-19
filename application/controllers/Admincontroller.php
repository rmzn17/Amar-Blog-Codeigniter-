<?php

/**
 * Description of Form
 *
 * @author Ramzan
 */
class Admincontroller extends CI_Controller {

    public function iamramzanlogin() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('aname', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {


            $uname = $this->input->post('aname');
            $pass = $this->input->post('password');
            $this->load->model('Adminmodel');

            if ($this->Adminmodel->IsAdmin($uname, $pass)) {


                $this->session->set_userdata('aname', $uname);

                return redirect('Admincontroller/Dashboard');
            } else {

                echo '<script language="javascript">';
                echo 'alert("Wrong Username or Password Try Again")';
                echo '</script>';
                $this->load->view('Private/Admin/alogin');
            }
        } else {

            $this->load->view('Private/Admin/alogin');
        }
    }

    public function Logout() {
        $this->session->unset_userdata('aname');
        return redirect("Maincontroller");
    }

    public function Dashboard() {

        if (!$this->session->userdata('aname'))
            return redirect('Maincontroller');
        $this->load->view('Private/Admin/AdminDashboard');
    }

    public function Allusers() {
        if (!$this->session->userdata('aname'))
            return redirect('Maincontroller');

        $this->load->model('Adminmodel');

        $Result['userdata'] = $this->Adminmodel->Allusers();

        $this->load->view('Private/Admin/Allusers', $Result);
    }

    public function Allposts() {
        if (!$this->session->userdata('aname'))
            return redirect('Maincontroller');
        $this->load->view('Private/Admin/Allposts');
    }

    public function Newpost() {
        if (!$this->session->userdata('aname'))
            return redirect('Maincontroller');
        $this->load->view('Private/Admin/Newpost');
    }

    public function user_message($message_user) {


        //$uname =$this->input->get('uname');
        // $uname= $this->input->post('message_user');
        $title = $this->input->post('title');
        echo $message_user;
        echo $title;

        if (!$this->session->userdata('aname'))
            return redirect('Maincontroller');
        $this->load->view('Private/Admin/AdminDashboard');
        
        
    }

    public function user_delete() {


        $uname = $this->input->post('delete_user');

        echo $uname;
        $this->load->model('Adminmodel');

        $status = $this->Adminmodel->delete_user($uname);

        if ($status) {


            return redirect('Navbarcontroller/Allusers');
        } else {


            return redirect('Navbarcontroller/Allusers');
        }
    }

}
