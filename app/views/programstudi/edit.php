<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Program Studi</h1>
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
            <form role="form" action="<?= base_url; ?>/programstudi/updateProgramStudi" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['programstudi']['ProgramStudiID']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Program Studi</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama program studi..." name="nama_program_studi" value="<?= $data['programstudi']['NamaProgramStudi']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan deskripsi program studi..." name="deskripsi"><?= $data['programstudi']['Deskripsi']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Fakultas</label>
                        <select class="form-control" name="fakultas_id">
                            <?php foreach ($data['fakultas'] as $fakultas) : ?>
                                <option value="<?= $fakultas['FakultasID']; ?>" <?= ($data['programstudi']['FakultasID'] == $fakultas['FakultasID']) ? 'selected' : ''; ?>>
                                    <?= $fakultas['NamaFakultas']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->