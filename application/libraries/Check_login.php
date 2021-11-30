<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Check_login
{
	protected $CI;
	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function check()
	{

		if (
			$this->CI->session->userdata('email') == "" &&
			$this->CI->session->userdata('role_id') == ""
		) {
			$this->CI->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">You must login!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{

		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('role_id');
		$this->CI->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">You have been succesfully logout!</div>');
		redirect('auth');
	}
}
