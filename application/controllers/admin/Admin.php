<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->check_login->check();
		$user = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		if ($user['role_id'] == 2) {
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">You dont have permission to access this page !</div>');
			redirect('admin/user');
		}


		$this->load->model('user_model');
	}
	public function index()
	{

		//ambil data user berdasarkan data login

		$this->check_login->check();
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data = array(
			'title' => 'Welcome to Dashboard Page! ',
			'isi' => 'admin/dashboard/admin',
			'user' => $user
		);

		$this->load->view('admin/layout/wrapper', $data);
	}
}
