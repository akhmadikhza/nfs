<?php
class Kelas_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->order_by('id_kelas', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($id_kelas)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('id_kelas', $id_kelas);
        $this->db->order_by('id_kelas');
        $query = $this->db->get();
        return $query->row_array();
    }
    //read kelas
    public function read($slug_kelas)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('slug_kelas', $slug_kelas);
        $this->db->order_by('id_kelas');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function namket($id_kela)
    {
        $this->db->select('materi.*,
                            kelas.nama_kelas, kelas.slug_kelas,
                            user.nama,user.email');
        $this->db->from('materi');

        // join

        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');
        $this->db->where(array(
            'materi.id_kelas' => $id_kela
        ));
        // $this->db->order_by('id_berita');
        $query = $this->db->get();
        return $query->row_array();
    }



    public function tambah($data)
    {
        $this->db->insert('kelas', $data);
    }


    public function edit($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->update('kelas', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->delete('kelas', $data);
    }
}
