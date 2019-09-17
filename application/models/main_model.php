<?php
class Main_model extends CI_Model
{
	
	function login($email,$pwd)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$pwd);
		$query = $this->db->get('users');
		
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	
	
}