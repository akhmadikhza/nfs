<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Route extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->check_login->check();
        if ($this->session->userdata('role_id') != 1) {
            redirect('admin/user');
        } else {
            redirect('admin/admin');
        }

        $this->load->model('user_model');
    }

    public function index()
    {
        echo 'welcome';
    }
}
