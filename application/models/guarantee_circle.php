<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class guarantee_circle extends CI_Model{
	
    public function get_client_info(){

    	
    	// mysql: SELECT DISTINCT client_name, client_id FROM guarantee_circle limit 10


    	$this->db->distinct();
    	$this->db->select('client_name,client_id');
    	$this->db->limit(10);
    	$query =  $this->db->get('guarantee_circle');

		return $query->result_array();
    }

}