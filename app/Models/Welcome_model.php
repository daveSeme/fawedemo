<?php
class Welcome_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function insert_user($data){
        $this->db->insert('users', $data); 
        return TRUE;
    }

    public function fetch_user(){
        $query=$this->db->query("SELECT *
                                 FROM users
                                 WHERE id = '".$this->session->userdata('user_id')."' ");
        //return $query->result();
        return $query->row(0);
    }
    





}