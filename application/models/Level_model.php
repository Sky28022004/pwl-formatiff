<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level_model extends CI_Model
{
    public function tambah($data)
    {
        $data = $this->db->insert('level', $data);

        return $data;
    }

    public function get_data()
    {
        $data = $this->db->select('*')
            ->from('level')
            ->get()
            ->result();

        return $data;
    }

    public function get_data_by_id($id)
    {
        $data = $this->db->select('*')
            ->from('level')
            ->where('id', $id)
            ->get()
            ->row();

        return $data;
    }

    public function update($id, $data)
    {
        $data = $this->db->where('id', $id)
            ->update('level', $data);

        return $data;
    }

    public function hapus($id)
    {
        $data = $this->db->delete('level', ['id' => $id]);

        return $data;
    }
}
