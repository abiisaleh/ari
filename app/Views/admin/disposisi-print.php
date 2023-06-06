<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print | SI Surat</title>

    <base href="<?= base_url() ?>">

    <link rel="icon" href="dist/img/logo-dprd.svg" sizes="32x32" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <style>
        td,
        thead {
            border: 1px solid black;
            padding: 10px;
        }

        tbody {
            border: 1px solid black;
        }

        tbody td {
            border: none;
        }

        .borderless {
            border: none;
        }

        .borderless-left {
            border-left: none;
        }

        .borderless-right {
            border-right: none;
        }

        hr {
            border: 2px solid black;
        }

        @media print {

            /* Menghilangkan judul halaman */
            @page {
                size: auto;
                margin-top: 0mm;
                margin-bottom: 0mm;
            }

            /* Menghilangkan URL */
            @page :left {
                margin-right: 0mm;
            }

            @page :right {
                margin-left: 0mm;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <img class="fixed-top ml-5 mt-5" src="dist/img/logo-dprd.svg" width="100px">
        <div class="text-center">
            <h1 class="text-bold">
                Dewan Perwakilan Rakyat Daerah <br>
                Kota Jayapura
            </h1>
            <p>
                Jl. Raya Abepura No. 37 Kotaraja, Telpon : (0967) 586147, Fax. (0976) 586112 <br>
                Website : <a href="#">dprd.jayapura.go.id</a> Email : #
            </p>
        </div>

        <hr>

        <h1 class="text-center">LEMBAR DISPOSISI</h1>

        <div>
            <table class="col-12">
                <thead>
                    <tr>
                        <td scope="col" class="borderless-right">Tanggal Terima</td>
                        <td scope="col" class="borderless">: <?= $dispo['tgl_terima'] ?></td>
                        <td scope="col" class="borderless-right">Tanggal Penyelesaian</td>
                        <td scope="col" class="borderless">: <?= $dispo['tgl_penyelesaian'] ?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nomor Surat</td>
                        <td>: <?= $dispo['no'] ?></td>
                    </tr>
                    <tr>
                        <td>Asal Surat</td>
                        <td>: <?= $dispo['asal'] ?></td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>: <?= $dispo['perihal'] ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="borderless-right">Isi Disposisi</td>
                        <td class="borderless-left">: <?= $dispo['isi'] ?></td>
                        <td class="borderless-right">Diteruskan Kepada</td>
                        <td class="borderless-left">: <?= $dispo['nama'] ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>

</html>