<?php

class Admin_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
     public function loginCheck($email, $password)
    {
        $arr = array(
            'email' => $email,
            'password' => $password,
            'account_status' => 1
        );
        $this->db->where($arr);
        $result = $this->db->get('users');
        $resultArray = $result->row_array();
        if ($result->num_rows() > 0) {
            $this->db->where('id', $resultArray['id']);
            $this->db->update('users', array('last_login' => time()));
        }
        return $resultArray;
    }
    

 public function getSettingsValues($key = null) {
        if ($key === null) {
            $this->db->select('*');
            $result = $this->db->get('settings');
            $ress = $result->result_array();
            $data = array();
            foreach ($ress as $res) {
                $data[$res['key']] = $res['value'];
            }
        } else {
            $this->db->where('key', $key);
            $this->db->select('*');
            $result = $this->db->get('settings');
            $ress = $result->row_array();
            $data = $ress['value'];
        }
        return $data;
    }

    public function updateSettingsValues($key, $val) {
        $this->db->where('key', $key);
        $this->db->update('settings', array(
            'value' => trim($val)
        ));
    }
    
    public function managestudent($data, $id = NULL) {
        if ($id === NULL) {
            if (!$this->db->insert('students', $data)) {
                log_message('error', print_r($this->db->error(), true));
                return 'Error';
            } else {
                return 'Success';
            }
            
        } else {
            $this->db->where('id', $id);
            if (!$this->db->update('students', $data)) {
                log_message('error', print_r($this->db->error(), true));
                show_error(lang('database_error'));
                return 'Error';
            }else{
                return 'Success';
            }
        }
    }
    
      public function getstudent($id) {
    $this->db->select('*');
            $result = $this->db->get('students');
            $ress = $result->row_array();
            return $ress;
    }
    
    public function getstudents() {
    $this->db->select('id,name,fathers_initial,lname,faculty,year,email,account_status');
    $this->db->where('account_status', '1');
            $result = $this->db->get('students');
            $ress = $result->result_array();
            return $ress;
    }
    
    public function getunconfirmedstudents() {
    $this->db->select('id,name,fathers_initial,lname,faculty,year,email,account_status');
    $this->db->where('account_status', '0');
            $result = $this->db->get('students');
            $ress = $result->result_array();
            return $ress;
    }
    
    public function changeStudentStatus($studentId, $toStatus) {
        $this->db->where('id', $studentId);
        if (!$this->db->update('students', array(
                    'account_status' => $toStatus
                ))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }
    
    public function getunconfirmedcount() {
        $this->db->select('*');
    $this->db->where('account_status', '0');
            $result = $this->db->get('students');
            $ress = $result->num_rows();
            return $ress;
    }
    
    public function getdisciplines() {
    $this->db->select('*');
            $result = $this->db->get('disciplines');
            $ress = $result->result_array();
            return $ress;
    }
    
        public function getdiscipline($id) {
    $this->db->select('*');
            $result = $this->db->get('disciplines');
            $ress = $result->row_array();
            return $ress;
    }
    
    public function managediscipline($data, $id = NULL) {
        if ($id === NULL) {
            if (!$this->db->insert('disciplines', $data)) {
                log_message('error', print_r($this->db->error(), true));
                return 'Error';
            } else {
                return 'Success';
            }
            
        } else {
            $this->db->where('id', $id);
            if (!$this->db->update('disciplines', $data)) {
                log_message('error', print_r($this->db->error(), true));
                show_error(lang('database_error'));
                return 'Error';
            }else{
                return 'Success';
            }
        }
    }
    
    public function getcategories() {
    $this->db->select('*');
            $result = $this->db->get('categories');
            $ress = $result->result_array();
            return $ress;
    }
    
        public function getcategory($id) {
    $this->db->select('*');
            $result = $this->db->get('categories');
            $ress = $result->row_array();
            return $ress;
    }
    
    public function managecategory($data, $id = NULL) {
        if ($id === NULL) {
            if (!$this->db->insert('categories', $data)) {
                log_message('error', print_r($this->db->error(), true));
                return 'Error';
            } else {
                return 'Success';
            }
            
        } else {
            $this->db->where('id', $id);
            if (!$this->db->update('categories', $data)) {
                log_message('error', print_r($this->db->error(), true));
                show_error(lang('database_error'));
                return 'Error';
            }else{
                return 'Success';
            }
        }
    }
    
    
    public function managestaff($data, $id = NULL) {
        if ($id === NULL) {
            if (!$this->db->insert('users', $data)) {
                log_message('error', print_r($this->db->error(), true));
                return 'Error';
            } else {
                return 'Success';
            }
            
        } else {
            $this->db->where('id', $id);
            if (!$this->db->update('users', $data)) {
                log_message('error', print_r($this->db->error(), true));
                show_error(lang('database_error'));
                return 'Error';
            }else{
                return 'Success';
            }
        }
    }
    
      public function getstaffacc($id) {
    $this->db->select('id,name,email,rights,account_status,created_at,last_login');
            $result = $this->db->get('users');
            $ress = $result->row_array();
            return $ress;
    }
    
    public function getstaffaccs() {
    $this->db->select('id,name,email,rights,account_status,created_at,last_login');
            $result = $this->db->get('users');
            $ress = $result->result_array();
            return $ress;
    }
    
    public function getpublications() {
        $this->db->select('publications.id, categories.category as category, disciplines.discipline as discipline, publications.name, publications.subjects, publications.file, publications.download_rights');
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $qry = $this->db->get('publications');
        return $qry->result_array();
    }
    
      public function getpublication($id) {
    $this->db->select('*');
            $result = $this->db->get('publications');
            $ress = $result->row_array();
            return $ress;
    }
    
    public function managepublication($data, $id = NULL) {
        if ($id === NULL) {
            if (!$this->db->insert('publications', $data)) {
                log_message('error', print_r($this->db->error(), true));
                return 'Error';
            } else {
                return 'Success';
            }
            
        } else {
            $this->db->where('id', $id);
            if (!$this->db->update('publications', $data)) {
                log_message('error', print_r($this->db->error(), true));
                show_error(lang('database_error'));
                return 'Error';
            }else{
                return 'Success';
            }
        }
    }
    
}