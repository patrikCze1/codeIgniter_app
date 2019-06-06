<?php
class Recipt extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('recipt_model');
        $this->load->helper('url_helper');
        $this->load->library('session');

        if (!isset($_SESSION['id'])) {
            $this->session->set_flashdata('msg', 'Please login.');
            redirect('user/login');
        }
    }

    public function index()
    {
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $rowCount = $this->recipt_model->getReciptsCount();
        
        $data['recipts'] = $this->recipt_model->getRecipts();
        $data['title'] = 'Recipts';
        $data['count'] = $rowCount;
        $data['paginate'] = TRUE;

        $this->load->view('templates/header', $data);
        $this->load->view('recipts/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id)
    {
        $data['r'] = $this->recipt_model->getRecipt($id);

        $data['title'] = $data['r']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('recipts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Add';
        $data['categories'] = $this->recipt_model->getCategories();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('ingerdients', 'Ingerdients', 'required');
        $this->form_validation->set_rules('process', 'Process', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('recipts/create', $data);
            $this->load->view('templates/footer');

        } else {
            $this->recipt_model->addRecipt();
            $this->session->set_flashdata('msg', 'Recipt added.');
            redirect('recipt/index');
        }
    }

    public function delete($id)
    {
        $this->load->helper('form');
        $this->recipt_model->deleteRecipt($id);
        $this->session->set_flashdata('msg', 'Recipt deleted.');
        redirect('recipt/index');
    }
}