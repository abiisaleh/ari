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
                <h4 class="modal-title">Detail Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-add">
                <div class="modal-body">

                    <?= view_cell('InputCell', 'name=nip,text=NIP,type=text') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputgol">Golongan</label>
                                <select class="form-control" id="inputgol" name="gol">
                                    <option>I</option>
                                    <option>II</option>
                                    <option>III</option>
                                    <option>IV</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputruang">Ruang</label>
                                <select class="form-control" id="inputruang" name="ruang">
                                    <option>a</option>
                                    <option>b</option>
                                    <option>c</option>
                                    <option>d</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?= view_cell('InputCell', 'name=nama,text=Nama,type=text') ?>

                    <div class="form-group">
                        <label for="inputjk">Jenis Kelamin</label>
                        <select class="form-control" id="inputjk" name="jk">
                            <option>laki-laki</option>
                            <option>perempuan</option>
                        </select>
                    </div>

                    <?= view_cell('InputCell', 'name=telp,text=Telp,type=text') ?>
                    <?= view_cell('InputCell', 'name=alamat,text=Alamat,type=text') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= view_cell('InputCell', 'name=tgl_lahir,text=Tanggal Lahir,type=date') ?>
                        </div>
                        <div class="col-sm-6">
                            <?= view_cell('InputCell', 'name=tempat_lahir,text=Tempat Lahir,type=text') ?>
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
                "title": "NIP",
                "data": "nip"
            },
            {
                "title": "Nama",
                "data": "nama"
            },
            {
                "title": "Jenis Kelamin",
                "data": "jk"
            },
            {
                "title": "Aksi",
                "data": null,
                "render": function() {
                    return `
                        <?= view_cell('BtnActionCell', 'type=delete') ?>
                        <?= view_cell('BtnActionCell', 'type=edit') ?>
                    `
                },
                "width": "20%"
            }
        ],
    })

    //style btn-add
    $('.btn-add').removeClass('btn-secondary')

    //Tambah Data
    $('#form-add').submit(function(e) {
        e.preventDefault()
        $.ajax({
            url: window.location.href,
            type: 'POST',
            data: $(this).serialize(),
            success: function() {
                $('#modal-add').modal('hide')
                dataTable.ajax.reload()
            }
        })
    })

    //Hapus Data
    $('#tabel tbody').on('click', '.btn-delete', function() {
        var data = dataTable.row($(this).parents('tr')).data()
        var id = data.nip


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

        $('#inputnip').val(data.nip).attr('disabled', true);
        $('#inputnama').val(data.nama);
        $('#inputgol').val(data.gol);
        $('#inputruang').val(data.ruang);
        $('#inputtempat_lahir').val(data.tempat_lahir);
        $('#inputtgl_lahir').val(data.tgl_lahir);
        $('#inputjk').val(data.jk);
        $('#inputtelp').val(data.telp);
        $('#inputalamat').val(data.alamat);

        $('#modal-add').modal('show');
    });
</script>
<?php $this->endsection(); ?>