<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('string');
        $this->load->model('Admin_model');
    }

    protected function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/home');
        } else {
            $this->form_validation->set_rules('email', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run($this)) {
                $email = $this->input->post('email', TRUE);
                $password = md5($this->input->post('password', TRUE));
                $result = $this->Admin_model->loginCheck($email, $password);
                if (!empty($result)) {
                    $_SESSION['last_login'] = $result['last_login'];
                    $_SESSION['admin_email'] = $result['email'];
                    $_SESSION['admin_rights'] = $result['rights'];
                    $_SESSION['admin_name'] = $result['name'];
                    $this->session->sess_expiration = '1209600'; // expires in 30 days
                    $this->session->set_userdata('admin_logged_in', $result['name']);
                    $this->session->set_userdata('admin_id', $result['id']);
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
        $header = array();
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/home');
        $this->load->view('admin/footer');
    }

    public function login_check() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
        $this->username = $this->session->userdata('admin_logged_in');
    }

    public function managestudent($id = null) {
        $this->login_check();
        if ($_POST) {
            $this->form_validation->set_rules('nume', 'Nume', 'trim|required');
            $this->form_validation->set_rules('initiala', 'Initiala', 'trim|required');
            $this->form_validation->set_rules('prenume', 'Prenume', 'trim|required');
            $this->form_validation->set_rules('facultate', 'Facultate', 'trim|required');
            $this->form_validation->set_rules('an', 'An', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            if ($id === NULL) {
                $this->form_validation->set_rules('parola', 'Parola', 'trim|required');
            }
            if ($this->form_validation->run($this)) {
                if ($this->input->post('parola', TRUE) !== '') {
                    $data = array('name' => $this->input->post('nume', TRUE),
                        'fathers_initial' => $this->input->post('initiala', TRUE),
                        'lname' => $this->input->post('prenume', TRUE),
                        'faculty' => $this->input->post('facultate', TRUE),
                        'year' => $this->input->post('an', TRUE),
                        'email' => $this->input->post('email', TRUE),
                        'password' => md5($this->input->post('parola', TRUE)),
                        'remember_token' => '',
                        'account_status' => 1
                    );
                } else {
                    $data = array('name' => $this->input->post('nume', TRUE),
                        'fathers_initial' => $this->input->post('initiala', TRUE),
                        'lname' => $this->input->post('prenume', TRUE),
                        'faculty' => $this->input->post('facultate', TRUE),
                        'year' => $this->input->post('an', TRUE),
                        'email' => $this->input->post('email', TRUE),
                        'remember_token' => '',
                        'account_status' => 1
                    );
                }
                if ($id === NULL) {
                    $resp = $this->Admin_model->managestudent($data);
                } else {
                    $resp = $this->Admin_model->managestudent($data, $id);
                }
                redirect('admin/management-studenti');
            } else {
                $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
                $data['formerror'] = 'Nu ai completat toate campurile obligatorii!';
                $this->load->view('admin/header', $header);
                if ($id === NULL) {
                    $this->load->view('admin/managestudent', $data);
                } else {
                    $data['id'] = $id;
                    $data['studentdata'] = $this->Admin_model->getstudent($id);
                    $this->load->view('admin/managestudent', $data);
                }
                $this->load->view('admin/footer');
            }
        } else {
            $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
            $this->load->view('admin/header', $header);
            if ($id === NULL) {
                $this->load->view('admin/managestudent');
            } else {
                $data['id'] = $id;
                $data['studentdata'] = $this->Admin_model->getstudent($id);
                $this->load->view('admin/managestudent', $data);
            }
            $this->load->view('admin/footer');
        }
    }

    public function managestudents() {
        $this->login_check();
        $data = array();
        $data['students'] = $this->Admin_model->getstudents();
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/managestudents', $data);
        $this->load->view('admin/footer');
    }

    public function managedisciplines() {
        $this->login_check();
        $data = array();
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $data['disciplines'] = $this->Admin_model->getdisciplines();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/managedisciplines', $data);
        $this->load->view('admin/footer');
    }

    public function managediscipline($id = null) {
        $this->login_check();
        if ($_POST) {
            $this->form_validation->set_rules('disciplina', 'Disciplina', 'trim|required');
            if ($this->form_validation->run($this)) {
                $data = array('discipline' => $this->input->post('disciplina', TRUE),
                    'slug' => $this->slugify($this->input->post('disciplina', TRUE))
                );
                if ($id === NULL) {
                    $resp = $this->Admin_model->managediscipline($data);
                } else {
                    $resp = $this->Admin_model->managediscipline($data, $id);
                }
                redirect('admin/management-discipline');
            } else {
                $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
                $data['formerror'] = 'Nu ai completat toate campurile obligatorii!';
                $this->load->view('admin/header', $header);
                if ($id === NULL) {
                    $this->load->view('admin/managediscipline', $data);
                } else {
                    $data['id'] = $id;
                    $data['disciplinedata'] = $this->Admin_model->getdiscipline($id);
                    $this->load->view('admin/managediscipline', $data);
                }
                $this->load->view('admin/footer');
            }
        } else {
            $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
            $this->load->view('admin/header', $header);
            if ($id === NULL) {
                $this->load->view('admin/managediscipline');
            } else {
                $data['id'] = $id;
                $data['disciplinedata'] = $this->Admin_model->getdiscipline($id);
                $this->load->view('admin/managediscipline', $data);
            }
            $this->load->view('admin/footer');
        }
    }

    public function managecategories() {
        $this->login_check();
        $data = array();
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $data['categories'] = $this->Admin_model->getcategories();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/managecategories', $data);
        $this->load->view('admin/footer');
    }

    public function managecategory($id = null) {
        $this->login_check();
        if ($_POST) {
            $this->form_validation->set_rules('categorie', 'Categorie', 'trim|required');
            if ($this->form_validation->run($this)) {
                $data = array('category' => $this->input->post('categorie', TRUE),
                    'slug' => $this->slugify($this->input->post('categorie', TRUE))
                );
                if ($id === NULL) {
                    $resp = $this->Admin_model->managecategory($data);
                } else {
                    $resp = $this->Admin_model->managecategory($data, $id);
                }
                redirect('admin/management-categorii');
            } else {
                $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
                $data['formerror'] = 'Nu ai completat toate campurile obligatorii!';
                $this->load->view('admin/header', $header);
                if ($id === NULL) {
                    $this->load->view('admin/managecategory', $data);
                } else {
                    $data['id'] = $id;
                    $data['categorydata'] = $this->Admin_model->getcategory($id);
                    $this->load->view('admin/managecategory', $data);
                }
                $this->load->view('admin/footer');
            }
        } else {
            $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
            $this->load->view('admin/header', $header);
            if ($id === NULL) {
                $this->load->view('admin/managecategory');
            } else {
                $data['id'] = $id;
                $data['categorydata'] = $this->Admin_model->getcategory($id);
                $this->load->view('admin/managecategory', $data);
            }
            $this->load->view('admin/footer');
        }
    }

    public function unconfirmedstudents() {
        $this->login_check();
        $data = array();
        $data['students'] = $this->Admin_model->getunconfirmedstudents();
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/unconfirmedstudents', $data);
        $this->load->view('admin/footer');
    }

    public function changestudentstate($id) {
        if ($this->input->is_ajax_request()) {
            $response = array('response' => 'success');
            $this->Admin_model->changeStudentStatus($id, $_POST['state']);
            echo json_encode($response);
            exit();
        }
    }

    public function generalsettings() {
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
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/general-settings', $data);
        $this->load->view('admin/footer');
    }

    public function managestaffaccs() {
        $this->login_check();
        $data = array();
        $data['accounts'] = $this->Admin_model->getstaffaccs();
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/manageaccounts', $data);
        $this->load->view('admin/footer');
    }

    public function managerequests() {
        $this->login_check();
        $data = array();
        $data['requests'] = $this->Admin_model->getrequests();
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/managerequests', $data);
        $this->load->view('admin/footer');
    }

    public function managerequest($id) {
        $this->login_check();
        if ($_POST) {
            $config = array();
            $config['upload_path'] = './uploads'; //file save path
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 100000;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!is_dir('./uploads')) {
                @mkdir('./uploads', 0777, true);
            }
            if (!$this->upload->do_upload('respfile')) {
                if ($this->input->post('mesaj', TRUE) !== '') {
                    $dbdata = array('rid' => $id,
                        'aid' => $this->session->userdata('admin_id'),
                        'response' => $this->input->post('mesaj', TRUE),
                        'file' => '',
                        'original_file' => '',
                        'slug' => random_string('alnum', 16),
                        'timestamp' => time()
                    );
                    $resp = $this->Admin_model->managerequest($dbdata);
                    redirect('admin/solicitari-publicatii');
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
                    $this->load->view('admin/header', $header);
                    $data['formerror'] = 'Pentru a trimite un raspuns solicitarii este necesar sa completezi un mesaj sau sa incarci un fisier';
                    $data['request'] = $this->Admin_model->getrequest($id);
                    $this->load->view('admin/managerequest', $data);
                    $this->load->view('admin/footer');
                }
            } else {
                $data = array('upload_data' => $this->upload->data());
                $dbdata = array('rid' => $id,
                    'aid' => $this->session->userdata('admin_id'),
                    'response' => $this->input->post('mesaj', TRUE),
                    'file' => $data['upload_data']['file_name'],
                    'original_file' => $data['upload_data']['orig_name'],
                    'slug' => random_string('alnum', 16),
                    'timestamp' => time()
                );
                $resp = $this->Admin_model->managerequest($dbdata);
                redirect('admin/solicitari-publicatii');
            }
        } else {
            $data = array();
            $data['request'] = $this->Admin_model->getrequest($id);
            $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
            $this->load->view('admin/header', $header);
            $this->load->view('admin/managerequest', $data);
            $this->load->view('admin/footer');
        }
    }

    public function managestaff($id = null) {
        $this->login_check();
        if ($_POST) {
            $this->form_validation->set_rules('nume', 'Nume', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            if ($id === NULL) {
                $this->form_validation->set_rules('parola', 'Parola', 'trim|required');
            }
            if ($this->form_validation->run($this)) {
                if ($this->input->post('parola', TRUE) !== '') {
                    $data = array('name' => $this->input->post('nume', TRUE),
                        'email' => $this->input->post('email', TRUE),
                        'password' => md5($this->input->post('parola', TRUE)),
                        'remember_token' => '',
                        'account_status' => 1
                    );
                } else {
                    $data = array('name' => $this->input->post('nume', TRUE),
                        'email' => $this->input->post('email', TRUE),
                        'remember_token' => '',
                        'account_status' => 1
                    );
                }
                if ($id === NULL) {
                    $resp = $this->Admin_model->managestaff($data);
                } else {
                    $resp = $this->Admin_model->managestaff($data, $id);
                }
                redirect('admin/management-staff');
            } else {
                $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
                $data['formerror'] = 'Nu ai completat toate campurile obligatorii!';
                $this->load->view('admin/header', $header);
                if ($id === NULL) {
                    $this->load->view('admin/managestaff', $data);
                } else {
                    $data['id'] = $id;
                    $data['staffdata'] = $this->Admin_model->getstaffacc($id);
                    $this->load->view('admin/managestaff', $data);
                }
                $this->load->view('admin/footer');
            }
        } else {
            $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
            $this->load->view('admin/header', $header);
            if ($id === NULL) {
                $this->load->view('admin/managestaff');
            } else {
                $data['id'] = $id;
                $data['staffdata'] = $this->Admin_model->getstaffacc($id);
                $this->load->view('admin/managestaff', $data);
            }
            $this->load->view('admin/footer');
        }
    }

    public function managepublications() {
        $this->login_check();
        $data = array();
        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
        $data['publications'] = $this->Admin_model->getpublications();
        $this->load->view('admin/header', $header);
        $this->load->view('admin/managepublications', $data);
        $this->load->view('admin/footer');
    }

    public function managepublication($id = null) {
        $this->login_check();
        if ($_POST) {
            $this->form_validation->set_rules('publication', 'Publicatie', 'trim|required');
            $this->form_validation->set_rules('subjects[]', 'Subiecte', 'trim|required');
            $this->form_validation->set_rules('category', 'Categorie', 'trim|required');
            $this->form_validation->set_rules('discipline', 'Disciplina', 'trim|required');
            if ($this->form_validation->run($this)) {
                $config = array();
                $config['upload_path'] = './uploads'; //file save path
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 100000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!is_dir('./uploads')) {
                    @mkdir('./uploads', 0777, true);
                }

                if ($id === NULL) {
                    if (!$this->upload->do_upload('userfile')) {
                        $error = array('error' => $this->upload->display_errors());

                        $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
                        $this->load->view('admin/header', $header);
                        $data['categories'] = $this->Admin_model->getcategories();
                        $data['disciplines'] = $this->Admin_model->getdisciplines();
                        $data['allsubjects'] = $this->Admin_model->gettags();
                        $data['formerror'] = $error['error'];
                        $this->load->view('admin/managepublication', $data);
                        $this->load->view('admin/footer');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $dbdata = array('name' => $this->input->post('publication', TRUE),
                            'subjects' => $this->input->post('subjects', TRUE),
                            'catid' => $this->input->post('category', TRUE),
                            'discid' => $this->input->post('discipline', TRUE),
                            'year' => $this->input->post('year', TRUE),
                            'download_rights' => $this->input->post('downloadrights', TRUE),
                            'file' => $data['upload_data']['file_name'],
                            'original_file' => $data['upload_data']['orig_name'],
                            'slug' => $this->slugify($this->input->post('publication', TRUE)),
                            'created_at' => time()
                        );
                        $resp = $this->Admin_model->managepublication($dbdata);
                        redirect('admin/management-publicatii');
                    }
                } else {
                    $dbdata = array('name' => $this->input->post('publication', TRUE),
                        'subjects' => $this->input->post('subjects', TRUE),
                        'catid' => $this->input->post('category', TRUE),
                        'discid' => $this->input->post('discipline', TRUE),
                        'year' => $this->input->post('year', TRUE),
                        'download_rights' => $this->input->post('downloadrights', TRUE),
                        'slug' => $this->slugify($this->input->post('publication', TRUE))
                    );
                    $resp = $this->Admin_model->managepublication($dbdata, $id);
                    redirect('admin/management-publicatii');
                }
            } else {

                $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
                $this->load->view('admin/header', $header);
                if ($id === NULL) {
                    $data['categories'] = $this->Admin_model->getcategories();
                    $data['disciplines'] = $this->Admin_model->getdisciplines();
                    $data['allsubjects'] = $this->Admin_model->gettags();
                    $data['formerror'] = 'Nu ai completat toate campurile obligatorii!';
                    $this->load->view('admin/managepublication', $data);
                } else {
                    $data['id'] = $id;
                    $data['categories'] = $this->Admin_model->getcategories();
                    $data['disciplines'] = $this->Admin_model->getdisciplines();
                    $data['pubdata'] = $this->Admin_model->getpublication($id);
                    $data['subjects'] = $this->Admin_model->getpubsubjects($id);
                    $data['formerror'] = 'Nu ai completat toate campurile obligatorii!';
                    $this->load->view('admin/managepublication', $data);
                }
                $this->load->view('admin/footer');
            }
        } else {
            $header['unconfirmedcount'] = $this->Admin_model->getunconfirmedcount();
            $this->load->view('admin/header', $header);
            if ($id === NULL) {
                $data['categories'] = $this->Admin_model->getcategories();
                $data['disciplines'] = $this->Admin_model->getdisciplines();
                $data['allsubjects'] = $this->Admin_model->gettags();
                $this->load->view('admin/managepublication', $data);
            } else {
                $data['id'] = $id;
                $data['categories'] = $this->Admin_model->getcategories();
                $data['disciplines'] = $this->Admin_model->getdisciplines();
                $data['pubdata'] = $this->Admin_model->getpublication($id);
                $data['subjects'] = $this->Admin_model->getpubsubjects($id);
                $this->load->view('admin/managepublication', $data);
            }
            $this->load->view('admin/footer');
        }
    }

    public function deletepublication($id) {
        $this->Admin_model->deletepublication($id);
        redirect('admin/management-publicatii');
    }

}
