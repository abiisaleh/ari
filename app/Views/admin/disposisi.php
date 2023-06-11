<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<?php if (in_groups('master')) : ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Surat Masuk</h3>
            </div>
            <div class="card-body">
                <table id="tabelSurat" class="table table-bordered table-hover"></table>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Surat Disposisi</h3>
        </div>
        <div class="card-body">
            <table id="tabel" class="table table-bordered table-hover"></table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-disposisi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-disposisi">
                <div class="modal-body">

                    <?= view_cell('InputCell', 'name=no,text=No Disposisi,type=text') ?>
                    <?= view_cell('InputCell', 'name=tgl_penyelesaian,text=Tgl Penyelesaian,type=date') ?>
                    <?= view_cell('InputCell', 'name=isi,text=Isi,type=text') ?>

                    <?= view_cell('InputCell', 'name=diteruskan,text=Diteruskan ke,type=text') ?>
                    <?= view_cell('InputCell', 'name=fk_surat,text=No Surat Masuk,type=text') ?>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php $this->endsection(); ?>

<?php $this->section('script'); ?>
<script>
    <?php if (in_groups('master')) : ?>
        var dataTableSurat = $("#tabelSurat").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                "url": '<?= base_url('api/suratMasuk/disposisi') ?>'
            },
            "columns": [{
                    "title": "No",
                    "data": "no"
                },
                {
                    "title": "Tgl Surat",
                    "data": "tgl_surat"
                },
                {
                    "title": "Tgl Terima",
                    "data": "tgl_terima"
                },
                {
                    "title": "Sifat",
                    "data": "sifat"
                },
                {
                    "title": "Perihal",
                    "data": "perihal"
                },
                {
                    "title": "Asal",
                    "data": "asal"
                },
                {
                    "title": "Aksi",
                    "data": null,
                    "render": function() {
                        return `
                        <?= view_cell('BtnActionCell', 'type=disposisi') ?>
                    `
                    },
                    "width": "15%"
                }
            ],
        })

        //Disposisi Surat
        $('#tabelSurat').on('click', '.btn-disposisi', function() {
            var data = dataTableSurat.row($(this).parents('tr')).data();

            $('#inputfk_surat').val(data.no);
            $('#modal-disposisi').modal('show');
        });
    <?php endif ?>

    var dataTable = $("#tabel").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "ajax": {
            "url": window.location.href
        },
        "columns": [{
                "title": "No",
                "data": "no"
            },
            {
                "title": "Tgl Penyelesaian",
                "data": "tgl_penyelesaian"
            },
            {
                "title": "Isi",
                "data": "isi"
            },
            {
                "title": "Diteruskan ke",
                "data": "diteruskan"
            },
            {
                "title": "Surat",
                "data": "fk_surat"
            },
            {
                "title": "Aksi",
                "data": null,
                "render": function(data) {

                    <?php if (in_groups('tu')) : ?>
                        if (data.read == 0) {
                            return `<?= view_cell('BtnActionCell', 'type=detail') ?>`
                        } else {
                            return `<?= view_cell('BtnActionCell', 'type=read') ?>`
                        }
                    <?php else : ?>
                        return `<?= view_cell('BtnActionCell', 'type=detail') ?>`
                    <?php endif; ?>
                },
                "width": "15%"
            }
        ],
    })

    //style btn-add
    $('.btn-add').removeClass('btn-secondary')

    //Tambah Data
    $('#form-disposisi').submit(function(e) {
        e.preventDefault()

        var formData = $(this).serialize();

        $.ajax({
            url: window.location.href,
            type: 'POST',
            data: formData,
            success: function() {
                $('#modal-disposisi').modal('hide')
                dataTable.ajax.reload()
                dataTableSurat.ajax.reload()
            }
        })
    })

    //Hapus Data
    $('#tabel tbody').on('click', '.btn-delete', function() {
        var data = dataTable.row($(this).parents('tr')).data()
        var id = data.no

        if (confirm('Anda yakin ingin menghapus data ini?')) {
            $.ajax({
                url: window.location.href + '/' + id,
                type: 'DELETE',
                success: function() {
                    dataTable.ajax.reload()
                }
            })
        }
    })

    // Edit Data
    $('#tabel').on('click', '.btn-edit', function() {
        var data = dataTable.row($(this).parents('tr')).data();

        $('#inputno').val(data.no);
        $('#inputtgl_penyelesaian').val(data.tgl_penyelesaian);
        $('#inputisi').val(data.isi);
        $('#inputfk_pegawai').val(data.fk_pegawai);
        $('#inputfk_surat').val(data.fk_surat);

        $('#modal-add').modal('show');
    });

    //Detail
    $('#tabel').on('click', '.btn-detail', function() {
        var data = dataTable.row($(this).parents('tr')).data();

        //jika pimpinan yang buka ubah status menjadi dibaca 
        <?php if (in_groups('tu')) : ?>
            //kalau belum dibaca jalankan ajax
            if (data.read == 0) {
                //jalankan ajax
                $.ajax({
                    url: window.location.href + '/' + data.no,
                    type: 'PUT',
                })
            }
        <?php endif; ?>

        window.location.href = "<?= base_url('disposisi') ?>/" + data.no;
    });

    //Initialize Select2 Elements
    $('#inputfk_pegawai').select2({
        ajax: {
            url: '/api/select2/pegawai',
        },
        theme: 'bootstrap4',
        dropdownParent: $('#modal-disposisi'),
    })
</script>
<?php $this->endsection(); ?>