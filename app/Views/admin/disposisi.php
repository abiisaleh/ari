<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
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

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Disposisi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data">
                <div class="modal-body">

                    <?= view_cell('InputCell', 'name=no,text=No Surat,type=text') ?>
                    <?= view_cell('InputCell', 'name=tgl_surat,text=Tgl Surat,type=date') ?>
                    <?= view_cell('InputCell', 'name=tgl_terima,text=Tgl Terima,type=date') ?>
                    <?= view_cell('InputCell', 'name=sifat,text=Sifat,type=text') ?>
                    <?= view_cell('InputCell', 'name=perihal,text=Perihal,type=text') ?>
                    <?= view_cell('InputCell', 'name=asal,text=Asal,type=text') ?>

                    <div class="form-group">
                        <label for="inputFile">File Surat</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputFile">
                                <label class="custom-file-label" for="inputFile">Choose file</label>
                            </div>
                        </div>
                    </div>

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
                "title": "Pegawai",
                "data": "fk_pegawai"
            },
            {
                "title": "Surat",
                "data": "fk_surat"
            },
            {
                "title": "Aksi",
                "data": null,
                "render": function() {
                    return `
                        <?= view_cell('BtnActionCell', 'type=detail') ?>
                    `
                },
                "width": "15%"
            }
        ],
    })

    //style btn-add
    $('.btn-add').removeClass('btn-secondary')

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

        window.location.href = "<?= base_url('disposisi') ?>/" + data.no;
    });
</script>
<?php $this->endsection(); ?>