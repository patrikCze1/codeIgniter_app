<?php
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Login';
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');

        } else {
            $result = $this->user_model->login();
            
            if($result->num_rows() == 1){
                $user = $result->row_array();
                if (password_verify($this->input->post('password'), $user['password'])) {
                    $sessionData = array(
                        'name' => $user['name'],
                        'id' => $user['id']
                    );
                    $this->session->set_userdata($sessionData);
                    redirect('home');
                }
            }
            
            $this->session->set_flashdata('msg', 'Username or password is wrong');
            redirect('user/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('msg', 'Logout successfuly.');
        redirect('user/login');
    }
}