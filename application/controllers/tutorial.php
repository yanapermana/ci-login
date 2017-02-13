<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tutorial extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('model_login');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->view('form_login');
	}

	public function process_login(){
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['account'] = $this->model_login->login($data)->result();
		// var_dump($data['account']);
		if($data['account'] != NULL){
			$this->session->set_userdata('login',True);
			redirect('tutorial/homepage');
		} else{
			$data['error'] = "[!] username or password incorrect ...";
			$this->load->view('form_login', $data);
		}
	}

	public function homepage(){
		if( $this->session->userdata('login') != True)
		{
			redirect('tutorial/');
		} else{
			$this->load->view('homepage');
		}
	}

	public function logout(){
		$this->session->unset_userdata('login');
		redirect('tutorial/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */