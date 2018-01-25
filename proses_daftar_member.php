<?php 
	include_once 'setting/database.php';

	$nama_lengkap_daftar = $_POST['nama_lengkap_daftar'];
	$gender_daftar = $_POST['gender_daftar'];
	$alamat_daftar = $_POST['alamat_daftar'];
	$username_daftar = $_POST['username_daftar'];
	$password_daftar = md5($_POST['password_daftar']);

	if (empty($nama_lengkap_daftar) || empty($alamat_daftar) || empty($password_daftar) || empty($username_daftar)) {
		die(pesan(0, "semua input harus di isi.."));	
	}

	if (!(int)$gender_daftar) {
		die(pesan(0, "pilih gender"));	
	}

	if ($gender_daftar=='1') {
		$gender_daftar = "L";
	}
	else
	{
		$gender_daftar = "P";
	}

	$seleksi = mysqli_query($koneksi, "SELECT id_member FROM member WHERE username = '$username_daftar'");
	$jumlah_baris = mysqli_num_rows($seleksi);

	if ($jumlah_baris == 0) {
		$isi = mysqli_query($koneksi, "INSERT INTO member(nama_lengkap, gender, alamat, username, password) VALUES ('$nama_lengkap_daftar','$gender_daftar', '$alamat_daftar', '$username_daftar', '$password_daftar')");
		die(pesan(1, "pendaftaran berhasil, silahkan login"));	
	}
	else {
		die(pesan(0, "pendaftaran gagal, username member sudah terdaftar"));	

	}

	function pesan($status, $teks) {
		return '{"status": '.$status.',"teks": "'.$teks.'"}';
	}
?>


