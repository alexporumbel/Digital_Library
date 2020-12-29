<?php

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function loginCheck($email, $password) {
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
            } else {
                return 'Success';
            }
        }
    }

    public function getstudent($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
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
        $this->db->select('disciplines.id, disciplines.discipline, disciplines.slug, COUNT(publications.discid) as disccount');
        $this->db->join('publications', 'disciplines.id=publications.discid', 'left');
        $this->db->group_by("disciplines.id");
        $result = $this->db->get('disciplines');
        $ress = $result->result_array();
        return $ress;
    }

    public function getdiscipline($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
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
            } else {
                return 'Success';
            }
        }
    }

    public function getcategories() {
        $this->db->select('categories.id, categories.category, categories.slug, COUNT(publications.catid) as catcount');
        $this->db->join('publications', 'categories.id=publications.catid', 'left');
        $this->db->group_by("categories.id");
        $result = $this->db->get('categories');
        $ress = $result->result_array();
        return $ress;
    }

    public function getcategory($id) {
        $this->db->select('*');
         $this->db->where('id', $id);
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
            } else {
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
            } else {
                return 'Success';
            }
        }
    }

    public function getstaffacc($id) {
        $this->db->select('id,name,email,rights,account_status,created_at,last_login');
         $this->db->where('id', $id);
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
        $this->db->select("publications.id, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ', ') as subjects ");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->result_array();
    }

    public function getpublication($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $result = $this->db->get('publications');
        $ress = $result->row_array();
        return $ress;
    }

    public function getpubsubjects($id) {
        $this->db->select('subjects.subject, subjects.slug, subjects.id');
        $this->db->join('subject_links', 'subjects.id=subject_links.subid', 'inner');
        $this->db->where('subject_links.pubid', $id);
        $qry = $this->db->get('subjects');
        return $qry->result_array();
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

    private function addsubjects($subjects, $pubid) {
        foreach ($subjects as $subject) {
            $this->db->where(array('slug' => $this->slugify($subject)));
            $result = $this->db->get('subjects');
            $resultArray = $result->row_array();
            if ($result->num_rows() < 1) {
                $this->db->insert('subjects', array('subject' => $subject, 'slug' => $this->slugify($subject)));
                $lastid = $this->db->insert_id();
                $this->db->reset_query();
                $this->db->insert('subject_links', array('subid' => $lastid, 'pubid' => $pubid));
            } else {
                $this->db->insert('subject_links', array('subid' => $resultArray['id'], 'pubid' => $pubid));
            }
            $this->db->reset_query();
        }
    }

    private function removesubjects($subjects, $pubid) {
        $this->db->delete('subject_links', array('pubid' => $pubid));
    }

    public function managepublication($data, $id = NULL) {
        if ($id === NULL) {
            $dbdata = array('name' => $data['name'],
                'catid' => $data['catid'],
                'discid' => $data['discid'],
                'year' => $data['year'],
                'file' => $data['file'],
                'original_file' => $data['original_file'],
                'download_rights' => $data['download_rights'],
                'slug' => $data['slug'],
                'created_at' => $data['created_at']
            );
            $this->db->insert('publications', $dbdata);
            $lastid = $this->db->insert_id();
            $this->addsubjects($data['subjects'], $lastid);
        } else {
            $this->removesubjects($data['subjects'], $id);
            $dbdata = array('name' => $data['name'],
                'catid' => $data['catid'],
                'discid' => $data['discid'],
                'year' => $data['year'],
                'download_rights' => $data['download_rights'],
                'slug' => $data['slug']
            );
            $this->db->where('id', $id);
            $this->db->update('publications', $dbdata);
            $this->addsubjects($data['subjects'], $id);
        }
    }

    public function deletepublication($id) {
        $this->db->where('id', $id);
        $this->db->delete('publications');
        $this->db->reset_query();
        $this->db->where('pubid', $id);
        $this->db->delete('subject_links');
    }

    public function gettags() {
        $this->db->select('*');
        $result = $this->db->get('subjects');
        $ress = $result->result_array();
        return $ress;
    }
    
    public function getrequests() {
        $this->db->select('requests.id, requests.sid, requests.subject, requests.message, requests.timestamp, requests_responses.id as responseid, students.name, students.fathers_initial, students.lname, students.faculty, students.year');
        $this->db->join('requests_responses', 'requests.id=requests_responses.rid', 'left');
        $this->db->join('students', 'requests.sid=students.id', 'inner');
        $this->db->group_by("requests.id");
        $result = $this->db->get('requests');
        $ress = $result->result_array();
        return $ress;
    }
    
        public function getrequest($id) {
        $this->db->select('requests.id, requests.sid, requests.subject, requests.message, requests.timestamp, requests_responses.original_file, requests_responses.id as respid, requests_responses.response, requests_responses.file, requests_responses.timestamp as timestampresponse, users.name as adminname, students.name, students.fathers_initial, students.lname, students.faculty, students.year');
        $this->db->join('requests_responses', 'requests.id=requests_responses.rid', 'left');
        $this->db->join('users', 'requests_responses.aid=users.id', 'left');
        $this->db->join('students', 'requests.sid=students.id', 'inner');
        $this->db->where('requests.id', $id);
        $this->db->group_by("requests.id");
        $result = $this->db->get('requests');
        $ress = $result->row_array();
        return $ress;
    }
    
    public function managerequest($data) {
            if (!$this->db->insert('requests_responses', $data)) {
                log_message('error', print_r($this->db->error(), true));
                return 'Error';
            } else {
                return 'Success';
            }
    }

}
