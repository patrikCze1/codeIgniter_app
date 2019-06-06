<?php
class Todo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('todo_model');
        $this->load->helper('url_helper');
        $this->load->library('session');

        if (!isset($_SESSION['id'])) {
            $this->session->set_flashdata('msg', 'Please login.');
            redirect('user/login');
        }
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['todos'] = $this->todo_model->getTodos();
        $data['title'] = 'My todos';

        $this->load->view('templates/header', $data);
        $this->load->view('todos/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('desc', 'Description', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('todos/index');
            $this->load->view('templates/footer');

        } else {
            $this->todo_model->addTodo();
            $this->session->set_flashdata('msg', 'Todo added.');
            redirect('todo/index');
        }
    }

    public function delete($id)//update
    {
        $this->load->helper('form');
        $this->todo_model->deleteTodo($id);
        $this->session->set_flashdata('msg', 'Todo deleted.');
        redirect('todo/index');
    }
}