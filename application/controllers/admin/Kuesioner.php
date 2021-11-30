<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->check_login->check();


        $this->load->model('kuesioner_model');
        $this->load->model('kelas_model');
    }

    //listing data berita
    public function index()
    {
        if ($this->session->userdata('role_id') == 2) {
            $this->session->set_flashdata('sukses', 'You dont have any privilages to accsess this page!');
            redirect('admin/user');
        }
        $kuesioner = $this->kuesioner_model->listing();



        //we must validation form first


        $this->form_validation->set_rules(
            'ask',
            'Question',
            'required',
            array(
                'required'    => '%s This fill is requred!',

            )
        );

        if ($this->form_validation->run() == FALSE) {


            $data = array(
                'title' => 'Kuesioner (' . count($kuesioner) . ')',
                'kuesioner' => $kuesioner,
                'isi' => 'admin/kuesioner/list'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {

            $i = $this->input;
            $data = array(
                'id_user '        => $this->session->userdata('id_user'),
                'ask'    => $i->post('ask'),
                'isi_first' => 'Ya',
                'isi_second' => 'Tidak',
                'date_created' => date('Y-m-d H:i:s')
            );
            $this->db->insert('question', $data);
            $this->session->set_flashdata('flash', 'Added');

            redirect(base_url('admin/kuesioner'), 'refresh');
        }
    }


    public function edit($id_question)
    {
        $question = $this->kuesioner_model->detail($id_question);

        //we must validation form first


        $this->form_validation->set_rules(
            'ask',
            'Question',
            'required',
            array(
                'required'    => '%s This fill is requred!',

            )
        );
        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Edit Kuesioner',
                'question' => $question,
                'isi' => 'admin/kuesioner/edit'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id_question' => $id_question,
                'id_user '        => $this->session->userdata('id_user'),
                'ask'    => $i->post('ask'),
                'isi1' => 'Ya',
                'isi2' => 'Tidak',
                'date_created' => date('Y-m-d H:i:s')
            );
            $this->kuesioner_model->edit($data);
            $this->session->set_flashdata('flash', 'Edited');
            redirect(base_url('admin/kuesioner'), 'refresh');
        }
    }


    public function show_take()
    {
        $kuesioner = $this->kuesioner_model->listing();
        $data = array(
            'title' => 'Take Kuesioner',
            'kuesioner' => $kuesioner,
            'isi' => 'admin/kuesioner/take'
        );

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function take()
    {
        $kuesioner = $this->kuesioner_model->listing();



        $this->form_validation->set_rules(
            'isi',
            'Question',
            'required',
            array(
                'required'    => '%s This fill is requred!',

            )
        );

        // $ketua = $this->input->post('ketua');
        // echo $ketua;
        // $cek_dataketua = $this->kuesioner_model->read_vote($ketua)->result();
        // foreach ($cek_dataketua as $k) {
        //     $value_ketua = $k->jumlah_vote;
        // }

        // $tambah_dataketua = ++$value_ketua;
        // $update_dataketua = $this->kuesioner_model->add_vote($tambah_dataketua, $ketua);


        // if ($update_dataketua !== FALSE) {
        //     $this->kuesioner_model->update_statusvote();
        // }



        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Take Kuesioner',
                'kuesioner' => $kuesioner,
                'isi' => 'admin/kuesioner/take'
            );

            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_question' => $i->post('id_question'),
                'id_user' => $this->session->userdata('id_user'),
                'isi'  => $this->input->post('isi'),
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('answer', $data);

            $this->session->set_flashdata('flash', 'Added');
            redirect(base_url('admin/kuesioner/take'), 'refresh');
        }
    }




    public function delete($id_question)
    {
        $this->check_login->check();
        $question = $this->kuesioner_model->detail($id_question);
        $data = array('id_question'    => $question['id_question']);
        $this->kuesioner_model->delete($data);
        $this->session->set_flashdata('flash', 'Deleted');
        redirect('admin/kuesioner');
    }
}//end of the line
