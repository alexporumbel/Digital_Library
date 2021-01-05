<?php

class Student_model extends CI_Model
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
        $result = $this->db->get('students');
        $resultArray = $result->row_array();
        if ($result->num_rows() > 0) {
            $this->db->where('id', $resultArray['id']);
            $this->db->update('students', array('last_login' => time()));
        }
        return $resultArray;
    }
    
    public function register($data){
        if (!$this->db->insert('students', $data)) {
                log_message('error', print_r($this->db->error(), true));
                return 'Error';
            } else {
                return 'Success';
            }
    }
    
    public function changeToken($token, $email) {
        $this->db->where('email', $email);
        $this->db->update('students', array('remember_token' => $token));
    }
    
    public function changePassword($token, $password) {
        $this->db->where('token', $token);
        $this->db->update('students', array('password' => md5($password), 'remember_token' => ''));
    }
    
    public function catlist(){
        $this->db->select('categories.category, COUNT(publications.id) as catcount, categories.slug');
        $this->db->join('publications', 'publications.catid = categories.id', 'left');
        $this->db->order_by("catcount", "DESC");
        $this->db->group_by("categories.id");
        $qry = $this->db->get('categories');
        return $qry->result_array();
    }

    public function disclist(){
        $this->db->select('disciplines.discipline, COUNT(publications.id) as disccount, disciplines.slug');
        $this->db->join('publications', 'publications.discid = disciplines.id', 'left');
        $this->db->order_by("disccount", "DESC");
        $this->db->group_by("disciplines.id");
        $qry = $this->db->get('disciplines');
        return $qry->result_array();
    }
    
    public function subjlist(){
        $this->db->select('subjects.subject, COUNT(subject_links.subid) as subjscount, subjects.slug');
        $this->db->join('subject_links', 'subject_links.subid=subjects.id', 'inner');
        $this->db->order_by("subjscount", "DESC");
        $this->db->group_by("subject_links.subid");
        $qry = $this->db->get('subjects',15);
        return $qry->result_array();
    }
    
     public function yearslist(){
        $this->db->select('year, COUNT(year) as yearcount');
        $this->db->order_by("yearcount", "DESC");
        $this->db->group_by("year");
        $qry = $this->db->get('publications');
        return $qry->result_array();
    }
    
    public function getlastpublications($page) {
        $numrows = 6;
        $page = $numrows * ($page - 1);
        $this->db->select("publications.id, publications.year, publications.slug, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug ");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications', $numrows, $page);
        return $qry->result_array();
    }
    
    public function countallpublications(){
        $this->db->select("publications.id, publications.year, publications.slug, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug ");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->num_rows();
    }
    
    public function getbydiscipine($discipline, $page) {
        $numrows = 6;
        $page = $numrows * ($page - 1);
        $this->db->select("publications.id, publications.year, publications.slug, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('disciplines.slug', $discipline);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications', $numrows, $page);
        return $qry->result_array();
    }
    
    public function countalldisciplines($discipline) {
        $this->db->select("publications.id, publications.year, publications.slug, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('disciplines.slug', $discipline);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->num_rows();
    }
 
     public function getdisciplinefromslug($slug) {
    $this->db->select('*');
            $this->db->where('slug', $slug);
            $result = $this->db->get('disciplines');
            $ress = $result->row();
            return $ress->discipline;
    }
    
     public function getbycategory($category, $page) {
         $numrows = 6;
        $page = $numrows * ($page - 1);
        $this->db->select("publications.id, publications.slug, publications.year, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('categories.slug', $category);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications', $numrows, $page);
        return $qry->result_array();
    }
    
    public function countallcategories($category) {
        $this->db->select("publications.id, publications.slug, publications.year, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('categories.slug', $category);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->num_rows();
    }
 
     public function getcategoryfromslug($slug) {
    $this->db->select('*');
            $this->db->where('slug', $slug);
            $result = $this->db->get('categories');
            $ress = $result->row();
            return $ress->category;
    }
    
    public function getbysubject($subject, $page) {
        $numrows = 6;
        $page = $numrows * ($page - 1);
        $this->db->select("publications.id, publications.slug, publications.year, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('subjects.slug', $subject);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications', $numrows, $page);
        return $qry->result_array();
    }
    
    public function countallsubjects($subject) {
        $this->db->select("publications.id, publications.slug, publications.year, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('subjects.slug', $subject);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->num_rows();
    }
    
    public function getbyyear($year, $page) {
        $numrows = 6;
        $page = $numrows * ($page - 1);
        $this->db->select("publications.id, publications.slug, publications.year, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('publications.year', $year);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications', $numrows, $page);
        return $qry->result_array();
    }
    
    public function countallyears($year) {
        $this->db->select("publications.id, publications.slug, publications.year, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('publications.year', $year);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->num_rows();
    }
    
    public function getfavorites($uid, $page) {
        $numrows = 6;
        $page = $numrows * ($page - 1);
        $this->db->select("publications.id, publications.slug, publications.year, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
        $this->db->join('favorites', 'favorites.pubid=publications.id', 'inner');
         $this->db->where('favorites.sid', $uid);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications', $numrows, $page);
        return $qry->result_array();
    }
    
    public function countallfavorites($uid) {
        $this->db->select("publications.id, publications.slug, publications.year, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
        $this->db->join('favorites', 'favorites.pubid=publications.id', 'inner');
         $this->db->where('favorites.sid', $uid);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->num_rows();
    }
 
     public function getsubjectfromslug($slug) {
    $this->db->select('*');
            $this->db->where('slug', $slug);
            $result = $this->db->get('subjects');
            $ress = $result->row();
            return $ress->subject;
    }
    
     public function getpublication($id) {
    $this->db->select("publications.id, publications.file, publications.year, publications.slug, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
         $this->db->where('publications.id', $id);
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->row_array();
    }
    
    public function addtofav($pubid, $sid){
         $this->db->where('pubid', $pubid);
         $this->db->where('sid', $sid);
        $result = $this->db->get('favorites');
        $resultArray = $result->row_array();
        if ($result->num_rows() < 1) {
        $this->db->insert('favorites', array('sid' => $sid, 'pubid'=>$pubid));
        $this->db->insert('fav_logs', array('sid' => $sid, 'pubid' => $pubid, 'timestamp' => time()));
        
    }
    }
    
    public function unfav($pubid, $sid){
         $this->db->where('pubid', $pubid);
         $this->db->where('sid', $sid);
        $this->db->delete('favorites');
    }
    
    
    public function favcount($sid){
        $this->db->select('COUNT(id) as totalfav');
        $this->db->where('sid', $sid);
        $qry = $this->db->get('favorites');
        $ress = $qry->row();
            return $ress->totalfav;
    }
    
    public function search($category, $discipline, $year, $search, $page) {
         $numrows = 6;
        $page = $numrows * ($page - 1);
    $this->db->select("publications.id, publications.file, publications.year, publications.slug, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
        if($category > 0){
         $this->db->where('publications.catid', $category);
        }
        if($discipline > 0){
         $this->db->where('publications.discid', $discipline);
        }
        if($year !==''){
         $this->db->where('publications.year', $year);
        }
        $s = explode(' ', $search);
        foreach ($s as $slg) {
            $this->db->like('publications.name', $slg);
        }
        foreach ($s as $slg) {
            $this->db->or_like('subjects.slug', $slg);
        }
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications', $numrows, $page);
        return $qry->result_array();
    }
    
    public function countallsearch($category, $discipline, $year, $search) {
    $this->db->select("publications.id, publications.file, publications.year, publications.slug, categories.category as category, disciplines.discipline as discipline, publications.name, publications.file, publications.download_rights, GROUP_CONCAT(subjects.subject SEPARATOR ',') as subjects, GROUP_CONCAT(subjects.slug SEPARATOR ',') as subjslugs, disciplines.slug as discslug, categories.slug as catslug");
        $this->db->join('categories', 'publications.catid = categories.id', 'inner');
        $this->db->join('disciplines', 'publications.discid = disciplines.id', 'inner');
        $this->db->join('subject_links', 'subject_links.pubid= publications.id', 'inner');
        $this->db->join('subjects', 'subject_links.subid=subjects.id', 'inner');
        if($category > 0){
         $this->db->where('publications.catid', $category);
        }
        if($discipline > 0){
         $this->db->where('publications.discid', $discipline);
        }
        if($year !==''){
         $this->db->where('publications.year', $year);
        }
        $s = explode(' ', $search);
        foreach ($s as $slg) {
            $this->db->like('publications.name', $slg);
        }
        foreach ($s as $slg) {
            $this->db->or_like('subjects.slug', $slg);
        }
        $this->db->group_by("publications.id");
        $qry = $this->db->get('publications');
        return $qry->num_rows();
    }
    
    public function request($publicatie, $mesaj, $uid){
        if (!$this->db->insert('requests', array('sid'=>$uid, 'subject'=> $publicatie, 'message'=>$mesaj, 'timestamp'=>time()))) {
                log_message('error', print_r($this->db->error(), true));
                return 'Error';
            } else {
                return 'Success';
            }
    }
    
    public function download($pubid, $sid){
         $this->db->where('pubid', $pubid);
         $this->db->where('sid', $sid);
        $result = $this->db->get('dwd_logs');
        $resultArray = $result->row_array();
        if ($result->num_rows() < 1) {
        $this->db->insert('dwd_logs', array('sid' => $sid, 'pubid' => $pubid, 'timestamp' => time()));
        
    }
    }
    
    public function pubview($pubid, $sid){
        $this->db->insert('pub_logs', array('sid' => $sid, 'pubid' => $pubid, 'timestamp' => time()));
    }
    
    public function createsession($sid, $ip){
        $this->db->insert('sessions', array('sid' => $sid, 'ip' => $ip, 'logintime' => time(), 'duration' => '5'));
    }
    
    public function addsessionduration($sid){
         $this->db->where('sid', $sid);
         $this->db->order_by('id', 'DESC');
        $result = $this->db->get('sessions', 1);
        $resultArray = $result->row_array();
        if ($result->num_rows() > 0) {
            $this->db->reset_query();
        $this->db->where('id', $resultArray['id']);
$this->db->set('duration', 'duration+10', FALSE);
$this->db->update('sessions');
    }
    }
}