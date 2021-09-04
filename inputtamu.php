<?php
session_start();
include 'koneksi.php';
if (isset($_POST['tambah'])) {
    $tgl = date('Y-m-d H:i:s');
    $tambah = mysqli_query($koneksi, "INSERT INTO tbl_bukuTamu SET 
    identitas = '$_POST[identitas]',
    nama = '$_POST[nama]',
    tlp = '$_POST[tlp]',
    alamat = '$_POST[alamat]',
    tindakLanjut = '$_POST[tindakLanjut]',
    keperluan = '$_POST[keperluan]',
    menemui = '$_POST[menemui]',
    tgl='$tgl'
    ");
    if ($tambah) {
        echo "<script> location.href='datatamu.php?pesan=tambah' </script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Input Tamu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
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
                    Input Buku Tamu
                    <small>Aplikasi Buku Tamu</small>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-book"></i> Buku Tamu <?= $tgl; ?></a></li>
                    <li class="active">Input</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">


                            <!-- /.box-header -->

                            <a href="datatamu.php"><button class="form-control btn-warning"> <b><i class="fa fa-arrow-left"></i> KEMBALI</b> </button></a>

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <div class="box box-success">

                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Nomor Identitas</label>
                                        <input name="identitas" type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pengunjung</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Pengunjung</label>
                                        <input name="alamat" type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telp Pengunjung</label>
                                        <input name="tlp" type="number" class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Ingin Bertemu Dengan ?</label>
                                        <input name="menemui" type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Keperluan ?</label>
                                        <textarea name="keperluan" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tindak Lanjut</label>
                                        <select name="tindakLanjut" class="form-control">
                                            <option selected>-pilih-</option>
                                            <option value="tidak diizinkan">Tidak Diizinkan</option>
                                            <option value="diizinkan">Diizinkan</option>

                                        </select>
                                    </div>

                                    <button name="tambah" type="submit" class="btn btn-danger"><i class="fa  fa-pencil-square-o"></i> Isi Buku Tamu </button>
                                </form>
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
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
</body>

</html>