<?php 
	include '../setting/database.php';

	$pengirim_kirim_pesan = $_POST['pengirim_kirim_pesan'];
	$penerima_kirim_pesan = $_POST['penerima_kirim_pesan'];
	$subyek_kirim_pesan = $_POST['subyek_kirim_pesan'];
	$isi_kirim_pesan = $_POST['isi_kirim_pesan'];
	$tanggal = date('Y-m-d');

	if (empty($pengirim_kirim_pesan) || empty($subyek_kirim_pesan) || empty($isi_kirim_pesan)) {
		die(pesan(0, "semua input harus di isi.."));	
  	}

	if (!(int)$penerima_kirim_pesan) {
		die(pesan(0, "pilih Penerima Pesan"));	
  	}

	$isi = mysqli_query($koneksi, "INSERT INTO pesan(id_pengirim, id_penerima, subyek_pesan, isi_pesan, tanggal, sudah_dibaca) VALUES ('$pengirim_kirim_pesan','$penerima_kirim_pesan', '$subyek_kirim_pesan', '$isi_kirim_pesan', '$tanggal', 'belum')");
		die(pesan(1, "pesan sudah berhasil di kirim.."));	

	function pesan($status, $teks) {
		return '{"status": '.$status.',"teks": "'.$teks.'"}';
	}
?>