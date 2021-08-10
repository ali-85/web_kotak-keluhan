<?php
	class Auth extends CI_Controller {
		public function index()
		{
			if ($this->session->userdata('username')) {
				redirect(base_url('admin'));
			}
			$this->form_validation->set_rules('uname','Username','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login Page';
				$this->load->view('partials/header',$data);
				$this->load->view('auth/login');
				$this->load->view('partials/footer');
			} else {
				$this->_Login();
			}
		}
		private function _Login()
		{
			$uname = $this->input->post('uname');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user',['username' => $uname])->row_array();
			if (password_verify($password,$user['password'])) {
				$data = [
					'username' => $user['username']
				];
				$this->session->set_userdata($data);
				redirect('admin');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username or Password are incorrect !</div>');
				redirect('auth');
			}
		}
		public function logout()
		{
			$this->session->unset_userdata('username');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You had been logout!</div>');
			redirect(base_url());
		}
	}