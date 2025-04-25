<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_model extends CI_Model
{
    public function tambah($data)
    {
        $data = $this->db->insert('bidang', $data);

        return $data;
    }

    public function get_data()
    {
        $data = $this->db->select('*')
            ->from('bidang')
            ->get()
            ->result();

        return $data;
    }

    public function get_data_by_id($id)
    {
        $data = $this->db->select('*')
            ->from('bidang')
            ->where('id', $id)
            ->get()
            ->row();

        return $data;
    }

    public function update($id, $data)
    {
        $data = $this->db->where('id', $id)
            ->update('bidang', $data);

        return $data;
    }

    public function hapus($id)
    {
        $data = $this->db->delete('bidang', ['id' => $id]);

        return $data;
    }
}
