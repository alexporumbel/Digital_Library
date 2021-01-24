<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->helper('string'); 
        $this->load->library('SendMail');
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
                    $this->Student_model->createsession($this->session->userdata('uid'), $this->input->ip_address());
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
            $this->sendmail->register($this->input->post('email', TRUE));
        }
    }
 
    function forgot() {
        if ($this->input->is_ajax_request()) {
            $token = random_string('alnum', 36);
            $this->Student_model->changeToken($token, $this->input->post('email', TRUE));
            $this->sendmail->forget($this->input->post('email', TRUE), $token);
        }
    }

    function reset() {
        if ($this->input->is_ajax_request()) {
            $this->Student_model->changePassword($this->input->post('token', TRUE), $this->input->post('password', TRUE));
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

    private function checkfav($arr) {
        $data = array();
        $i = 0;
        foreach ($arr as $publication) {
            $data[$i]['id'] = $publication['id'];
            $data[$i]['year'] = $publication['year'];
            $data[$i]['slug'] = $publication['slug'];
            $data[$i]['fav'] = $this->Student_model->checkfav($publication['id'], $this->session->userdata('uid'));
            $data[$i]['category'] = $publication['category'];
            $data[$i]['discipline'] = $publication['discipline'];
            $data[$i]['name'] = $publication['name'];
            $data[$i]['file'] = $publication['file'];
            $data[$i]['download_rights'] = $publication['download_rights'];
            $data[$i]['subjects'] = $publication['subjects'];
            $data[$i]['subjslugs'] = $publication['subjslugs'];
            $data[$i]['discslug'] = $publication['discslug'];
            $data[$i]['catslug'] = $publication['catslug'];
            $i++;
        }
        return $data;
    }
    
    public function home($page = null) {
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
        if ($page === null) {
            $data['publications'] = $this->checkfav($this->Student_model->getlastpublications(1));
            $data['pagination'] = pagination('home', 1, $this->Student_model->countallpublications());
        } else {
            $data['publications'] = $this->checkfav($this->Student_model->getlastpublications($page));
            $data['pagination'] = pagination('home', $page, $this->Student_model->countallpublications());
        }
        $this->load->view('student/header', $header);
        $this->load->view('student/home', $data);
        $this->load->view('student/footer');
    }

    public function discipline($discipline, $page = null) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        $data['discipline'] = $this->Student_model->getdisciplinefromslug($discipline);
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        if ($page === null) {
            $data['publications'] = $this->Student_model->getbydiscipine($discipline, 1);
            $data['pagination'] = pagination('disciplina', 1, $this->Student_model->countalldisciplines($discipline), $discipline);
        } else {
            $data['publications'] = $this->Student_model->getbydiscipine($discipline, $page);
            $data['pagination'] = pagination('disciplina', $page, $this->Student_model->countalldisciplines($discipline), $discipline);
        }
        $this->load->view('student/header', $header);
        $this->load->view('student/discipline', $data);
        $this->load->view('student/footer');
    }

    public function category($category, $page = null) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();

        $data['category'] = $this->Student_model->getcategoryfromslug($category);
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        if ($page === null) {
            $data['publications'] = $this->Student_model->getbycategory($category, 1);
            $data['pagination'] = pagination('categorie', 1, $this->Student_model->countallcategories($category), $category);
        } else {
            $data['publications'] = $this->Student_model->getbycategory($category, $page);
            $data['pagination'] = pagination('categorie', $page, $this->Student_model->countallcategories($category), $category);
        }
        $this->load->view('student/header', $header);
        $this->load->view('student/category', $data);
        $this->load->view('student/footer');
    }

    public function year($year, $page = null) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        $data['year'] = $year;
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        if ($page === null) {
            if ($year === 'nespecificat') {
                $data['publications'] = $this->Student_model->getbyyear('', 1);
                $data['pagination'] = pagination('an', 1, $this->Student_model->countallyears(''), 'nespecificat');
            } else {
                $data['publications'] = $this->Student_model->getbyyear($year, 1);
                $data['pagination'] = pagination('an', 1, $this->Student_model->countallyears($year), $year);
            }
        } else {
            if ($year === 'nespecificat') {
                $data['publications'] = $this->Student_model->getbyyear('', $page);
                $data['pagination'] = pagination('an', $page, $this->Student_model->countallyears(''), 'nespecificat');
            } else {
                $data['publications'] = $this->Student_model->getbyyear($year, $page);
                $data['pagination'] = pagination('an', $page, $this->Student_model->countallyears($year), $year);
            }
        }
        $this->load->view('student/header', $header);
        $this->load->view('student/year', $data);
        $this->load->view('student/footer');
    }

    public function subject($subject, $page = null) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['years'] = $this->Student_model->yearslist();
        $data['subject'] = $this->Student_model->getsubjectfromslug($subject);
        $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));
        if ($page === null) {
            $data['publications'] = $this->Student_model->getbysubject($subject, 1);
            $data['pagination'] = pagination('subiect', 1, $this->Student_model->countallsubjects($subject), $subject);
        } else {
            $data['publications'] = $this->Student_model->getbysubject($subject, $page);
            $data['pagination'] = pagination('subiect', $page, $this->Student_model->countallsubjects($subject), $subject);
        }
        $this->load->view('student/header', $header);
        $this->load->view('student/subject', $data);
        $this->load->view('student/footer');
    }

    public function favorites($page = null) {
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
        if ($page === null) {
            $data['publications'] = $this->Student_model->getfavorites($this->session->userdata('uid'), 1);
            $data['pagination'] = pagination('favorite', 1, $this->Student_model->countallfavorites($this->session->userdata('uid')));
        } else {
            $data['publications'] = $this->Student_model->getfavorites($this->session->userdata('uid'), $page);
            $data['pagination'] = pagination('favorite', $page, $this->Student_model->countallfavorites($this->session->userdata('uid')));
        }
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
        $this->Student_model->pubview($id, $this->session->userdata('uid'));
        $data['categories'] = $this->Student_model->catlist();
        $data['disciplines'] = $this->Student_model->disclist();
        $data['years'] = $this->Student_model->yearslist();
        $data['subjects'] = $this->Student_model->subjlist();
        $data['publication'] = $this->Student_model->getpublication($id);
        $this->load->view('student/header', $header);
        $this->load->view('student/publication', $data);
        $this->load->view('student/footer');
    }
    
      public function viewrequest($slug) {
        $this->login_check();
        $header = array();
        $header['categories'] = $this->Student_model->catlist();
        $header['disciplines'] = $this->Student_model->disclist();
        $data = array();
        $data['reqpublication'] = $this->Student_model->getreqpublication($slug); 
        $this->load->view('student/header', $header);
        $this->load->view('student/viewrequest', $data);
        $this->load->view('student/footer');
    }

    public function startsearch() {
        $this->login_check();
        if ($_POST) {
            $searcharr = array('category' => $this->input->post('category', TRUE), 'discipline' => $this->input->post('discipline', TRUE), 'year' => $this->input->post('year', TRUE), 'search' => $this->input->post('search', TRUE));
            $this->session->set_userdata('searchdata', $searcharr);
            redirect('cauta');
        }
    }

    public function search($page = null) {
        $this->login_check();
        if ($this->session->userdata('searchdata')) {
            $searchdata = $this->session->userdata('searchdata');
            $header = array();
            $header['categories'] = $this->Student_model->catlist();
            $header['disciplines'] = $this->Student_model->disclist();
            $data = array();
            $data['categories'] = $this->Student_model->catlist();
            $data['disciplines'] = $this->Student_model->disclist();
            $data['years'] = $this->Student_model->yearslist();
            $data['subjects'] = $this->Student_model->subjlist();
            $data['search'] = $searchdata['search'];
            $data['favcount'] = $this->Student_model->favcount($this->session->userdata('uid'));

            if ($page === null) {
                $data['publications'] = $this->Student_model->search($searchdata['category'], $searchdata['discipline'], $searchdata['year'], $searchdata['search'], 1);
                $data['pagination'] = pagination('cauta', 1, $this->Student_model->countallsearch($searchdata['category'], $searchdata['discipline'], $searchdata['year'], $searchdata['search']));
            } else {
                $data['publications'] = $this->Student_model->search($searchdata['category'], $searchdata['discipline'], $searchdata['year'], $searchdata['search'], $page);
                $data['pagination'] = pagination('cauta', $page, $this->Student_model->countallsearch($searchdata['category'], $searchdata['discipline'], $searchdata['year'], $searchdata['search']));
            }
            $this->load->view('student/header', $header);
            $this->load->view('student/search', $data);
            $this->load->view('student/footer');
        } else {
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

    function download($id) {
        $this->Student_model->download($id, $this->session->userdata('uid'));
        $pub = $this->Student_model->getpublication($id);
        if ($pub['download_rights'] > 0) {
            force_download('./uploads/' . $pub['file'], NULL);
        }
    }

    function logactivity() {
        if ($this->input->is_ajax_request()) {
            echo $this->session->userdata('uid');
            $this->Student_model->addsessionduration($this->session->userdata('uid'));
        }
    }

}
