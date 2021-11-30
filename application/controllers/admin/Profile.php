<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->check_login->check();

        $this->load->model('user_model');
        $this->load->model('profile_model');
    }



    public function index()
    {

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data = [
            'title' => 'Edit Profile',
            'isi' => 'admin/profile/edit',
            'user' => $user
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function edit()
    {

        $user = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        //validasi
        $valid = $this->form_validation;


        $valid->set_rules(
            'nama',
            'Name',
            'required',
            array('required'        => '%s harus diisi')
        );


        $valid->set_rules(
            'no_telp',
            'No telp',
            'required',
            array('required'        => '%s harus diisi')
        );


        if ($valid->run()) {
            //jika tidak kosong maka akan di proses
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']          = './assets/image/profile/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 9024;
                $config['remove_spaces']        = TRUE;
                $config['file_name']            = time() . '-' . $_FILES['image']['name'];
                // $config['max_width']            = 2024;
                // $config['max_height']           = 2068;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $data = array(
                        'title' => 'Edit Profile',
                        'error_upload' => $this->upload->display_errors(),
                        'user' => $user,
                        'isi' => 'admin/profile/edit'
                    );


                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                } else {

                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/image/profile/' . $upload_data['uploads']['file_name'];
                    $config['new_image']        = './assets/image/profile/thumbs/' . $upload_data['uploads']['file_name'];
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 600;
                    $config['height']           = 400;
                    $config['rotation_angle']   = 'hor';
                    $config['quality']          = '90%';
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $i = $this->input;
                    //hapus gambar lama jika ada gambar baru



                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {

                        unlink(FCPATH . 'assets/image/profile/' . $old_image);
                        unlink(FCPATH . 'assets/image/profile/thumbs/' . $old_image);
                    }
                    $i = $this->input;
                    $data = array(
                        'id_user'   => $this->session->userdata('id_user'),
                        'nama'      => $i->post('nama'),
                        'email'       => $i->post('email'),
                        'no_telp'    => $i->post('no_telp'),
                        'image'     => $upload_data['uploads']['file_name']
                    );

                    $this->profile_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Updated');
                    // $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
                    redirect('admin/profile');
                }
            } else {
                $i = $this->input;
                $data = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'nama'        => $i->post('nama'),
                    'email'       => $i->post('email'),
                    'no_telp'    => $i->post('no_telp'),

                );

                $this->profile_model->edit($data);
                $this->session->set_flashdata('sukses', 'Updated');
                redirect('admin/profile');
            }
        }

        //masuk database
        $data = array(
            'title' => 'Edit Profile',
            'user' => $user,
            'isi' => 'admin/profile/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    public function changePassword()
    {

        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $data = array(
                'title' => 'Change Password',
                'isi' => 'admin/profile/changepassword'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('admin/profile/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('admin/profile/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('flash', 'Updated');
                    redirect('admin/profile/changepassword');
                }
            }
        }
    }
}
