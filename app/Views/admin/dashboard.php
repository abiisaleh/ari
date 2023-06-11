<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<div class="col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $SuratMasuk ?></h3>

            <p>Surat Masuk</p>
        </div>
        <div class="icon">
            <i class="ion ion-email-unread"></i>
        </div>
        <a href="suratMasuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $SuratKeluar ?></h3>

            <p>Surat Keluar</p>
        </div>
        <div class="icon">
            <i class="ion ion-email"></i>
        </div>
        <a href="suratKeluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $Disposisi ?></h3>

            <p>Disposisi</p>
        </div>
        <div class="icon">
            <i class="ion ion-android-send"></i>
        </div>
        <a href="disposisi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<?php $this->endsection() ?>