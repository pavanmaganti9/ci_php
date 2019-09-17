<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}
	
	
	
	public function login_validation()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$pwd = $this->input->post('password');
			$this->load->model('main_model');
			if($this->main_model->login($email,$pwd)){
				$session_data = array('email'=>$email);
				$this->session->set_userdata($session_data);
				$this->load->view('admin/dashboard');
				//redirect(base_url().'admin/dashboard');
			}else{
				$this->session->set_flashdata('error', 'Invalid email or password');
				redirect(base_url().'admin/login');
			}
		}else{
			$this->index();
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect(base_url().'admin/login');
	}
}
