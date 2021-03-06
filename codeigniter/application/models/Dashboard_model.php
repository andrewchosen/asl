<?php

class Dashboard_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$session_user = $this->session->userdata('email_address');
		if(!isset($session_user) || ($session_user==''))
		{
		redirect('admin');
		}
	}

	public function view_profile($user){
		// select statement
	    $sql = "SELECT * FROM users WHERE email_address = ?";
	    $q = $this->db->query($sql, $user);
	    return $q->result();
	}

	public function update_profile($user, $info){
		// update
	    $this->db->where('email_address', $user);
		$this->db->update('users', $info);
		$this->session->set_flashdata('success_msg', '<div class="success message">Your profile has been successfully updated.</div>');
	}

	public function get_userid($user){
		$this->db->select('id, email_address');
		$this->db->from('users');
		$this->db->where('email_address', $user);
		$query = $this->db->get();
		$row = $query->row();
		if (isset($row))
		{
		    return $row->id;
		}else{
			return "Error";
		}
	}

	public function create_message($info){
		// insert
		$this->db->insert('messages', $info);
		$this->session->set_flashdata('success_msg', '<div class="success message">Your message has been created.</div>');
	}

	public function view_messages($user){
		$this->db->select('*');
		$this->db->from('messages');
		$this->db->join('users', 'users.id = messages.userid');
		$this->db->order_by('created', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function delete_message($messageid){
		$this->db->where('messageid', $messageid);
		$this->db->delete('messages');
	}

	public function retrieve_message($messageid){
		$this->db->select('*');
		$this->db->from('messages');
		$this->db->where('messageid', $messageid);
		$query = $this->db->get();
		return $query->result();
	}

	public function edit_message($messageid, $info){
		// update
	    $this->db->where('messageid', $messageid);
		$this->db->update('messages', $info);
		$this->session->set_flashdata('success_msg', '<div class="success message">Your message has been successfully updated.</div>');
	}

	public function create_client($info){
		$this->db->insert('clients', $info);
		$this->session->set_flashdata('success_msg', '<div class="success message">Your client has been created.</div>');
	}

	public function view_clients(){
		$this->db->select('*');
		$this->db->from('clients');
		$this->db->order_by('created', "DESC");
		$query = $this->db->get();
		return $query->result();
	}

	public function create_project($info){
		$this->db->insert('projects', $info);
		$this->session->set_flashdata('success_msg', '<div class="success message">Your project has been created.</div>');
	}

	public function view_projects(){
		$this->db->select('*');
		$this->db->from('projects');
		$this->db->join('clients', 'clients.clientid = projects.clientid');
		$this->db->order_by('projects.created', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	
}

