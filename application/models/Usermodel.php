<?php

/**
 * Description of Authenticate
 *
 * @author Ramzan
 */
class Usermodel extends CI_Model {

    public function IsUser($uname, $pass) {

        $Query = $this->db
                ->where(['UserName' => $uname, 'Password' => $pass])
                ->get('user');

        if ($Query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function search($query, $limit, $offset) {
        $q = $this->db->from('articles')
                ->like('articles_title', $query)
                ->limit($limit, $offset)
                ->get();
        return $q->result();
    }

    public function count_search_results($query) {
        $q = $this->db->from('articles')
                ->like('articles_title', $query)
                ->get();
        return $q->num_rows();
    }

    public function insert($users) {

        if ($this->db->insert('user', $users))
            return true;
        else
            return false;
    }

    public function userprofile($uname) {
        $Query = $this->db
                ->where(['UserName' => $uname])
                ->get('user');


        return $Query->result();
    }

    public function updateprofile($uname, $users) {

        // print_r($users);

        return $this->db
                        ->where('UserName', $uname)
                        ->update('user', $users);
    }

    public function specific_userprofile($uname) {
        return $this->db
                        ->where(['UserName' => $uname])
                        ->get('user');
    }

    public function post_article($users_post) {

        if ($this->db->insert('articles', $users_post))
            return true;
        else
            return false;
    }

    public function update_article($articles_id, $change) {

        return $this->db
                        ->where('articles_id', $articles_id)
                        ->update('articles', $change);
    }

    public function update_article_Name($name, $change) {

        return $this->db
                        ->where('articles_UserName', $name)
                        ->update('articles', $change);
    }

    public function Delete_Article($article_id) {

        $this->db
                ->where(['Articles_id' => $article_id])
                ->delete('article_dislike');
        $this->db
                ->where(['Articles_id' => $article_id])
                ->delete('article_like');
        $this->db
                ->where(['Articles_id' => $article_id])
                ->delete('comments');
        return $this->db
                        ->where(['articles_id' => $article_id])
                        ->delete('articles');
    }

    public function Select_All_Article() {

        return $this->db
                        ->order_by('articles_id', 'DESC')
                        ->get('articles');
    }

    public function Select_specific_article($article_id) {
        return $this->db
                        //->where(['articles_id' => $article_id])
                        ->where('articles_id', $article_id)
                        ->get('articles');
    }

    public function Select_All_Article_specific_user($uname) {

        return $this->db
                        ->where('articles_UserName', $uname)
                        ->get('articles');
    }

    public function Count_Like($article_id) {
        $this->db->select('articles_Like,articles_UserName,articles_title');
        $this->db->from('articles');
        $this->db->where('articles_id', $article_id);
        return $this->db->get()->result();
    }

    public function Delete_Like($article_id, $username) {
        return $this->db
                        ->where(['Articles_id' => $article_id])
                        ->where(['Liker' => $username])
                        ->delete('article_like');
    }

    public function Search_if_Already_Liked($article_id, $username) {

        $query = $this->db
                ->where(['Articles_id' => $article_id])
                ->where(['Liker' => $username])
                ->get('article_like');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function Add_Like($data) {
        if ($this->db->insert('article_like', $data))
            return true;
        else
            return false;
    }

    public function Count_Dislike($article_id) {
        $this->db->select('articles_Dislike,articles_UserName,articles_title');
        $this->db->from('articles');
        $this->db->where('articles_id', $article_id);
        return $this->db->get()->result();
    }

    public function Delete_Dislike($article_id, $username) {
        return $this->db
                        ->where(['Articles_id' => $article_id])
                        ->where(['Disliker' => $username])
                        ->delete('article_dislike');
    }

    public function Search_if_Already_Disliked($article_id, $username) {

        $query = $this->db
                ->where(['Articles_id' => $article_id])
                ->where(['Disliker' => $username])
                ->get('article_dislike');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function Add_Dislike($data) {
        if ($this->db->insert('article_dislike', $data))
            return true;
        else
            return false;
    }

    //For all following operations

    public function Add_Follower($data) {

        if ($this->db->insert('follow', $data))
            return true;
        else
            return false;
    }

    public function My_Follower($uname) {
        return $this->db
                        ->where(['Follow_Name' => $uname])
                        ->get('follow');
    }

    public function Update_Follower_Enemy($uname, $Follower, $enemy) {

        return $this->db->set('Follower', $Follower)
                        ->set('Enemy', $enemy)
                        ->where('UserName', $uname)
                        ->update('user');
    }

    public function Search_if_Follower($victim_name, $want_name) {
        $query = $this->db
                ->where(['Follow_Name' => $victim_name])
                ->where(['Follower_Name' => $want_name])
                ->get('follow');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function Count_Follower($victim_name) {
        $query = $this->db
                ->where(['Follow_Name' => $victim_name])
                ->get('follow');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function Remove_Follower($victim_name, $want_name) {
        return $this->db
                        ->where(['Follow_Name' => $victim_name])
                        ->where(['Follower_Name' => $want_name])
                        ->delete('follow');
    }

    //End of Followers Operations
//For All Enemy Operations
    public function Add_Enemy($data) {

        if ($this->db->insert('enemy', $data))
            return true;
        else
            return false;
    }

    public function Search_if_Enemy($victim_name, $want_name) {
        $query = $this->db
                ->where(['Enemy_Name' => $victim_name])
                ->where(['Enemy_maker_Name' => $want_name])
                ->get('enemy');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function Count_Enemy($victim_name) {
        $query = $this->db
                ->where(['Enemy_Name' => $victim_name])
                ->get('enemy');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function Remove_Enemy($victim_name, $want_name) {
        return $this->db
                        ->where(['Enemy_Name' => $victim_name])
                        ->where(['Enemy_maker_Name' => $want_name])
                        ->delete('enemy');
    }

    //End of Enemy Operations
    //For Notifications section

    public function Add_Notification($notification) {
        if ($this->db->insert('notifications', $notification))
            return true;
        else
            return false;
    }

    public function View_Notification($uname) {
        $query = $this->db
                ->where(['To_Username' => $uname])
                ->order_by('Notification_id', 'DESC')
                ->get('notifications');
        $this->db
                ->set('Seen', 1)
                ->where(['To_Username' => $uname])
                ->update('notifications');
        return $query;
    }

    public function Count_Notification($uname) {
        $query = $this->db
                ->where(['To_Username' => $uname])
                ->get('notifications');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    //for messaging 
    public function Chatting($to, $from) {
        $query = $this->db
                ->where(['To_Username' => $to])
                ->where(['From_Username' => $from])
                ->or_where(['To_Username' => $from])
                ->where(['From_Username' => $to])
                ->get('message');


        $message = $query->result_array();

        foreach ($message as $key => $item) {
            $message [$key]['to'] = $to;
        }

        return $message;
    }

    public function Add_Message($messages) {


        if ($this->db->insert('message', $messages))
            return true;
        else
            return false;
    }

    public function My_Message($uname) {

        $query = $this->db
                ->order_by('Message_id', 'DESC')
                ->where(['To_Username' => $uname])
                ->or_where(['From_Username' => $uname])
                ->get('message');
        return $query;
    }

    public function Count_Message($to, $from) {
        $query = $this->db
                ->where(['To_Username' => $to])
                ->where(['From_Username' => $from])
                ->or_where(['To_Username' => $from])
                ->where(['From_Username' => $to])
                ->get('message');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    //for comment

    public function Add_Comments($comment) {


        if ($this->db->insert('comments', $comment))
            return true;
        else
            return false;
    }

    public function Select_All_Comments() {

        return $this->db
                        ->order_by('id', 'DESC')
                        ->get('comments');
    }

    public function Select_All_Comments_specific_article($article_id) {

        return $this->db
                        ->order_by('id', 'DESC')
                        ->where(['Articles_id' => $article_id])
                        ->get('comments');
    }

    public function Count_Comment($article_id) {
        $this->db->select('articles_Comment,articles_UserName,articles_title');
        $this->db->from('articles');
        $this->db->where('articles_id', $article_id);
        return $this->db->get()->result();
    }

}
