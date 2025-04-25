<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{
    public function index()
    {
        $data = [
            'aktif' => 'beranda'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('index');
        $this->load->view('layout/footer');
    }

    public function about()
    {
        $data = [
            'aktif' => 'about'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('about');
        $this->load->view('layout/footer');
    }

    public function contact()
    {
        $data = [
            'aktif' => 'contact'
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('kontak');
        $this->load->view('layout/footer');
    }

    public function brand()
    {
        $data = [
            'aktif' => 'brand',
            'bidang' => $this->bidang->get_data(),
            'brand' => $this->brand->get_aktif_brand(),
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('brand');
        $this->load->view('layout/footer');
    }

    public function brand_detail($id)
    {
        $brand = $this->brand->get_data_by_id($id);

        $data = [
            'aktif' => 'brand',
            'brand' => $brand,
            'galery' => $this->brand->get_galery_by_id($brand->id),
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('detail');
        $this->load->view('layout/footer');
    }

    public function kirim_pesan()
    {
        $data = [
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'pesan' => $this->input->post('pesan'),
        ];

        $cek = $this->pesan->kirim($data);

        if ($cek) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    pesan berhasil dikirim
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Pesan gagal dikirim
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }

        return redirect('visitor/contact');
    }
}
