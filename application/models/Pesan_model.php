<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    public function kirim($data)
    {
        $data = $this->db->insert('pesan', $data);

        return $data;
    }

    public function get_data()
    {
        $data = $this->db->select('*')
            ->from('pesan')
            ->get()
            ->result();

        return $data;
    }
}
