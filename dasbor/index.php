<?php 
session_start();
include '../setting/database.php';
include_once "../setting/status_session.php";

$id_member = $_SESSION['id_member'];

$nama_member = mysqli_query($koneksi, "SELECT nama_lengkap FROM member WHERE id_member = '$id_member'");
$data = mysqli_fetch_array($nama_member);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>halaman member : <?php echo $data['nama_lengkap']; ?> </title>
	<link rel="stylesheet" href="../css/dasbor_index.css">
</head>
<body>
	<div class="bungkus">
		<div class="header">
			<h1>selamat datang <?php echo $data['nama_lengkap']; ?>, di halaman member</h1>
		</div>
		
		<div class="menu">
			<div class="menu1">
				<?php 
					$pesan_baru = mysqli_query($koneksi,"SELECT * FROM pesan WHERE id_penerima = '$id_member' and sudah_dibaca ='belum'");
					$jumlah_pesan_baru = mysqli_num_rows($pesan_baru);

					if ($jumlah_pesan_baru == 0) {
						echo "<h3><a href='pesan.php?id_member=".$id_member."'>Tidak Ada Pesan Baru (0)</a></h3>";
					}
					else if($jumlah_pesan_baru > 0){
						echo "<h3><a href='pesan.php?id_member=".$id_member."'>Pesan Baru (".$jumlah_pesan_baru.")</a></h3>";
					}
				?>	
			</div>
			<div class="menu2">
				<h3><a href="lain.php">halaman lain</a></h3>
			</div>
			<div class="menu3">
				<h3><a href="logout.php">LOGOUT</a></h3>
			</div>
		</div>

		<div class="isi">
			<h3 align="center">KEHORMATAN DI BALIK KERUDUNG</h2>
			<p>Sebuah film tentang percintaan dalam lingkungan yang religius yang menceritakan tentang kesetiaan atau perasaan cinta yang kuat dan amat dalam.</p>
			<p>Dalam film ini bercerita ifand seorang laki-laki baik yang rajin ibadah dan juga seorang jurnalist bertemu dengan seorang wanita cantik nan mempesona syahdu di stasiun kereta, syahdu yang pada saat itu ingin pergi ke tempat kakek dan nenek untuk mencari ketenangan dari seseorang di masa lalu nya yaitu nazmi.</p>
			<p>Keduanya bertemu disana saling memandang dan bertatap muka bercakap penuh dengan rasa dan mereka seperti menyukai satu sama lain, mereka berpikir seakan-akan itu pertemuan terakhir mereka, padahal mereka pergi naik kereta dengan tujuan yang sama.
			Yang pada akhirnya mereka bertemu kembali di sebuah desa di pekalongan, desa yang penuh dengan keindahan alam,yang erat dengan kebudayaan,dan berpegang teguh terhadap ajaran islam dan karena takdir jugalah yang mempertemukan mereka.
		</p>
		</div>

		<div class="footer">
			<p>copyright by apip kurniawan 2018</p>
		</div>
	</div>
</body>
</html>