<?php
class Recipt_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getRecipts()
    {
        $query = $this->db->query("SELECT r.id, r.name, r.created_at, f.name as category FROM recipts r INNER JOIN food_categories f ON r.category_id = f.id"); 
        return $query->result_array();
    }

    public function getRecipt($id)
    {
    $query = $this->db->query("SELECT r.id, r.name, r.process, r.ingredients, r.created_at, f.name as category FROM recipts r INNER JOIN food_categories f ON r.category_id = f.id WHERE r.id = {$id}"); 
        return $query->row_array();
    }

    public function addRecipt()
    {
        $this->load->helper('url');

        $data = array(
            'name' => htmlentities($this->input->post('name')),
            'ingredients' => $this->input->post('ingerdients'),
            'process' => htmlentities($this->input->post('process')),
            'category_id' => $this->input->post('category'),
            'user_id' => $this->session->id
        );

        return $this->db->insert('recipts', $data);
    }

    public function deleteRecipt($id)
    {
        $this->db->delete('recipts', array('id' => $id)); 
    }

    public function getReciptsCount()
    {
        return $this->db->count_all('recipts');
    }

    public function getCategories()
    {
        $query = $this->db->query("SELECT * FROM food_categories ORDER BY name"); 
        return $query->result_array();
    }

}