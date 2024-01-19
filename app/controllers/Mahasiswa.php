<?php
class Mahasiswa extends Controller
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
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Mahasiswa';
        $data['programstudi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/create', $data);
        $this->view('templates/footer');
    }

    public function simpanMahasiswa()
    {
        if ($this->model('MahasiswaModel')->tambahMahasiswa($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function edit($NIM)
    {
        $data['title'] = 'Edit Mahasiswa';
        $data['programstudi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaByNIM($NIM);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/edit', $data);
        $this->view('templates/footer');
    }

    public function updateMahasiswa()
    {
        if ($this->model('MahasiswaModel')->updateDataMahasiswa($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function hapus($NIM)
    {
        if ($this->model('MahasiswaModel')->deleteMahasiswa($NIM) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->cariMahasiswa();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Mahasiswa';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('mahasiswa/lihatlaporan', $data);
    }

    public function laporan()
    {
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $pdf = new FPDF('p', 'mm', 'A4');

        // membuat halaman baru 
        $pdf->AddPage();

        // Tambahkan kop surat di sini
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 6, 'Universitas Islam Kalimantan Muhammad Arsyad Al Banjari Banjarmasin', 0, 1, 'C'); // Nama universitas
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(190, 6, 'Jalan Adhyaksa No. 2 Kayutangi Banjarmasin', 0, 1, 'C'); // Alamat universitas
        $pdf->Cell(190, 6, 'Telp. +123456789', 0, 1, 'C'); // Nomor telepon universitas
        $pdf->Cell(190, 6, 'Website: www.uniska-bjm.ac.id', 0, 1, 'C'); // Website universitas

        // Spasi sebelum judul laporan
        $pdf->Cell(10, 7, '', 0, 1);

        // setting jenis font yang akan digunakan 
        $pdf->SetFont('Arial', 'B', 14);
        // mencetak string  
        $pdf->Cell(190, 7, 'LAPORAN MAHASISWA', 0, 1, 'C');

        // Memberikan space kebawah agar tidak terlalu rapat 
        $pdf->Cell(10, 7, '', 0, 1);

        // Header tabel
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'NIM', 1, 0, 'C'); // Isi di tengah
        $pdf->Cell(80, 6, 'Nama', 1, 0, 'C'); // Isi di tengah
        $pdf->Cell(50, 6, 'Program Studi', 1, 0, 'C'); // Isi di tengah
        $pdf->Cell(30, 6, 'Nomor Telepon', 1, 0, 'C'); // Isi di tengah
        $pdf->Ln();

        // Isi tabel
        $pdf->SetFont('Arial', '', 10);
        foreach ($data['mahasiswa'] as $row) {
            $pdf->Cell(30, 6, $row['NIM'], 1, 0, 'C'); // Isi di tengah
            $pdf->Cell(80, 6, $row['Nama'], 1, 0, 'C'); // Isi di tengah
            $pdf->Cell(50, 6, $row['NamaProgramStudi'], 1, 0, 'C'); // Isi di tengah
            $pdf->Cell(30, 6, $row['NomorTelepon'], 1, 0, 'C'); // Isi di tengah
            $pdf->Ln();
        }

        $pdf->Output('I', 'Laporan Mahasiswa.pdf', true);
    }
}
