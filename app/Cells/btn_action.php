<?php if ($type == 'edit') : ?>
    <button class="btn btn-sm btn-warning btn-edit"><i class="fas fa-edit"></i> Ubah</button>
<?php elseif ($type == 'delete') : ?>
    <button class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i> Hapus</button>
<?php elseif ($type == 'detail') : ?>
    <button class="btn btn-sm btn-success btn-detail"><i class="fas fa-eye"></i> Baca</button>
<?php elseif ($type == 'read') : ?>
    <button class="btn btn-sm btn-outline-success btn-detail"><i class="fas fa-eye"></i> dibaca</button>
<?php elseif ($type == 'disposisi') : ?>
    <button class="btn btn-sm btn-secondary btn-disposisi"><i class="fas fa-paper-plane"></i> Disposisi</button>
<?php endif ?>