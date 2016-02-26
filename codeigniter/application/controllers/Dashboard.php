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

		$data['messages'] = $this->dashboard_model->view_messages($session_user);
		$data['clients'] = $this->dashboard_model->view_clients();
		$data['projects'] = $this->dashboard_model->view_projects();

		$this->load->view('templates/header');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function profile(){
		$this->load->model('dashboard_model');
		$session_user = $this->session->userdata('email_address');
		if($this->input->post('update')){
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10240;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;
            $config['overwrite']			= TRUE;

            $this->load->library('upload', $config);
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email_address2', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[50]');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[50]');
			$this->form_validation->set_rules('bio', 'Bio', 'max_length[255]');
			$file = NULL;
			if ( ! $this->upload->do_upload('avatar')){
                echo $this->upload->display_errors();
            }else{
                $file = $this->upload->file_name;
            }
			if ( $this->form_validation->run() !== false ) {
				$info = array(
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'email_address'=>$this->input->post('email_address2'),
					'bio'=>$this->input->post('bio'),
					'avatar'=>$file
					);
					$res = $this
						->dashboard_model
						->update_profile(
							$session_user,
							$info);
				if ($res !== FALSE) {
					# Account exists
					$this->session->set_userdata('email_address',$this->input->post('email_address2'));
					redirect('dashboard/profile');
					$message = "Your profile has been successfully updated.";
				}
			}
		}
		$result = $this
					->dashboard_model
					->view_profile($session_user);
		$data['user'] = array();
		foreach ($result as $key => $value){
			array_push($data['user'], $key, $value);
		}

		$this->load->view('templates/header');
		$this->load->view('dashboard/profile', $data);
		$this->load->view('templates/footer');
	}

	public function messages(){
		$this->load->model('dashboard_model');
		$session_user = $this->session->userdata('email_address');
		if($this->input->post('submit')){
			$userid = $this->dashboard_model->get_userid($session_user);
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="errors"><p>', '</p></div>');
			$this->form_validation->set_rules('title', 'Title', 'required|max_length[100]');
			$this->form_validation->set_rules('message', 'Message', 'required|max_length[9999]');
			if ( $this->form_validation->run() !== false ) {
				$info = array(
					'title'=>$this->input->post('title'),
					'message'=>$this->input->post('message'),
					'userid'=>$userid
					);
					$res = $this
						->dashboard_model
						->create_message($info);
			}
		}elseif($this->input->get('delete')){
			$messageid = $this->input->get('delete');
			$this->dashboard_model->delete_message($messageid);
		}

		$data = array();
		$data['messages'] = $this->dashboard_model->view_messages($session_user);

		$this->load->view('templates/header');
		$this->load->view('dashboard/messages', $data);
		$this->load->view('templates/footer');
	}

	public function edit_message(){
		$this->load->model('dashboard_model');
		$messageid = $this->input->get('id');
		if($this->input->post('update')){
			$info = array(
					'title'=>$this->input->post('title'),
					'message'=>$this->input->post('message')
					);
			$this->dashboard_model->edit_message($messageid, $info);
			redirect('dashboard/messages');
		}

		$data = array();
		$data['message'] = $this->dashboard_model->retrieve_message($messageid);

		$this->load->view('templates/header');
		$this->load->view('dashboard/edit_message', $data);
		$this->load->view('templates/footer');
	}

	public function clients(){
		$this->load->model('dashboard_model');
		$session_user = $this->session->userdata('email_address');
		if($this->input->post('create')){
			$config['upload_path']          = './uploads/clients/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10240;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;
            $config['overwrite']			= FALSE;

            $this->load->library('upload', $config);
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Client Name', 'required|max_length[100]');
			$file = "Default";
			if ( ! $this->upload->do_upload('image')){
                echo $this->upload->display_errors();
            }else{
                $file = $this->upload->file_name;
            }
			if ( $this->form_validation->run() !== false ) {
				$info = array(
					'name'=>$this->input->post('name'),
					'client_image'=>$file
					);
					$res = $this
						->dashboard_model
						->create_client($info);
				if ($res !== FALSE) {
					redirect('dashboard/clients');
				}
			}
		}
		$result = $this
					->dashboard_model
					->view_clients();
		$data['clients'] = $result;

		$this->load->view('templates/header');
		$this->load->view('dashboard/clients', $data);
		$this->load->view('templates/footer');
	}

	public function projects(){
		$this->load->model('dashboard_model');

		if($this->input->post('create')){
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="errors"><p>', '</p></div>');
			$this->form_validation->set_rules('description', 'Project Description', 'required|max_length[100]');
			$this->form_validation->set_rules('url', 'Project URL', 'required|max_length[255]');
			if ( $this->form_validation->run() !== false ) {
				$info = array(
					'description'=>$this->input->post('description'),
					'url'=>$this->input->post('url'),
					'clientid'=>$this->input->post('client')
					);
				$res = $this
					->dashboard_model
					->create_project($info);
				if ($res !== FALSE) {
					redirect('dashboard/projects');
				}
			}
		}

		$data['clients'] = $this
					->dashboard_model
					->view_clients();

		$data['projects'] = $this
					->dashboard_model
					->view_projects();

		$this->load->view('templates/header');
		$this->load->view('dashboard/projects', $data);
		$this->load->view('templates/footer');
	}

	
}