<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_list extends CI_Controller
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
		$this->load->model('materi_model');
	}


	//listing data user
	public function index()
	{

		$user = $this->user_model->listing();
		$data = array(
			'title' => 'Data User Administator(' . count($user) . ')',
			'user' => $user,
			'isi' => 'admin/user/list'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function tambah()
	{


		//validasi first
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama',
			'Nama',
			'required|trim|is_unique[user.nama]|min_length[4]|max_length[520]',
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
			'required|trim|valid_email|is_unique[user.email]|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'is_unique'		=> '%s <strong>' . $this->input->post('email') .
					'</strong> has been already taken.Try another one!',
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


		if ($valid->run() ==  FALSE) {

			$data = array(
				'title' => 'Add User Administator',
				'isi' => 'admin/user/tambah'
			);

			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {

			$data = array(
				'nama'	=> htmlspecialchars($this->input->post('nama', true)),
				'email'	=> htmlspecialchars($this->input->post('email', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password'	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'akses_level'	=> htmlspecialchars($this->input->post('akses_level', true))
			);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data has been saved!');
			redirect(base_url('admin/user'), 'refresh');
		}
	}


	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);

		//validasi first
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama',
			'Nama',
			'required|trim|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s too short!',
				'max_length'	=> '%s max 20 characters!'
			)
		);

		$valid->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|min_length[4]|max_length[520]',
			array(
				'required'		=> '%s is required!',
				'min_length'	=> '%s min 4 characters!',
				'max_length'	=> '%s max 20 characters!'
			)
		);



		if ($valid->run() ==  FALSE) {

			$data = array(
				'title' => 'Edit User :  ' . $user['nama'],
				'user'	=> $user,
				'isi' => 'admin/user/edit'
			);

			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_user'	=> $id_user,
				'nama'	=> htmlspecialchars($this->input->post('nama', true)),
				'email'	=> htmlspecialchars($this->input->post('email', true)),
				// 'image' => 'default.png',
				// 'password'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'	=> $this->input->post('role_id'),
				'is_active'	=> $this->input->post('is_active')
			);
			$this->user_model->edit($data);
			$this->session->set_flashdata('flash', 'Edited');
			redirect(base_url('admin/user_list'), 'refresh');
		}
	}



	public function delete($id_user)
	{

		$user = $this->user_model->detail($id_user);
		//hapus image
		$old_image = $user['image'];
		if ($old_image != 'default.png') {

			unlink(FCPATH . 'assets/image/profile/' . $old_image);
		}

		$data = array('id_user'	=> $user['id_user']);
		$this->user_model->delete($data);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/user_list');
	}


	public function user_token()
	{
		$user_token = $this->user_model->user_token();
		$data = array(
			'title' => 'Data User Token(' . count($user_token) . ')',
			'user_token' => $user_token,
			'isi' => 'admin/user/user_token'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete_token($id)
	{
		$user_token = $this->user_model->detail_token($id);
		$data = array('id'	=> $user_token['id']);
		$this->user_model->delete_token($data);
		$this->session->set_flashdata('sukses', 'Data has been deleted!');
		redirect('admin/user_list/user_token');
	}


	public function comment_list()
	{
		$comment_list = $this->user_model->comment_list();
		$data = array(
			'title' => 'Data Comments(' . count($comment_list) . ')',
			'comment_list' => $comment_list,
			'isi' => 'admin/user/comment_list'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function comment_del($id_komen)
	{
		$komen = $this->materi_model->detail_komen($id_komen);
		//hapus image
		if ($komen['file_baru'] != "") {
			unlink('./assets/upload/lampiran/' . $komen['file_baru']);
		}
		$data = array('id_komen'	=> $komen['id_komen']);
		$this->materi_model->delete_komen($data);
		$this->session->set_flashdata('sukses', 'Your message was succesfully  deleted!');
		redirect('admin/user_list/comment_list');
	}
}
