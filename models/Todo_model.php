<?php
class Todo_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getTodos()
    {
        $query = $this->db->get_where('todos', array('user_id' => $this->session->id, 'active' => 1));
        return $query->result_array();
    }

    public function addTodo()
    {
        $this->load->helper('url');

        $data = array(
            'title' => htmlentities($this->input->post('title')),
            'text' => htmlentities($this->input->post('desc')),
            'user_id' => $_SESSION['id']
        );

        return $this->db->insert('todos', $data);
    }

    public function deleteTodo($id)//set inactive
    {
        $this->db->set('active', 0);
        $this->db->where('id', $id);
        $this->db->update('todos');
    }
}