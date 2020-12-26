<?php

class Admin_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
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
    
}