<?php $this->extend('layout'); ?>

<?php $this->section('content'); ?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <table id="tabel" class="table table-bordered table-hover"></table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add" enctype="multipart/form-data">
                <div class="modal-body">

                    <?= view_cell('InputCell', 'name=no,text=No Surat,type=text') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= view_cell('InputCell', 'name=tgl_surat,text=Tgl Surat,type=date') ?>
                        </div>
                        <div class="col-sm-6">
                            <?= view_cell('InputCell', 'name=tgl_terima,text=Tgl Terima,type=date') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= view_cell('InputCell', 'name=sifat,text=Sifat,type=text') ?>
                        </div>
                        <div class="col-sm-6">
                            <?= view_cell('InputCell', 'name=perihal,text=Perihal,type=text') ?>
                        </div>
                    </div>
                    <?= view_cell('InputCell', 'name=asal,text=Asal,type=text') ?>


                    <div class="form-group" id="file">
                        <label for="inputFile">File Surat</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file_upload" class="custom-file-input" id="inputFile">
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

<div class="modal fade" id="modal-disposisi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Surat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-disposisi" method="POST" action="disposisi" enctype="multipart/form-data">
                <div class="modal-body">

                    <?= view_cell('InputCell', 'name=no,text=No Disposisi,type=text') ?>
                    <?= view_cell('InputCell', 'name=tgl_penyelesaian,text=Tgl Penyelesaian,type=date') ?>
                    <?= view_cell('InputCell', 'name=isi,text=Isi,type=text') ?>

                    <?= view_cell('InputCell', 'name=fk_surat,text=No Surat Masuk,type=text') ?>

                    <div class="form-group">
                        <label for="inputfk_pegawai">Pegawai</label>
                        <select class="form-control select2bs4" id="inputfk_pegawai" name="fk_pegawai">
                            <option>-</option>
                        </select>
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
    var dataTable = $("#tabel").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "dom": 'Bfrtip',
        "buttons": [{
                "text": "Tambah Data",
                "className": "btn-primary btn-add",
                "action": function() {
                    $('#form-add')[0].reset();
                    $('#modal-add').modal('show');
                }
            },
            "print"
        ],
        "ajax": {
            "url": window.location.href
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
                        <?= view_cell('BtnActionCell', 'type=detail') ?>
                        <?= view_cell('BtnActionCell', 'type=delete') ?>
                    `
                },
                "width": "25%"
            }
        ],
    })

    //style btn-add
    $('.btn-add').removeClass('btn-secondary')

    //Tambah Data
    $('#form-add').submit(function(e) {
        e.preventDefault()

        var formData = new FormData($(this)[0]); // Membuat objek FormData dari formulir

        $.ajax({
            url: window.location.href,
            type: 'POST',
            data: formData,
            processData: false, // Tidak memproses data sebelum mengirimkannya
            contentType: false, // Menggunakan tipe konten default untuk FormData
            success: function() {
                $('#modal-add').modal('hide')
                dataTable.ajax.reload()
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
        $('#inputtgl_surat').val(data.tgl_surat);
        $('#inputtgl_terima').val(data.tgl_terima);
        $('#inputsifat').val(data.sifat);
        $('#inputperihal').val(data.perihal);
        $('#inputasal').val(data.asal);

        $('#file').addClass('d-none');

        $('#modal-add').modal('show');
    });

    //Detail Data
    $('#tabel').on('click', '.btn-detail', function() {
        var data = dataTable.row($(this).parents('tr')).data();

        window.location.href = "<?= base_url('uploads') ?>/" + data.scan;
    });

    //Disposisi Surat
    $('#tabel').on('click', '.btn-disposisi', function() {
        var data = dataTable.row($(this).parents('tr')).data();

        $('#inputfk_surat').val(data.no);
        $('#modal-disposisi').modal('show');
    });

    //Initialize Select2 Elements
    $('#inputfk_pegawai').select2({
        ajax: {
            url: '/api/select2/pegawai',
        },
        theme: 'bootstrap4'
    })
</script>
<?php $this->endsection(); ?>