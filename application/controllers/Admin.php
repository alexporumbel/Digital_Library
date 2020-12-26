<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
       $this->load->helper('url');
       $this->load->model('Admin_model');
    }
    
    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/home');
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
                    $_SESSION['admin_rights'] = $result['rights'];
                    $_SESSION['admin_name'] = $result['name'];
                    $this->session->sess_expiration = '1209600';// expires in 30 days
                    $this->session->set_userdata('admin_logged_in', $result['name']);
                    redirect('admin/home');
                } else {
                    echo $this->session->set_flashdata('err_login', 'Wrong email or password!');
                    redirect('admin');
                }
            }
           $this->load->view('admin/login');
        }
        
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }
    

    public function home() {
        $this->login_check();
        $this->load->view('admin/header');
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }

    public function login_check() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->username = $this->session->userdata('admin_logged_in');
    }
    
    public function addstudent() {
        $this->login_check();
         $this->load->view('admin/header');
        $this->load->view('admin/managestudent');
        $this->load->view('admin/footer');
    }

    public function generalsettings(){
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - General';
        if (isset($_POST['submit'])) {
            foreach ($_POST as $key => $val) {
                if ($key !== 'submit') {
                    $this->Admin_model->updateSettingsValues($key, $val);
                }
            }
            redirect('admin/setari-generale');
        }
        $data['value'] = $this->Admin_model->getSettingsValues();
        $this->load->view('admin/header', $head);
        $this->load->view('admin/general-settings', $data);
        $this->load->view('admin/footer');
    }
}
