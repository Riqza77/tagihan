<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		
		if ($this->session->userdata('username')) {
			 	redirect('admin');
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required',[
			'required'=> 'Username Masih Kosong, mohon isi terlebih dahulu']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',[
			'required'=> 'Password Masih Kosong, mohon isi terlebih dahulu']);

		if ($this->form_validation->run()==false) {
			
			$data['title'] = 'Login Page';

			$this->load->view('login', $data);
		}else{
			$this->__login();
		}

	}


	private function __login()
	{
		$username			=$this->input->post('username');
		$pass		  		=$this->input->post('password');
		

		$user 				= $this->db->get_where('user', ['username'=>$username])->row_array();
		if ($user) {
			// user ada
			if (password_verify($pass, $user['password'])) {
				$data = [
					'username'	=>	$user['username'],
					'nama'	=>	$user['nama'],
					'role'	=>	$user['role'],
					'status' 	=> 'login'
				];
				$this->session->set_userdata($data);
				if ($user['role']==1) {
						redirect('admin');
					}else{

					redirect('user');
				}


			}else{

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password Salah!</div>');
			redirect('/');
			}
		}else{

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Username Salah!</div>');
			redirect('/');
		}
	}
	public function logout(){
	
		if ($this->session->userdata('username')) {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Berhasil Logout</div>');
		redirect('/');
		} else {
			redirect('/');
		}
	
	}




}
 ?>