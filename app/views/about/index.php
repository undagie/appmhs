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
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 text-right">
                        Nama :
                    </div>
                    <div class="col-md-10 text-left">
                        <?= $data['nama']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        No. Hp :
                    </div>
                    <div class="col-md-10 text-left">
                        <?= $data['no_hp']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        Alamat :
                    </div>
                    <div class="col-md-10 text-left">
                        <?= $data['alamat']; ?>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->