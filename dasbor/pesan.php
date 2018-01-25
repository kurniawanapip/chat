<?php 
	session_start();
	include '../setting/database.php';
	include_once "../setting/status_session.php";

	$id_member = $_SESSION['id_member'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Melihat semua pesan</title>
	<link rel="stylesheet" href="../css/pesan.css">
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/pesan.js"></script>
</head>
<body>
	<h1>Kotak Masuk</h1>
	<p><a href="index.php">&laquo; kembali ke Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" id="ke_kirim_pesan">kirim pesan</a></p>

	<div id="kirim_pesan">
		<form id="form_kirim_pesan" method="post">
			<input type="hidden" id="pengirim_kirim_pesan" name="pengirim_kirim_pesan" value="<?php echo $id_member; ?>">
				penerima <br>
			<select name="penerima_kirim_pesan" id="penerima_kirim_pesan">
				<option value="0">-pilih penerima pesan-</option>
				<?php 
					$query_penerima = mysqli_query($koneksi, "SELECT id_member, nama_lengkap FROM member WHERE id_member != $id_member");
					while ($daftar_penerima = mysqli_fetch_array($query_penerima)) {
				?>
							
					<option value="<?php echo $daftar_penerima['id_member']; ?>"><?php echo $daftar_penerima['nama_lengkap']; ?></option>
				<?php
					}
				?>
			</select>
			<br>
			subyek pesan <br>
			<input type="text" id="subyek_kirim_pesan" name="subyek_kirim_pesan"> <br>
			isi pesan <br>
			<textarea name="isi_kirim_pesan" id="isi_kirim_pesan" cols="30" rows="5"></textarea> <br> <br>
			<input type="submit" name="submit_kirim_pesan" value="KIRIM PESAN"> <br>
			<div id="loading_kirim_pesan">mengirim pesan...</div>
			<div id="keterangan"></div>
		</form>
	</div>

	<table width="600" class="tabel_pesan" cellpadding="5" cellspacing="0">
		<thead>
			<tr>
				<th>pengirim</th>
				<th>subyek pesan</th>
				<th>tanggal</th>
			</tr>
		</thead>
		
		<tbody>			
		<?php 
			$query_daftar_pesan = mysqli_query($koneksi, "SELECT P.*, M.id_member, M.nama_lengkap FROM pesan P, member M WHERE p.id_pengirim = M.id_member and P.id_penerima = '$id_member' ORDER BY P.id_pesan DESC");

			while ($daftar_pesan = mysqli_fetch_array($query_daftar_pesan)) {
				if ($daftar_pesan['sudah_dibaca']=="belum") {
		?>

			<tr class="pesan pesan_belum">
				<td><?php echo $daftar_pesan['nama_lengkap']; ?></td>
				<td><a href="buka_pesan.php?id_member=<?php echo $id_member; ?>&id_pesan=<?php echo $daftar_pesan['id_pesan']; ?>"><?php echo $daftar_pesan['subyek_pesan']; ?></a></td>
				<td><?php echo $daftar_pesan['tanggal']; ?></td>
			</tr>

		<?php 
			}
			else if($daftar_pesan['sudah_dibaca'] == "sudah") {
		?>
			<tr class="pesan">
				<td><?php echo $daftar_pesan['nama_lengkap']; ?></td>
				<td><a href="buka_pesan.php?id_member=<?php echo $id_member; ?>&id_pesan=<?php echo $daftar_pesan['id_pesan']; ?>"><?php echo $daftar_pesan['subyek_pesan']; ?></a></td>
				<td><?php echo $daftar_pesan['tanggal']; ?></td>
			</tr>
			<?php 	
				}
				} 
			?>
		</tbody>
	</table>
</body>
</html>