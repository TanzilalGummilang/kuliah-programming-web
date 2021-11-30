<?php 
require 'functions.php';

$players = query("SELECT * FROM players_table");

if(isset($_POST['searchData'])) {
	$players = searchData($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Pemain</title>
</head>
<body>

<h2>Data Pemain</h2>

<a href="insert.php">Tambah Data</a> <br><br>

<form action="" method="POST">
	<input type="text" name="keyword" placeholder="masukan keyword..." size="40" autocomplete="off" autofocus>
	<button type="submit" name="searchData">Cari</button><br><br>
</form>

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
			<a href="detail.php?player_code=<?= $player['player_code']; ?>">Lihat Detail</a>
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>

</body>
</html>