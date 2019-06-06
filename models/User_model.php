<?php
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function login()
    {
        $this->load->helper('url');

        $sql = "SELECT * FROM users WHERE name = ?";
        $query = $this->db->query($sql, array($this->input->post('name')));
           
        return $query;
    }
}