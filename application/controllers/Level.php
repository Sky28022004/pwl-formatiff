<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'level' => $this->level->get_data(),
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/level/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $this->load->view('admin/layout/header');
        $this->load->view('admin/level/tambah');
        $this->load->view('admin/layout/footer');
    }

    public function proses_tambah()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'level' => htmlspecialchars($this->input->post('level')),
            'omset' => htmlspecialchars($this->input->post('omset')),
        ];

        $cek = $this->level->tambah($data);

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

        return redirect('level');
    }

    public function edit($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'level' => $this->level->get_data_by_id($id)
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/level/edit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function proses_edit($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'level' => htmlspecialchars($this->input->post('level')),
            'omset' => $this->input->post('omset'),
        ];

        $cek = $this->level->update($id, $data);

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

        return redirect('level');
    }

    public function proses_hapus($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $cek = $this->level->hapus($id);

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

        return redirect('level');
    }
}
