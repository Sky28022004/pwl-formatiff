<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand_model extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('brand', $data);

        return $this->db->insert_id();
    }

    public function tambah_kontak($data)
    {
        $data = $this->db->insert('kontak', $data);

        return $data;
    }

    public function get_data()
    {
        $data = $this->db->select('*')
            ->from('brand')
            ->join('account', 'account.id = brand.id_account')
            ->join('bidang', 'bidang.id = brand.id_bidang')
            ->join('level', 'level.id = brand.id_level')
            ->join('kontak', 'kontak.id_brand = brand.id')
            ->get()
            ->result();

        return $data;
    }

    public function get_data_by_id($id)
    {
        $data = $this->db->select('*')
            ->from('brand')
            ->join('account', 'account.id = brand.id_account')
            ->join('bidang', 'bidang.id = brand.id_bidang')
            ->join('level', 'level.id = brand.id_level')
            ->join('kontak', 'kontak.id_brand = brand.id')
            ->where('brand.id', $id)
            ->get()
            ->row();

        return $data;
    }

    public function tambah_foto($data)
    {
        $data = $this->db->insert('galery', $data);

        return $data;
    }

    public function get_aktif_brand()
    {
        $data = $this->db->select('*')
            ->from('brand')
            ->join('account', 'account.id = brand.id_account')
            ->join('bidang', 'bidang.id = brand.id_bidang')
            ->join('level', 'level.id = brand.id_level')
            ->join('kontak', 'kontak.id_brand = brand.id')
            ->where('account.id_status', 1)
            ->get()
            ->result();

        return $data;
    }

    public function get_data_by_id_account($id)
    {
        $data = $this->db->select('*')
            ->from('brand')
            ->join('account', 'account.id = brand.id_account')
            ->join('bidang', 'bidang.id = brand.id_bidang')
            ->join('level', 'level.id = brand.id_level')
            ->join('kontak', 'kontak.id_brand = brand.id')
            ->where('brand.id_account', $id)
            ->get()
            ->row();

        return $data;
    }

    public function konfirmasi($id, $status)
    {
        $data = $this->db->where('id', $id)
            ->update('account', ['id_status' => $status]);

        return $data;
    }

    public function get_galery_by_id($id)
    {
        $data = $this->db->select('*')
            ->from('galery')
            ->where('id_brand', $id)
            ->get()
            ->result();

        return $data;
    }
}
