<?php

session_start();
include 'koneksi.php';
$user = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_pengguna='$_SESSION[id_pengguna]'");
$row = mysqli_fetch_array($user);
if (isset($_POST['profil'])) {
    $profil = mysqli_query($koneksi, "UPDATE tbl_user SET
    username = '$_POST[username]',
    nama = '$_POST[nama]',
    alamat = '$_POST[alamat]',
    tlp = '$_POST[tlp]'
WHERE id_pengguna='$_SESSION[id_pengguna]'
    ");
    if ($profil) {
        echo "<script> location.href='profil.php?pesan=profil' </script>";
    }
}
if (isset($_POST['foto'])) {

    $rand = rand();
    $allowed =  array('gif', 'png', 'jpg', 'jpeg', 'jfif');

    $filename = $_FILES['foto']['name'];


    $last_id = $_POST['id_pengguna'];


    if ($filename != "") {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($ext, $allowed)) {
            move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/' . $rand . '_' . $filename);
            $file_gambar = $rand . '_' . $filename;

            $simpan = mysqli_query($koneksi, "update tbl_user set foto='$file_gambar' where id_pengguna='$last_id'");
        }
        if ($simpan) {
            echo "<script> location.href='profil.php?pesan=foto' </script>";
        } else {
            echo "gagal";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
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
                    Profil Pengguna App
                    <small>Aplikasi Buku Tamu</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-book"></i> Data</a></li>
                    <li class="active">Profil</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "profil") { ?>
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> Berhasil!</h4>
                                    Data Profil Pengguna Sudah Diubah.
                                </div>
                            <?php } elseif ($_GET['pesan'] == "foto") { ?>
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> Berhasil!</h4>
                                    Data Pengguna Sudah Diubah.
                                </div>
                            <?php } elseif ($_GET['pesan'] == "ubah") { ?>
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-info"></i> Berhasil!</h4>
                                    Data Pengguna Sudah Diubah.
                                </div>

                        <?php  }
                        } ?>
                        <!-- Profile Image -->
                        <div class="box box-success">
                            <div class="box-body box-profile">
                                <?php if ($_SESSION['foto'] == "") { ?>
                                    <img class="profile-user-img img-responsive img-circle" src="foto/avatar5.png" alt="User profile picture">

                                <?php } else { ?>
                                    <img class="profile-user-img img-responsive img-circle" src="foto/<?= $row['foto']; ?>" alt="User profile picture">

                                <?php } ?>


                                <h3 class="profile-username text-center">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#hapus<?= $row['id_pengguna']; ?>">
                                        <i class="fa fa-edit"></i> Ubah Foto
                                    </button>
                                    <div class="modal fade" id="hapus<?= $row['id_pengguna']; ?>">
                                        <div class="modal-dialog">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Ubah Foto Profil</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" hidden name="id_pengguna" id="" value="<?= $row['id_pengguna']; ?>">
                                                        <div class="form-group">
                                                            <label>Foto</label>
                                                            <input name="foto" type="file" class="form-control" placeholder="Enter ...">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="foto" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </h3>

                                <form action="" method="POST">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input name="username" value="<?= $row['username']; ?>" type="text" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input name="nama" value="<?= $row['nama']; ?>" type="text" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input name="tlp" value="<?= $row['tlp']; ?>" type="text" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input name="alamat" value="<?= $row['alamat']; ?>" type="text" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </li>
                                    </ul>

                                    <button class="btn btn-info form-control" type="submit" name="profil">Ubah Data</button>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col -->
                </div>
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
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })
    </script>
</body>

</html>