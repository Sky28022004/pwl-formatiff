<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('account', $data);

        return $this->db->insert_id();
    }

    public function get_data_by_email($email)
    {
        $data = $this->db->select('*')
            ->from('account')
            ->where('email', $email)
            ->get()
            ->row();

        return $data;
    }

    public function disetujui()
    {
        $data = $this->db->select('*')
            ->from('account')
            ->where('id_status', 1)
            ->get()
            ->num_rows();

        return $data;
    }

    public function ditolak()
    {
        $data = $this->db->select('*')
            ->from('account')
            ->where('id_status', 0)
            ->get()
            ->num_rows();

        return $data;
    }

    public function konfirmasi()
    {
        $data = $this->db->select('*')
            ->from('account')
            ->where('id_status', null)
            ->get()
            ->num_rows();

        return $data;
    }
}
