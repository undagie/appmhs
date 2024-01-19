<?php

class About extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title']  = 'Halaman About Me';
        $data['nama']   = 'Muhammad Edya Rosadi';
        $data['alamat'] = 'Jalan Adhyaksa No.2 Kayutangi Banjarmasin';
        $data['no_hp']  = '08971137XXX';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}
