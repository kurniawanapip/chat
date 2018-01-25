<?php 
session_start();
include '../setting/database.php';
include_once "../setting/status_session.php";

$id_member = $_SESSION['id_member'];
$id_pesan = $_GET['id_pesan'];

$query_buka_pesan = mysqli_query($koneksi, "SELECT P.*, M.id_member, M.nama_lengkap FROM pesan P, member M WHERE id_pesan = $id_pesan AND P.id_pengirim = M.id_member");

$buka_pesan = mysqli_fetch_array($query_buka_pesan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>buka pesan dari : <?php echo $buka_pesan['nama_lengkap']; ?></title>
	<link rel="stylesheet" href="../css/buka_pesan.css">
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/pesan.js"></script>
</head>
<body>
	<p><a href="pesan.php">&laquo; kembali ke inbox</a></p>
	<table>
		<tr>
			<td>subyek pesan</td>
			<td>:</td>
			<td><strong><?php echo $buka_pesan['subyek_pesan']; ?></strong></td>
		</tr>
		<tr>
			<td>pengirim pesan</td>
			<td>:</td>
			<td><strong><?php echo $buka_pesan['nama_lengkap']; ?></strong></td>
		</tr>
		<tr>
			<td>tanggal</td>
			<td>:</td>
			<td><strong><?php echo $buka_pesan['tanggal']; ?></strong></td>
		</tr>
		<tr>
			<td>isi pesan</td>
			<td>:</td>
			<td><strong><?php echo $buka_pesan['isi_pesan']; ?></strong></td>
		</tr>
	</table>

	<p><a href="#" id="ke_balas_pesan">balas pesan</a></p>
	<div id="balas_pesan">
		<form id="form_balas_pesan" action="proses_balas_pesan.php" method="post">
			<input type="hidden" id="pengirim_balas_pesan" name="pengirim_balas_pesan" value="<?php echo $id_member; ?>">
			penerima : <?php echo $buka_pesan['nama_lengkap']; ?><br>
			<input type="hidden" id="penerima_balas_pesan" name="penerima_balas_pesan" value="<?php echo $buka_pesan['id_pengirim']; ?>">
			<br>
			subyek pesan (Re: )<br>
			<input type="text" id="subyek_balas_pesan" name="subyek_balas_pesan"><br>
			isi pesan<br>
			<textarea name="isi_balas_pesan" id="isi_balas_pesan" cols="30" rows="5"></textarea>
			<br><br>
			<input type="submit" name="submit_balas_pesan" value="Balas Pesan"> <br>
			<div id="loading_balas_pesan">mengirim pesan...</div>
			<div id="keterangan"></div>
		</form>
	</div>

	<?php 
		$sudah_dibaca = mysqli_query($koneksi, "UPDATE pesan SET sudah_dibaca = 'sudah' WHERE id_pesan = $id_pesan");
	 ?>
</body>
</html>