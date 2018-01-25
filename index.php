<?php 
	session_start();
	include_once "setting/database.php";
	include_once "setting/status_dapan.php";

	if (isset($_POST['submit_login'])) {
		$username_login = htmlentities(trim($_POST['username_login']));
		$password_login = htmlentities(md5($_POST['password_login']));

		$seleksi = mysqli_query($koneksi, "SELECT id_member FROM member WHERE username ='$username_login' and password = '$password_login'");
		$data_member = mysqli_fetch_array($seleksi);
		$jumlah_baris = mysqli_num_rows($seleksi);
		if ($jumlah_baris==1) {
			$_SESSION['id_member'] = $data_member['id_member'];
			header("location: dasbor/index.php");
		}
		else {
			?>
			<script>
				alert("maaf, username dan password anda salah");
				document.location = 'index.php';
			</script>
			<?php 
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>halaman daftar dan login</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/daftar.js"></script>
</head>
<body>
	<div class="pembungkus">
		<div class="header">
			<h1>SELAMAT DATANG MEMBER</h1>
		</div>
		<div class="isi">
			<div class="isi1">
				<h2>LOGIN</h3>
				<form action="" id="formlogin" method="post">
					username <br>
					<input type="text" name="username_login" id="username_login"> <br>
					password <br>
					<input type="password" id="password_login" name="password_login"> <br> <br>
					<input type="submit" id="submit_login" name="submit_login" value="LOGIN">
				</form>
			</div>
			<div class="isi2">
				<h2>REGISTER</h3>
				<form action="" id="formdaftar" method="post">
					nama lengkap <br>
					<input type="text" id="nama_lengkap_daftar" name="nama_lengkap_daftar"> <br>
					jenis kelamin <br>
					<select name="gender_daftar" id="gender_daftar">
						<option value="0">- pilih gender -</option>
						<option value="1">laki-laki</option>
						<option value="2">perempuan</option>
					</select>
					<br>
					alamat <br>
					<textarea name="alamat_daftar" id="alamat_daftar" cols="30" rows="10"></textarea>
					<br>
					username <br>
					<input type="text" name="username_daftar" id="username_daftar"> <br>
					password <br>
					<input type="password" name="password_daftar" id="password_daftar"> <br> <br>
					<input type="submit" id="submit_daftar" name="submit_daftar" value="DAFTAR">
					<div id="loading_daftar">loading..</div>
					<br>
					<div id="keterangan"></div>
				</form>
			</div>
		</div>
		<div class="footer">
			<p>copyright by apip kurniawan 2018</p>
		</div>
	</div>


	<table width="100%">
		<tr>
			<td>
				
			</td>
			<td>
				
			</td>
		</tr>
	</table>
</body>
</html>