<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

   public function __construct() {
        parent::__construct();
       $this->load->helper('url');
    }
    
    public function index()
    {
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
                $email = $this->input->post('email',TRUE);
                $password = md5($this->input->post('password',TRUE));
                $result = $this->Admin_model->loginCheck($email, $password);
                if (!empty($result)) {
                    $_SESSION['last_login'] = $result['last_login'];
                    $_SESSION['admin_email'] = $result['email'];
                    $this->session->sess_expiration = '1209600';// expires in 30 days
                    $this->session->set_userdata('logged_in', $result['username']);
                   // $this->session->set_userdata('new_expiration',1209600); //2 weeks
//$this->session->sess_update(); //force the session to update the cookie and/or database
                    
                    $this->saveHistory('User ' . $result['username'] . ' logged in');
                    redirect('admin/home');
                } else {
                    $this->session->set_flashdata('err_login', 'Wrong username or password!');
                    redirect('admin');
                }
            }
            $this->load->view('index');
        }
    }

    function login_check() {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin');
        }
        $this->username = $this->session->userdata('logged_in');
    }

}
