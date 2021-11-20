<?php 
require 'functions.php';

$kode_pemain = $_GET['kode_pemain'];
$player = query("SELECT * FROM tbl_pemain WHERE kode_pemain = '$kode_pemain'");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Pemain</title>
</head>
<body>

<h2>Detail Pemain</h2>

<ul>
	<img src="img/<?= $player['gambar']; ?>" height="100">
	<br><br>
	<li>Kode Pemain : <?= $player['kode_pemain']; ?></li>
	<li>Nama : <?= $player['nama']; ?></li>
	<li>Posisi : <?= $player['posisi']; ?></li>
	<li>No Punggung : <?= $player['no_punggung']; ?></li>
	<br>Edit | Hapus
	<br><a href="latihan03.php">Kembali ke Halaman Data Pemain</a>
</ul>

</body>
</html>