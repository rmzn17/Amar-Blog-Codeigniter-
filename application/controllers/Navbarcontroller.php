<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Navbar
 *
 * @author Ramzan
 */
class Navbarcontroller extends CI_Controller {

//start public navigation bar

    public function login() {

        return redirect("Maincontroller/login");
    }

    public function Registration() {
        return redirect("Maincontroller/registration");
    }
    public function About() {
        return redirect("Maincontroller/About");
    }

    public function home() {
        return redirect("Maincontroller");
    }

// end of public navigation bar

    
// start for admin navigation bar
        
    public function Dashboard() {
        return redirect("Admincontroller/Dashboard");
    }

    
    public function Allusers() {
        return redirect("Admincontroller/Allusers");
    }

    public function Allposts() {
        return redirect("Admincontroller/Allposts");
    }

    public function Newpost() {
        return redirect("Admincontroller/Newpost");
    }

//end of admin navigation bar

    
    
// start for user navigation bar
    public function Myposts() {
        return redirect("Usercontroller/Dashboard");
    }

    public function Addpost() {
        return redirect("Usercontroller/Addpost");
    }

    public function Profile() {
        return redirect("Usercontroller/profile");
    }
     public function My_Followers() {
        return redirect("Usercontroller/My_Followers");
    }
     public function My_Message() {
        return redirect("Usercontroller/My_Message");
    }
     public function My_Notifications() {
        return redirect("Usercontroller/My_Notifications");
    }
    
    
    
    //end of user navigation bar

}




