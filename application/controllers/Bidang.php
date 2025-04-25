<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'bidang' => $this->bidang->get_data(),
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/bidang/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $this->load->view('admin/layout/header');
        $this->load->view('admin/bidang/tambah');
        $this->load->view('admin/layout/footer');
    }

    public function proses_tambah()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'bidang' => htmlspecialchars($this->input->post('bidang')),
        ];

        $cek = $this->bidang->tambah($data);

        if ($cek) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil ditambah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data gagal ditambah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }

        return redirect('bidang');
    }

    public function edit($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'bidang' => $this->bidang->get_data_by_id($id)
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/bidang/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function proses_edit($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'bidang' => htmlspecialchars($this->input->post('bidang')),
        ];

        $cek = $this->bidang->update($id, $data);

        if ($cek) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data gagal diubah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }

        return redirect('bidang');
    }

    public function proses_hapus($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $cek = $this->bidang->hapus($id);

        if ($cek) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil dihapus
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data gagal dihapus
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }

        return redirect('bidang');
    }
}
