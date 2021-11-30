<?php
class Kuesioner_model extends CI_Model
{

    public function listing()
    {
        $this->db->select('question.*,
                            user.nama,user.email');
        $this->db->from('question');
        // join
        $this->db->join('user', 'user.id_user =  question.id_user', 'LEFT');
        $this->db->order_by('id_question', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function read_vote($data)
    {

        if (isset($data)) {
            $this->db->where('ask', $data);
        }
        return $this->db->get('question');
    }


    public function update_statusvote()
    {

        $this->db->set('status_vote', 1);
        $this->db->where('email', $this->session->userdata('email'));
        return $this->db->update('user');
    }

    public function add_vote($data, $where)
    {
        $this->db->set('jumlah_vote', $data);
        $this->db->where('ask', $where);
        return $this->db->update('question');
    }






    public function detail($id_question)
    {
        $this->db->select('*');
        $this->db->from('question');
        $this->db->where('id_question', $id_question);
        $this->db->order_by('id_question');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function edit($data)
    {
        $this->db->where('id_question', $data['id_question']);
        $this->db->update('question', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_question', $data['id_question']);
        $this->db->delete('question', $data);
    }
}
