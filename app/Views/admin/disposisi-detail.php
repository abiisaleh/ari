<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<div class="col-md-4 col-12">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Disposisi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-calendar mr-1"></i> Tanggal Penyelesaian</strong>

                    <p class="text-muted"><?= $data['tgl_penyelesaian'] ?></p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Isi</strong>

                    <p class="text-muted"><?= $data['isi'] ?></p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Lapiran</strong>

                    <div class="d-block py-2">
                        <a class="btn btn-sm btn-danger" href="disposisi-print/<?= $data['no'] ?>"><i class="fas fa-paperclip"></i> File</a>
                    </div>
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
            <iframe src="uploads/<?= $data['scan_surat'] ?>" width="100%" height="600px"></iframe>
        </div>
    </div>
</div>
<?php $this->endsection(); ?>