<?php
class ProgramStudi extends Controller
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
        $data['title'] = 'Master Program Studi';
        $data['programstudi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('programstudi/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Master Program Studi';
        $data['programstudi'] = $this->model('ProgramStudiModel')->cariProgramStudi();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('programstudi/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Program Studi';
        $data['programstudi'] = $this->model('ProgramStudiModel')->getProgramStudiById($id);

        // Tambahkan perintah untuk mengambil data fakultas
        $data['fakultas'] = $this->model('FakultasModel')->getAllFakultas();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('programstudi/edit', $data);
        $this->view('templates/footer');
    }


    public function tambah()
    {
        $data['title'] = 'Tambah Program Studi';
        $data['fakultas'] = $this->model('FakultasModel')->getAllFakultas();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('programstudi/create', $data);
        $this->view('templates/footer');
    }

    public function simpanProgramStudi()
    {
        if ($this->model('ProgramStudiModel')->tambahProgramStudi($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/programstudi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/programstudi');
            exit;
        }
    }

    public function updateProgramStudi()
    {
        if ($this->model('ProgramStudiModel')->updateDataProgramStudi($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/programstudi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/programstudi');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('ProgramStudiModel')->deleteProgramStudi($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/programstudi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/programstudi');
            exit;
        }
    }
}
