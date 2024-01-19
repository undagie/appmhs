<?php
class MahasiswaModel
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT mahasiswa.*, programstudi.NamaProgramStudi FROM ' . $this->table . ' JOIN programstudi ON mahasiswa.ProgramStudiID = programstudi.ProgramStudiID');
        return $this->db->resultSet();
    }

    public function getMahasiswaByNIM($NIM)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE NIM=:NIM');
        $this->db->bind('NIM', $NIM);
        return $this->db->single();
    }

    public function tambahMahasiswa($data)
    {
        $query = "INSERT INTO " . $this->table . " (NIM, Nama, Alamat, Email, NomorTelepon, TanggalLahir, JenisKelamin, ProgramStudiID) VALUES (:NIM, :Nama, :Alamat, :Email, :NomorTelepon, :TanggalLahir, :JenisKelamin, :ProgramStudiID)";
        $this->db->query($query);
        $this->db->bind('NIM', $data['NIM']);
        $this->db->bind('Nama', $data['Nama']);
        $this->db->bind('Alamat', $data['Alamat']);
        $this->db->bind('Email', $data['Email']);
        $this->db->bind('NomorTelepon', $data['NomorTelepon']);
        $this->db->bind('TanggalLahir', $data['TanggalLahir']);
        $this->db->bind('JenisKelamin', $data['JenisKelamin']);
        $this->db->bind('ProgramStudiID', $data['ProgramStudiID']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataMahasiswa($data)
    {
        $query = "UPDATE " . $this->table . " SET Nama=:Nama, Alamat=:Alamat, Email=:Email, NomorTelepon=:NomorTelepon, TanggalLahir=:TanggalLahir, JenisKelamin=:JenisKelamin, ProgramStudiID=:ProgramStudiID WHERE NIM=:NIM";
        $this->db->query($query);
        $this->db->bind('NIM', $data['NIM']);
        $this->db->bind('Nama', $data['Nama']);
        $this->db->bind('Alamat', $data['Alamat']);
        $this->db->bind('Email', $data['Email']);
        $this->db->bind('NomorTelepon', $data['NomorTelepon']);
        $this->db->bind('TanggalLahir', $data['TanggalLahir']);
        $this->db->bind('JenisKelamin', $data['JenisKelamin']);
        $this->db->bind('ProgramStudiID', $data['ProgramStudiID']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteMahasiswa($NIM)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE NIM=:NIM');
        $this->db->bind('NIM', $NIM);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariMahasiswa()
    {
        $key = $_POST['key'];
        $query = "SELECT mahasiswa.*, programstudi.NamaProgramStudi FROM " . $this->table . " JOIN programstudi ON mahasiswa.ProgramStudiID = programstudi.ProgramStudiID WHERE Nama LIKE :key OR NIM LIKE :key";
        $this->db->query($query);
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
