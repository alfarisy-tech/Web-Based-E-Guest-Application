<?php
session_start();
include 'koneksi.php';
if (isset($_POST['hapus'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_bukuTamu WHERE id_tamu='$_POST[id_tamu]'");
    if ($hapus) {
        echo "<script> location.href='datatamu.php?pesan=hapus' </script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Data Tamu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!-- daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>BUKUTAMU</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?php include 'navbar.php' ?>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php include 'sidebar.php' ?>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Laporan
                    <small>Aplikasi Buku Tamu</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-file-text-o"></i> Laporan</a></li>
                    <li class="active">Detail</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "hapus") { ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                    Data Tamu Sudah Dihapus.
                                </div>
                            <?php } elseif ($_GET['pesan'] == "tambah") { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                                    Data Tamu Sudah Ditambahkan.
                                </div>
                        <?php }
                        } ?>



                        <div class="box box-success">
                            <div class="box-header">


                                <div class="alert alert-info alert-dismissible">

                                    <div class="row">
                                        <form action="" method="GET">
                                            <div class="col-sm-2">
                                                <div class="form-group" style="width: 200px;">

                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i> Mulai
                                                        </div>
                                                        <input type="date" class="form-control pull-right" value="<?php if (isset($_GET['tanggal_dari'])) {
                                                                                                                        echo $_GET['tanggal_dari'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>" name="tanggal_dari">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group" style="width: 200px;margin-left:15px;">

                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i> Akhir
                                                        </div>
                                                        <input type="date" class="form-control pull-right" value="<?php if (isset($_GET['tanggal_sampai'])) {
                                                                                                                        echo $_GET['tanggal_sampai'];
                                                                                                                    } else {
                                                                                                                        echo "";
                                                                                                                    } ?>" name="tanggal_sampai">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group" style="width: 100px;margin-left:25px;">

                                                    <input value="Tampilkan" type="submit" class="form-control btn btn-warning" placeholder="filter" name="cari">
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                        </form>
                                        <div class="col-sm-1">
                                            <div class="form-group" style="width: 100px;margin-left:-70px;">
                                                <a href="laporan.php" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- /.box -->
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Identitas</th>
                                            <th>Nama Tamu</th>
                                            <th>Alamat</th>
                                            <th>Telp</th>
                                            <th>Bertemu Dengan</th>
                                            <th>Keperluan</th>
                                            <th>Tindak Lanjut</th>
                                            <th>Tanggal Berkujung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 1;
                                        if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])) {
                                            $tgl_dari = $_GET['tanggal_dari'];
                                            $tgl_sampai = $_GET['tanggal_sampai'];
                                            $tamu = mysqli_query($koneksi, "SELECT * FROM tbl_bukuTamu WHERE date(tgl) >= '$tgl_dari' AND date(tgl) <= '$tgl_sampai' ");
                                        } else {
                                            $tamu = mysqli_query($koneksi, "SELECT * FROM tbl_bukuTamu order by tgl");
                                        }
                                        while ($row = mysqli_fetch_array($tamu)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['identitas']; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['alamat']; ?></td>
                                                <td><?= $row['tlp']; ?></td>
                                                <td><?= $row['menemui']; ?></td>
                                                <td><?= $row['keperluan']; ?></td>
                                                <td>

                                                    <?= $row['tindakLanjut']; ?>
                                                </td>
                                                <td>
                                                    <?= $row['tgl']; ?>

                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.18
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>


        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- bootstrap datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $('#example1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
            $('#datepicker').datepicker({
                autoclose: true
            })
            $('#datepicker1').datepicker({
                autoclose: true
            })
        })
    </script>
</body>

</html>