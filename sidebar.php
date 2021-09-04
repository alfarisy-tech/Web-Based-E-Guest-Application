<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <?php if ($_SESSION['foto'] == "") { ?>
                <img src="foto/avatar5.png" class="img-circle" alt="User Image">

            <?php } else { ?>
                <img src="foto/<?= $_SESSION['foto']; ?>" class="img-circle" alt="User Image">

            <?php } ?>
        </div>
        <div class="pull-left info">
            <p><?= $_SESSION['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div> -->
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active ">
            <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>

            </a>

        </li>

        <li>
            <a href="datatamu.php">
                <i class="fa fa-book"></i> <span>Buku Tamu</span>

            </a>
        </li>
        <li>
            <a href="laporan.php">
                <i class="fa  fa-file-text-o"></i> <span>Laporan Buku Tamu</span>

            </a>
        </li>
        <?php if ($_SESSION['level'] == "admin") { ?>
            <li>
                <a href="dataPegawai.php">
                    <i class="fa fa-users"></i> <span>Data Pengguna App</span>

                </a>
            </li>
        <?php } ?>

        <li>
            <a href="ubahpass.php">
                <i class="fa fa-lock"></i> <span>Ganti Password</span>

            </a>
        </li>

    </ul>
</section>