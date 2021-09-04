 <?php
	// mengaktifkan session pada php
	session_start();

	// menghubungkan php dengan koneksi database
	include 'koneksi.php';

	// menangkap data yang dikirim dari form login
	$username = mysqli_escape_string($koneksi, $_POST['username']);
	$password = mysqli_escape_string($koneksi, md5($_POST['password']));


	// menyeleksi data user dengan username dan password yang sesuai
	$login = mysqli_query($koneksi, "select * from tbl_user where username='$username' and password='$password'");
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);

	// cek apakah username dan password di temukan pada database
	if ($cek > 0) {

		$data = mysqli_fetch_assoc($login);

		// cek jika user login sebagai admin
		if ($data['level'] == "admin" or $data['level'] == "operator") {

			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['id_pengguna'] = $data['id_pengguna'];
			$_SESSION['level'] = $data['level'];
			$_SESSION['foto'] = $data['foto'];

			// alihkan ke halaman dashboard admin
			header("location:dashboard.php ");

			// cek jika user login sebagai pegawai
		}
	} else {
		header("location:index.php?alert=gagal");
	}

	?>