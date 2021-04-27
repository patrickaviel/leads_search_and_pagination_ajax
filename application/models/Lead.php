<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lead extends CI_Model {

    public function all() {
        return $this->db->query("SELECT * FROM leads LIMIT 0, 10")->result_array();
    }

    public function search($post){
        // Selecting records
        $this->db->select("*");
        // from table 'athletes'
        $this->db->from('leads');
        // Convert array to string if not null
        if($post['from']!=''){
            $this->db->where('registered_datetime <', $post['from']);
        }

        if($post['date']!=''){
            $this->db->or_where('registered_datetime =', $post['date']);
        }

        if($post['name']!=''){
            $this->db->like('first_name', $post['name']);
            $this->db->or_like('last_name', $post['name']);
        }
        if($post['page_number']==''){
            $number = 0;
        }else{
            $number = $post['page_number']*10;
        }
        $query = $this->db->limit(10,$number)->get_compiled_select();
        return $this->db->query($query)->result_array();
    }

    public function pagination() {
        return $this->db->query("SELECT * FROM leads")->result_array();
    }
    
}