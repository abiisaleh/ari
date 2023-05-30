<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<div class="col-md-4 col-12">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pegawai</h3>
                </div>
                <div class="card-body">
                    <h3 class="profile-username text-center"><?= $data['nama'] ?></h3>

                    <p class="text-muted text-center"><?= $data['nip'] ?></p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Gol/Ruang</b> <a class="float-right"><?= $data['gol'] . '/' . $data['ruang'] ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Jenis Kelamin</b> <a class="float-right"><?= $data['jk'] ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Telp</b> <a class="float-right"><?= $data['telp'] ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Disposisi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Tanggal Penyelesaian</strong>

                    <p class="text-muted"><?= $data['tgl_penyelesaian'] ?></p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Isi</strong>

                    <p class="text-muted"><?= $data['isi'] ?></p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Lapiran</strong>

                    <p class="text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<div class="col-md-8 col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Surat</h3>
        </div>
        <div class="card-body">

        </div>
    </div>
</div>
<?php $this->endsection(); ?>