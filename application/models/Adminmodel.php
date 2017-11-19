<?php

/**
 * Description of Authenticate
 *
 * @author Ramzan
 */
class Adminmodel extends CI_Model {

    public function IsAdmin($uname, $pass) {

        $Query = $this->db
                ->where(['Aname' => $uname, 'Apassword' => $pass])
                ->get('Admin');

        if ($Query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Allusers() {
        return $this->db->get('user');
    }

    public function delete_user($uname) {

        return $this->db->delete('user', ['UserName' => $uname]);
    }

    public function userprofile($uname) {
        $Query = $this->db
                ->where(['UserName' => $uname])
                ->get('user');


        return $Query->result();
    }

}
