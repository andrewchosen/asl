<?php

class Dashboard_model extends CI_Model
{
	public function view_profile($user){
		// select statement
	    $sql = "SELECT email_address, first_name, last_name, bio, date_created FROM users WHERE email_address = ?";
	    $q = $this->db->query($sql, $user);
	    return $q->result();
	}
}