<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		// $this->load->model('user_model');

	}

	public function index()
	{
		//jika ada sesion login,tidak bisa akses ke halaman login
		if ($this->session->userdata('email')) {
			redirect('admin/route');
		}
		//validasi first
		$valid = $this->form_validation;

		$valid->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s minimal 4 karakter',
				'max_length'	=> '%s maksimal 20 karakter'
			)
		);

		$valid->set_rules(
			'password',
			'Password',
			'required|trim|min_length[4]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s  minimal 4 karakter'
			)
		);


		if ($valid->run() == FALSE) {
			$data = array('title' => 'Login Page');
			$this->load->view('auth/login', $data);
		} else {
			//validasinya sukses
			$this->_login();
		}
	}/*Penutup Public Login*/

	private function _login()
	{

		$email 			= $this->input->post('email');
		$password 		= $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();


		//jika usernya ada
		if ($user) {
			//usernya active
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user' => $user['id_user'],
						'nama'	=> $user['nama'],
						'email' => $user['email'],
						'role_id' => $user['role_id']

					];

					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin/admin');
					} else {
						redirect('admin/user');
					}
				} else {

					$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Email has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('admin/route');
		}
		//validasi first
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama',
			'Name',
			'required|trim|is_unique[user.nama]|min_length[4]|max_length[100]',
			array(
				'required'		=> '%s is required!',
				'is_unique'		=> '%s <strong>' . $this->input->post('nama') .
					'</strong> has been already taken.Try another one!',
				'min_length'	=> '%s too short!',
				'max_length'	=> '%s max 20 characters!'
			)
		);

		$valid->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[user.email]|min_length[4]|max_length[100]',
			array(
				'required'		=> '%s is required!',
				'is_unique'		=> '%s <strong>' . $this->input->post('email') .
					'</strong> has been already taken.Try another one!',
				'min_length'	=> '%s min 4 characters!',
				'max_length'	=> '%s max 20 characters!'
			)
		);


		$valid->set_rules(
			'no_telp',
			'No telp',
			'required|trim|min_length[10]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s min 4 characters!',
				'max_length'	=> '%s max 20 characters!'
			)
		);


		$valid->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[4]|matches[password2]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s min 4 characters!',
				'matches'		=> '%s does not match!',
				'max_length'	=> '%s max 20 characters!'

			)
		);

		$valid->set_rules(
			'password2',
			'Password2',
			'required|trim|matches[password1]|max_length[20]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s min 4 characters!',
				'max_length'	=> '%s 20 characters!'
			)
		);



		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('auth/registration', $data);
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'nama'	=> htmlspecialchars($this->input->post('nama', true)),
				'email'	=> htmlspecialchars($email),
				'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'image' => 'default.png',
				'password'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'	=> 2,
				'is_active'	=> 0,
				'status_vote'	=> 0,
				'date_created'	=> date('Y-m-d H:i:s')

			];
			// siapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');
			$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Your account was succesfully created! Please check your email !</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'rumahnifas@gmail.com',
			'smtp_pass' => 'Rumahnifas#2021!',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('rumahnifas@gmail.com', 'Shofy Rumah Nifas');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password Rumah Nifas');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}


	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
			redirect('auth');
		}
	}

	public function forgotpassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$data = array('title' => 'Forgot Password');
			$this->load->view('auth/forgotpassword', $data);
		} else {

			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
				redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
			redirect('auth');
		}
	}


	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[4]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('auth/change-password', $data);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->check_login->logout();
	}
}
