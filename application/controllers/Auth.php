<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function registrasi()
    {
        $this->load->view('auth/registrasi');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function proses_login()
    {
        $akun = $this->akun->get_data_by_email($this->input->post('email'));

        if (!empty($akun)) {
            if (password_verify($this->input->post('password'), $akun->password)) {
                $data = [
                    'akun' => $akun->id,
                    'nama' => $akun->nama,
                    'email' => $akun->email,
                    'role' => $akun->role,
                    'id_status' => $akun->id_status,
                ];
                if ($akun->id_status == 1) {
                    $this->session->set_userdata($data);
                }

                if ($akun->id_status == null) {
                    return redirect('auth/waiting');
                } else {
                    if ($akun->role == 'admin') {
                        return redirect('admin');
                    } else if ($akun->role == 'brand') {
                        if ($akun->id_status == 1) {
                            return redirect('brand/myBrand');
                        } else {
                            $this->session->set_flashdata(
                                'pesan',
                                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Mohon maaf brand anda ditolak!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>'
                            );
                            return redirect('auth/login');
                        }
                    } else {
                        return redirect('/');
                    }
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Email atau password salah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                );
                return redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Akun belum terdaftar!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            return redirect('auth/login');
        }
    }

    public function daftar()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'bidang' => $this->bidang->get_data(),
            'level' => $this->level->get_data(),
        ];

        $this->load->view('auth/daftar_brand', $data);
    }

    public function proses_daftar()
    {
        $config['upload_path']          = './assets/img/logo';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            $logo = $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                    . $this->upload->display_errors() .
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('auth/registrasi');
        }

        $data_akun = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role' => 'brand',
        ];

        $id_account = $this->akun->tambah($data_akun);

        $data_brand = [
            'id_account' => $id_account,
            'nama_brand' => $this->input->post('brand'),
            'logo' => $logo,
            'deskripsi' => $this->input->post('deskripsi'),
            'id_bidang' => $this->input->post('bidang'),
            'id_level' => $this->input->post('level'),
        ];

        $id_brand = $this->brand->tambah($data_brand);

        $data_kontak = [
            'id_brand' => $id_brand,
            'onlineshop' => $this->input->post('os'),
            'whatsapp' => $this->input->post('wa'),
            'socialmedia' => $this->input->post('sm'),
        ];

        $this->brand->tambah_kontak($data_kontak);

        return redirect('auth/waiting');
    }

    public function waiting()
    {
        $data = [
            'aktif' => ''
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('waiting/index');
        $this->load->view('layout/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('akun');
        $this->session->unset_userdata('avatar');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('id_status');

        redirect('auth/login');
    }
}
