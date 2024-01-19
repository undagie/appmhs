<?php
class ProgramStudiModel
{
    private $table = 'ProgramStudi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProgramStudi()
    {
        $this->db->query('SELECT ProgramStudi.*, Fakultas.NamaFakultas FROM ProgramStudi LEFT JOIN Fakultas ON ProgramStudi.FakultasID = Fakultas.FakultasID');

        return $this->db->resultSet();
    }


    public function getProgramStudiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' LEFT JOIN Fakultas ON ProgramStudi.FakultasID = Fakultas.FakultasID WHERE ProgramStudiID=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahProgramStudi($data)
    {
        $query = "INSERT INTO ProgramStudi(NamaProgramStudi, Deskripsi, FakultasID) VALUES (:nama_program_studi, :deskripsi, :fakultas_id)";
        $this->db->query($query);
        $this->db->bind('nama_program_studi', $data['nama_program_studi']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('fakultas_id', $data['fakultas_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataProgramStudi($data)
    {
        $query = 'UPDATE ProgramStudi SET NamaProgramStudi=:nama_program_studi, Deskripsi=:deskripsi, FakultasID=:fakultas_id WHERE ProgramStudiID=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_program_studi', $data['nama_program_studi']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('fakultas_id', $data['fakultas_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteProgramStudi($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE ProgramStudiID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariProgramStudi()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' LEFT JOIN Fakultas ON ProgramStudi.FakultasID = Fakultas.FakultasID WHERE NamaProgramStudi LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
