<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION['login'])) {
   header("location: login.php");
   exit;
}

$players = query("SELECT * FROM players_table");

// if(isset($_POST['btnSearch'])) {
// 	$players = searchData($_POST['keyword']);
// }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Pemain</title>
</head>
<body>


<a href="logout.php" onclick="return confirm('yakin logout?');">Logout</a>
<h2>Data Pemain</h2>
<a href="insert.php">Tambah Data</a> <br><br>

<form action="" method="POST">
	<input type="text" name="keyword" placeholder="masukan keyword..." size="40" autocomplete="off" autofocus class="keyword">
	<button type="submit" name="btnSearch" class="btnSearch">Cari</button><br><br>
</form>

<div class="container">
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th></th>
		<th>Gambar</th>
		<th>Kode Pemain</th>
		<th>Nama</th>
		<th>Posisi</th>
		<th>No Punggung</th>
		<th>Aksi</th>
	</tr>

	<?php if(empty($players)) : ?>
		<tr>
			<td colspan="7"><p align="center" style="color: red; font-size: 30px; font-style: italic;">data tidak ditemukan!</p></td>
		</tr>
	<?php endif; ?>

	<?php $i=1; ?>
	<?php foreach ($players as $player) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td align="center"><img src="img/<?= $player['player_image']; ?>" height="50"></td>
		<td align="center"><?= $player['player_code']; ?></td>
		<td><?= $player['player_name']; ?></td>
		<td><?= $player['position']; ?></td>
		<td align="center"><?= $player['player_number']; ?></td>
		<td>
			<a href="detail.php?playerCode=<?= $player['player_code']; ?>">Lihat Detail</a>
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
</div>

<script src="js/script.js"></script>
</body>
</html>