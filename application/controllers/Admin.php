<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            's' => $this->akun->disetujui(),
            't' => $this->akun->ditolak(),
            'k' => $this->akun->konfirmasi()
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function pesan()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'pesan' => $this->pesan->get_data(),
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/pesan/index', $data);
        $this->load->view('admin/layout/footer');
    }
}
