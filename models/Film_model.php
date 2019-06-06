<?php
class Film_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function getFilms()
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get_where('films', array('id' => $id));
            return $query->result_array();
        }

        public function getFilm($id)
        {
        $query = $this->db->query("SELECT * FROM films WHERE id = {$id}"); 
                return $query->row_array();
        }

        public function getMyFilms($limit, $start)
        {
                $this->db->limit($limit, $start);
                $userId = $this->session->id;
                $query = $this->db->query("SELECT f.name, f.id, f.user_id, f.score, w.id as wish_id FROM films f LEFT JOIN film_wishes w ON w.film_id = f.id WHERE f.user_id = {$userId} LIMIT {$limit} OFFSET {$start}"); 
                return $query->result_array();
        }

        public function addFilm()
        {
                $this->load->helper('url');

                $data = array(
                        'name' => htmlentities($this->input->post('title')),
                        'desc' => htmlentities($this->input->post('desc')),
                        'score' => $this->input->post('score'),
                        'user_id' => $_SESSION['id']
                );

                return $this->db->insert('films', $data);
        }

        public function searchFilms()
        {
                $this->db->select('*');
                $this->db->from('films');
                $this->db->like('name', $this->input->post('name'));
                $query = $this->db->get();

                return $query->result_array();
        }

        public function getMyFilmsCount()
        {
                $userId = $this->session->id;
                $query = $this->db->query("SELECT * FROM films WHERE user_id = {$userId}"); 
                return $query->num_rows();
        }

        public function getRandomFilm()
        {
                $query = $this->db->query("SELECT * FROM films ORDER BY RAND() LIMIT 1");           
                return $query->row_array();
        }

        public function getCategories()
        {
                $query = $this->db->query("SELECT * FROM categories");           
                return $query->result_array();
        }

        public function orderFilms()
        {
                $this->db->from('films');
                $this->db->order_by("score", "desc");
                $query = $this->db->get(); 
                return $query->result_array();
        }

    public function deleteFilm($id)
    {
        $this->db->delete('film_wishes', array('film_id' => $id, 'user_id' => $this->session->id)); 
        $this->db->delete('films', array('id' => $id)); 
    }

    public function addToWish($id)
        {
                $this->load->helper('url');

                $data = array(
                        'film_id' => $id,
                        'user_id' => $_SESSION['id']
                );

                return $this->db->insert('film_wishes', $data);
        }

        public function getWishes()
        {
                $userId = $this->session->id;
                $query = $this->db->query("SELECT f.name, f.id, f.user_id, f.score, w.id as wish_id FROM films f INNER JOIN film_wishes w ON w.film_id = f.id WHERE f.user_id = {$userId}");          
                return $query->result_array();
        }

        public function removeFromWish($id)
        {
                $this->db->delete('film_wishes', array('id' => $id)); 
        }

        public function editFilm($id)
        {
                $this->load->helper('url');

                $data = array(
                        'name' => htmlentities($this->input->post('title')),
                        'desc' => htmlentities($this->input->post('desc')),
                        'score' => $this->input->post('score'),
                        'user_id' => $_SESSION['id']
                );

                $this->db->where('id',$id);
                return $this->db->update('films', $data);
        }
}