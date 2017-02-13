<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function login($data){
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('username', $data['username'] );
		$this->db->where('password', $data['password'] );
		$this->db->limit(1);
		return $this->db->get();
	}
}