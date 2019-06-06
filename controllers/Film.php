<?php
class Film extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('film_model');
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

        $rowCount = $this->film_model->getMyFilmsCount();

        $config['base_url'] = base_url() . '/index.php/film/index';
        $config['total_rows'] = $rowCount;
        $config['per_page'] = 20;

        $config['full_tag_open'] = '<ul class="pagination pagination-lg">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item disabled">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active">';
        $config['cur_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['films'] = $this->film_model->getMyFilms($config['per_page'], $page);
        $data['title'] = 'My Films';
        $data['count'] = $rowCount;
        $data['paginate'] = TRUE;

        $this->load->view('templates/header', $data);
        $this->load->view('films/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id)
    {
        $data['f'] = $this->film_model->getFilm($id);

        if ($data['f']['user_id'] == $this->session->id) {
            $data['title'] = $data['f']['name'];

            $this->load->view('templates/header', $data);
            $this->load->view('films/view', $data);
            $this->load->view('templates/footer');
        } else {
            redirect(film/index);
        }
        
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Add';
        //$data['categories'] = $this->film_model->getCategories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('desc', 'Description', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('films/create', $data);
            $this->load->view('templates/footer');

        } else {
            $this->film_model->addFilm();
            $this->session->set_flashdata('msg', 'Film added.');
            $this->index();
        }
    }

    public function search()
    {        
        $this->load->helper('form');
        $data['films'] = $this->film_model->searchFilms();
        $data['title'] = 'Films';

        $this->load->view('templates/header', $data);
        $this->load->view('films/index', $data);
        $this->load->view('templates/footer');
    }

    public function myFilms()
    {        
        $this->load->helper('form');

        $data['films'] = $this->film_model->getMyFilms();
        
        $data['title'] = 'My films';

        $this->load->view('templates/header', $data);
        $this->load->view('films/index', $data);
        $this->load->view('templates/footer');
    }

    public function random($slug = NULL)
    {
        $data['f'] = $this->film_model->getRandomFilm();

        $data['title'] = $data['f']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('films/view', $data);
        $this->load->view('templates/footer');
    }

    public function order() // todo more general
    {
        $this->load->helper('form');

        $data['films'] = $this->film_model->orderFilms();

        $data['title'] = 'Films';

        $this->load->view('templates/header', $data);
        $this->load->view('films/index', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->load->helper('form');
        $this->film_model->deleteFilm($id);
        $this->session->set_flashdata('msg', 'Film deleted.');
        redirect('film/index');
    }

    public function addToWish($id)
    {
        $this->load->helper('form');
        $this->film_model->addToWish($id);
        $this->session->set_flashdata('msg', 'Film added to your list.');
        redirect('film/index');
    }

    public function getWishes()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['films'] = $this->film_model->getWishes();
        $data['title'] = 'My wished films';
        $data['count'] = count($this->film_model->getWishes());

        $this->load->view('templates/header', $data);
        $this->load->view('films/index', $data);
        $this->load->view('templates/footer');
    }

    public function removeFromWish($id)
    {
        $this->load->helper('form');
        $this->film_model->removeFromWish($id);
        $this->session->set_flashdata('msg', 'Film removed from your list.');
        redirect('film/index');
    }

    public function edit($id)
    {
        $this->load->helper('form');

        $data['f'] = $this->film_model->getFilm($id);
        $data['title'] = 'Edit';

        $this->load->view('templates/header', $data);
        $this->load->view('films/edit', $data);
        $this->load->view('templates/footer');        
    }

    public function updateFilm($id)
    {
        $this->load->helper('form');
        $this->film_model->editFilm($id);
        $this->session->set_flashdata('msg', 'Film updated.');
        redirect('film/index');
    }
}