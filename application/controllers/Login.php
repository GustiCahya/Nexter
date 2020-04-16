<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if($this->form_validation->run() == false){
			$this->load->view('v_login');
		}else{
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('login', ['username' => $username])->row_array();
		if($user){
			if(password_verify($password, $user['password'])){
				$data = [
					'username' => $username
				];
				$this->session->set_userdata($data);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('message', '<div style="color:salmon; padding-bottom: 1rem;">Username or Password is not valid</div>');
				redirect('login');
			}
			redirect('login');
		}else{
			$this->session->set_flashdata('message', '<div style="color:salmon; padding-bottom: 1rem;">Username or Password is not valid</div>');
			redirect('login');
		}
		//admin 12345678
		// $data = [
		// 	'username' => $username,
		// 	'password' => password_hash($password, PASSWORD_DEFAULT)
		// ];
		// $this->db->insert('login', $data);
	}
	
}
