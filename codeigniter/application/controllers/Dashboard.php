<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

ob_start();

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index(){
		$session_user = $this->session->userdata('email_address');
		$this->load->model('dashboard_model');
		$result = $this
					->dashboard_model
					->view_profile(
						$session_user);
		$data['user'] = array();
		foreach ($result as $key => $value){
			array_push($data['user'], $key, $value);
		}

		print_r($data['user']);

		$this->load->view('templates/header');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}
}