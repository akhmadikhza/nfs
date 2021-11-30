<?php
class Menu_model extends CI_Model
{

    public function menu_materi()
    {
        $this->db->select('materi.*, kelas.nama_kelas, kelas.slug_kelas,  user.nama,user.email');
        $this->db->from('materi');

        // join
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');

        $this->db->group_by('materi.id_kelas');
        // $this->db->order_by('kelas.urutan', 'ASC');
        $this->db->order_by('id_materi', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function show_all()
    {
        $this->db->select('materi.*, kelas.nama_kelas, kelas.slug_kelas,  user.nama,user.email');
        $this->db->from('materi');

        // join
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');

        $this->db->group_by('materi.id_kelas');
        // $this->db->order_by('kelas.urutan', 'ASC');
        $this->db->order_by('id_materi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
