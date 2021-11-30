<?php
class Materi_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('materi.*,
                            kelas.nama_kelas, kelas.slug_kelas,
                            user.nama,user.email');
        $this->db->from('materi');
        // join
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');
        $this->db->order_by('id_materi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function total()
    {
        $this->db->select('materi.*,kelas.nama_kelas, kelas.slug_kelas, user.nama,user.email');
        $this->db->from('materi');
        // join
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');
        $this->db->order_by('id_materi', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function total_kelas($id_kelas)
    {
        $this->db->select('materi.*,kelas.nama_kelas, kelas.slug_kelas, user.nama,user.email');
        $this->db->from('materi');
        // join
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');
        $this->db->where(array(
            'materi.id_kelas' => $id_kelas
        ));
        $this->db->order_by('id_materi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    //listing kategori berita home page
    public function materi_kelas($id_kelas, $limit, $start)
    {
        $this->db->select('materi.*,kelas.nama_kelas, kelas.slug_kelas, user.nama,user.email');
        $this->db->from('materi');
        // join
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');
        $this->db->where(array(

            'materi.id_kelas' => $id_kelas
        ));
        $this->db->order_by('id_materi', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    //read berita
    public function read($slug_materi)
    {
        $this->db->select('materi.*,kelas.nama_kelas, kelas.slug_kelas, 
        user.nama,user.email, user.image');
        $this->db->from('materi');
        // join
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');

        $this->db->where(array(
            'materi.slug_materi' => $slug_materi
        ));

        $this->db->order_by('id_materi', 'DESC');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function artikel($limit, $start)
    {
        $this->db->select('materi.*,
                            kelas.nama_kelas, kelas.slug_kelas,
                            user.nama,user.email');
        $this->db->from('materi');
        // join
        $this->db->join('kelas', 'kelas.id_kelas = materi.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  materi.id_user', 'LEFT');
        $this->db->order_by('id_materi', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('materi', $data);
    }

    public function komen()
    {
        $this->db->select('komen.*,
                             kelas.nama_kelas,
                            user.nama,user.email');
        $this->db->from('komen');
        // join
        $this->db->join('kelas', 'kelas.id_kelas = komen.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  komen.id_user', 'LEFT');
        $this->db->order_by('id_komen', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($id_materi)
    {
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->where('id_materi', $id_materi);
        $this->db->order_by('id_materi');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function detail_komen($id_komen)
    {
        $this->db->select('*');
        $this->db->from('komen');
        $this->db->where('id_komen', $id_komen);
        $this->db->join('kelas', 'kelas.id_kelas = komen.id_kelas', 'LEFT');
        $this->db->join('user', 'user.id_user =  komen.id_user', 'LEFT');
        $this->db->order_by('id_komen');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit_komen($data)
    {
        $this->db->where('id_komen', $data['id_komen']);
        $this->db->update('komen', $data);
    }

    public function delete_komen($data)
    {
        $this->db->where('id_komen', $data['id_komen']);
        $this->db->delete('komen', $data);
    }
    public function edit($data)
    {

        $this->db->where('id_materi', $data['id_materi']);
        $this->db->update('materi', $data);
    }

    public function delete($data)
    {

        // $this->db->delete('berita', array('id' => $id));
        $this->db->where('id_materi', $data['id_materi']);
        $this->db->delete('materi', $data);
    }
}
