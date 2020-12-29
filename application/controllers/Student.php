<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->model('Student_model');
    }

    public function index() {
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Login';
        $head['description'] = '';
        $head['keywords'] = '';
        if ($this->session->userdata('logged_in')) {
            redirect('home');
        } else {
            $this->form_validation->set_rules('email', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run($this)) {
                $email = $this->input->post('email', TRUE);
                $password = md5($this->input->post('password', TRUE));
                $result = $this->Student_model->loginCheck($email, $password);
                if (!empty($result)) {
                    $_SESSION['email'] = $result['email'];
                    $this->session->sess_expiration = '1209600'; // expires in 30 days
                    $this->session->set_userdata('logged_in', $result['email']);
                    $this->session->set_userdata('name', $result['name'] . ' ' . $result['fathers_initial'] . '. ' . $result['lname']);
                    $this->session->set_userdata('uid', $result['id']);
                    // $this->session->set_userdata('new_expiration',1209600); //2 weeks
//$this->session->sess_update(); //force the session to update the cookie and/or database

                    redirect('home');
                } else {
                    $this->session->set_flashdata('err_login', 'Date de logare incorecte!');
                    redirect('/');
                }
            }
            $this->load->view('index');
        }
    }

    function register() {
        if ($this->input->is_ajax_request()) {
            $values = array(
                'name' => $this->input->post('nume', TRUE),
                'fathers_initial' => $this->input->post('initiala', TRUE),
                'lname' => $this->input->post('prenume', TRUE),
                'faculty' => $this->input->post('facultate', TRUE),
                'year' => $this->input->post('an', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => md5($this->input->post('parola', TRUE)),
                'account_status' => 0,
                'created_at' => time()
            );
            $this->Student_model->register($values);
        }
    }

    function forgot() {
        if ($this->input->is_ajax_request()) {
            $token = random_string('alnum', 36);
            $this->Student_model->changeToken($token, $this->input->post('email', TRUE));
            //$this->sendmail->clientPasswordReset($this->input->post('email', TRUE));
        }
    }

    function reset() {
        if ($this->input->is_ajax_request()) {
            $this->Public_model->changePassword($this->input->post('token', TRUE), $this->input->post('password', TRUE));
        }
    }

    function login_check() {
        if (!$this->session->userdata('logged_in')) {
            redirect('/');
        }
        $this->username = $this->session->userdata('logged_in');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }

    public function home() {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        $data['publications'] = $this->Student_model->getlastpublications();
        $this->load->view('student/header', $header);
        $this->load->view('student/home', $data);
        $this->load->view('student/footer');
    }
    
    public function discipline($discipline) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        $data['publications'] = $this->Student_model->getbydiscipine($discipline);
        $data['discipline'] = $this->Student_model->getdisciplinefromslug($discipline);
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        $this->load->view('student/header', $header);
        $this->load->view('student/discipline', $data);
        $this->load->view('student/footer');
    }
    
    public function category($category) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        $data['publications'] = $this->Student_model->getbycategory($category);
        $data['category'] = $this->Student_model->getcategoryfromslug($category);
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        $this->load->view('student/header', $header);
        $this->load->view('student/category', $data);
        $this->load->view('student/footer');
    }
    
        public function year($year) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        if($year==='nespecificat'){
        $data['publications'] = $this->Student_model->getbyyear('');
        }else{
            $data['publications'] = $this->Student_model->getbyyear($year);
        }
        $data['year'] = $year;
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        $this->load->view('student/header', $header);
        $this->load->view('student/year', $data); 
        $this->load->view('student/footer');
    }
    
    public function subject($subject) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        $data['publications'] = $this->Student_model->getbysubject($subject);
        $data['subject'] = $this->Student_model->getsubjectfromslug($subject);
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        $this->load->view('student/header', $header);
        $this->load->view('student/subject', $data);
        $this->load->view('student/footer');
    }
    
    public function favorites() {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        $data['publications'] = $this->Student_model->getfavorites($this->session->userdata('uid'));
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        $this->load->view('student/header', $header);
        $this->load->view('student/favorites', $data);
        $this->load->view('student/footer');
    }
    
    public function publication($id) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['years'] = $this->Student_model->yearslist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['publication'] = $this->Student_model->getpublication($id);
        $this->load->view('student/header', $header);
        $this->load->view('student/publication', $data);
        $this->load->view('student/footer');
    }

    function search() {
            $this->login_check();
            if ($_POST) {
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['years'] = $this->Student_model->yearslist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['search'] = $this->input->post('search', TRUE);
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        $data['publications'] = $this->Student_model->search($this->input->post('category', TRUE), $this->input->post('discipline', TRUE), $this->input->post('year', TRUE), $this->input->post('search', TRUE));
        $this->load->view('student/header', $header);
        $this->load->view('student/search', $data);
        $this->load->view('student/footer');
            }else{
                redirect('/');
            }
    }
    
    function addtofav() {
        if ($this->input->is_ajax_request()) {
            $this->Student_model->addtofav($this->input->post('pubid', TRUE), $this->session->userdata('uid'));
        }
    }
    
    function unfav() {
        if ($this->input->is_ajax_request()) {
            $this->Student_model->unfav($this->input->post('pubid', TRUE), $this->session->userdata('uid'));
        }
    }
    
     function request() {
        if ($this->input->is_ajax_request()) {
            $this->Student_model->request($this->input->post('subiect', TRUE), $this->input->post('mesaj', TRUE), $this->session->userdata('uid'));
        }
    }
    
    function download($id){
        $this->Student_model->download($id, $this->session->userdata('uid'));
        $pub = $this->Student_model->getpublication($id);
        if($pub['download_rights'] > 0){
            force_download('./uploads/' . $pub['file'], NULL);
        }
    }
}
