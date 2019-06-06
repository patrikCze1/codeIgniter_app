<?php

class Pages extends CI_Controller {

    public function home()
    {   
        $this->load->library('session');
        if (!isset($_SESSION['id'])) {
            $this->session->set_flashdata('msg', 'Please login.');
            redirect('user/login');
        }

        $this->load->helper('url_helper');

        $data['title'] = 'Homepage';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }
}