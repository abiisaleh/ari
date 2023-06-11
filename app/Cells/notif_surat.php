<?php
$surat = model('SuratMasukModel')->belum_dibaca()->find();
$total = model('SuratMasukModel')->belum_dibaca()->countAllResults();
?>

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <?php if ($surat) : ?>
            <span class="badge badge-danger navbar-badge"><?= $total ?></span>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php if ($surat) : ?>
            <?php foreach ($surat as $Surat) : ?>
                <a href="suratMasuk" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <?= $Surat['asal'] ?>
                                <span class="float-right text-sm text-muted"><i class="fas fa-envelope"></i></span>
                            </h3>
                            <p class="text-sm"><?= $Surat['perihal'] ?></p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= $Surat['tgl_surat'] ?></p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
            <?php endforeach; ?>
            <a href="suratMasuk" class="dropdown-item dropdown-footer">Semua Surat Masuk</a>
        <?php else : ?>
            <div class="py-4">
                <p class="text-center text-muted text-sm">Tidak ada surat masuk terbaru</p>
            </div>
        <?php endif; ?>
    </div>
</li>