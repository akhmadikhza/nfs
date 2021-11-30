<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
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
        $this->load->model('kelas_model');
    }
    public function index()
    {

        $kelas = $this->kelas_model->listing();

        //we must validation form first


        $this->form_validation->set_rules(
            'nama_kelas',
            'Nama kelas',
            'required|is_unique[kelas.nama_kelas]',

            array(
                'required'    => '%s This fill is requred!',
                'is_unique'    => '%s <strong>' . $this->input->post('nama_kelas') .
                    '</strong>is exist.Try another one!'
            )
        );

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Daftar Kategori  (' . count($kelas) . ')',
                'kelas' => $kelas,
                'isi' => 'admin/kelas/list'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $slug_kelas = url_title($this->input->post('nama_kelas'), 'dash', TRUE);
            $data = array(
                'slug_kelas'    => $slug_kelas,
                'nama_kelas'    => $i->post('nama_kelas')
            );
            $this->kelas_model->tambah($data);
            $this->session->set_flashdata('flash', 'Added');

            redirect(base_url('admin/category'), 'refresh');
        }
    }



    public function edit($id_kelas)
    {
        $kelas = $this->kelas_model->detail($id_kelas);

        //we must validation form first


        $this->form_validation->set_rules(
            'nama_kelas',
            'Nama kelas',
            'required',
            array('required'    => '%s harus diisi')
        );

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Edit Kelas',
                'kelas' => $kelas,
                'isi' => 'admin/kelas/edit'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $slug_kelas = url_title($this->input->post('nama_kelas'), 'dash', TRUE);
            $data = array(
                'id_kelas'    => $id_kelas,
                'slug_kelas'    => $slug_kelas,
                'nama_kelas'    => $i->post('nama_kelas')
            );
            $this->kelas_model->edit($data);
            $this->session->set_flashdata('flash', 'Edited');
            redirect(base_url('admin/category'), 'refresh');
        }
    }

    public function delete($id_kelas)
    {
        $this->check_login->check();
        $kelas = $this->kelas_model->detail($id_kelas);
        $data = array('id_kelas'    => $kelas['id_kelas']);
        $this->kelas_model->delete($data);
        $this->session->set_flashdata('flash', 'Deleted');
        redirect('admin/category');
    }
}
