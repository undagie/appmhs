<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/mahasiswa/updateMahasiswa" method="POST">
                <input type="hidden" name="NIM" value="<?= $data['mahasiswa']['NIM']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama mahasiswa..." name="Nama" value="<?= $data['mahasiswa']['Nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Masukkan alamat mahasiswa..." name="Alamat"><?= $data['mahasiswa']['Alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Masukkan email mahasiswa..." name="Email" value="<?= $data['mahasiswa']['Email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor telepon mahasiswa..." name="NomorTelepon" value="<?= $data['mahasiswa']['NomorTelepon']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="TanggalLahir" value="<?= $data['mahasiswa']['TanggalLahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="JenisKelamin">
                            <option value="Pria" <?= ($data['mahasiswa']['JenisKelamin'] == 'Pria') ? 'selected' : ''; ?>>Pria</option>
                            <option value="Wanita" <?= ($data['mahasiswa']['JenisKelamin'] == 'Wanita') ? 'selected' : ''; ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <select class="form-control" name="ProgramStudiID">
                            <option value="">Pilih Program Studi</option>
                            <?php foreach ($data['programstudi'] as $row) : ?>
                                <option value="<?= $row['ProgramStudiID']; ?>" <?= ($data['mahasiswa']['ProgramStudiID'] == $row['ProgramStudiID']) ? 'selected' : ''; ?>>
                                    <?= $row['NamaProgramStudi']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->