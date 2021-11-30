<?php 
require 'functions.php';

$players = query("SELECT * FROM players_table");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Pemain</title>
</head>
<body>

<h2>Data Pemain</h2>

<a href="insert.php">Tambah Data</a> <br><br>

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