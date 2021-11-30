<?php
class User_model extends CI_Model
{
    public function listing()

    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function user_token()
    {
        $this->db->select('*');
        $this->db->from('user_token');
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function comment_list()
    {
        $this->db->select('*');
        $this->db->from('komen');
        $this->db->join('user', 'user.id_user =  komen.id_user', 'LEFT');
        $this->db->order_by('id_komen');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function detail_token($id)
    {
        $this->db->select('*');
        $this->db->from('user_token');
        $this->db->where('id', $id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_token($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('user_token', $data);
    }


    public function tambah($data)
    {
        $this->db->insert('user', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('user', $data);
    }
}
