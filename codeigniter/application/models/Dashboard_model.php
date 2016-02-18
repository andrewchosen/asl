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
	    $sql = "SELECT email_address, first_name, last_name, bio, date_created FROM users WHERE email_address = ?";
	    $q = $this->db->query($sql, $user);
	    return $q->result();
	}

	public function update_profile($user, $info){
		// update statement
	    $this->db->where('email_address', $user);
		$this->db->update('users', $info);
		$this->session->set_flashdata('success_msg', '<div class="success message">Your profile has been successfully updated.</div>');
	}
}

