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

		print_r($data);

		$this->load->view('templates/header');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function profile(){
		if($this->input->post('update')){
			$session_user = $this->session->userdata('email_address');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email_address2', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('bio', 'Bio', 'required|max_length[255]');
			if ( $this->form_validation->run() !== false ) {
				$info = array(
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'email_address'=>$this->input->post('email_address2'),
					'bio'=>$this->input->post('bio')
					);
				$this->load->model('dashboard_model');
					$res = $this
						->dashboard_model
						->update_profile(
							$session_user,
							$info);
				echo "string";
				if ($res !== FALSE) {
					# Account exists
					$this->session->set_userdata('email_address',$this->input->post('email_address2'));
					redirect('dashboard/profile');
					$message = "Your profile has been successfully updated.";
				}
			}
		}
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

		$this->load->view('templates/header');
		$this->load->view('dashboard/profile', $data);
		$this->load->view('templates/footer');
	}
}