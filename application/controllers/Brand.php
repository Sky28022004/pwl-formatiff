<?php
defined('BASEPATH') or exit('No direct script access allowed');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Brand extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }

    public function index()
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'brand' => $this->brand->get_data()
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/brand/index', $data);
        $this->load->view('admin/layout/footer');
    }

    public function detail($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $data = [
            'brand' => $this->brand->get_data_by_id($id),
            'galery' => $this->brand->get_galery_by_id($id)
        ];

        $this->load->view('admin/layout/header');
        $this->load->view('admin/brand/detail', $data);
        $this->load->view('admin/layout/footer');
    }

    public function myBrand()
    {
        if ($this->session->userdata('role') != 'brand' && $this->session->userdata('id_status') != '1') {
            return redirect('auth/login');
        }

        $brand = $this->brand->get_data_by_id_account($this->session->userdata('akun'));

        $data = [
            'aktif' => 'my',
            'brand' => $brand,
            'galery' => $this->brand->get_galery_by_id($brand->id)
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('merchant/index');
        $this->load->view('layout/footer');
    }

    public function tambah_foto()
    {
        if ($this->session->userdata('role') != 'brand' && $this->session->userdata('id_status') != '1') {
            return redirect('auth/login');
        }

        $config['upload_path']          = './assets/img/galery';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data('file_name');
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
            redirect('brand/myBrand');
        }

        $brand = $this->brand->get_data_by_id_account($this->session->userdata('akun'));

        $data = [
            'id_brand' => $brand->id,
            'galery' => $foto
        ];

        $cek = $this->brand->tambah_foto($data);

        if ($cek) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Foto berhasil ditambah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Foto gagal ditambah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }

        return redirect('brand/myBrand');
    }

    public function konfirmasi($id, $status)
    {
        if ($this->session->userdata('role') != 'admin') {
            return redirect('auth/login');
        }

        $brand = $this->brand->get_data_by_id_account($id);

        $to                 = $brand->email;
        $subject            = "Account Verification";
        if ($status == 1) {
            $message            = "
            <h1>Account Verification</h1>
            <h3>Akun anda berhasil disetujui</h3>
            <p>Terima kasih </p>
            ";
        } else {
            $message            = "
            <h1>Account Verification</h1>
            <h3>Mohon maaf akun anda telah ditolak</h3>
            <p>silahkan hubungi admin untuk informasi lebih lanjut</p>
            ";
        }

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.googlemail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '....@gmail.com'; // ubah dengan alamat email Anda
            $mail->Password   = '....'; // ubah dengan app password yang telah diuat
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('...@gmail.com', 'nama'); // ubah dengan alamat email Anda
            $mail->addAddress($to);
            $mail->addReplyTo('....@gmail.com', 'nama'); // ubah dengan alamat email Anda

            // Isi Email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();

            // Pesan Berhasil Kirim Email/Pesan Error

            $this->session->set_flashdata(
                'email',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berhasil mengirim email
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );

            $update = $this->brand->konfirmasi($id, $status);

            if ($update) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil dikonfirmasi
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
                );
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data gagal dikonfirmasi
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
                );
            }
        } catch (Exception $e) {
            $this->session->set_flashdata(
                'email',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ' . $mail->ErrorInfo . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }

        return redirect('brand');
    }
}
