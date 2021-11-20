<?php 

require 'functions.php';
$players = query("SELECT * FROM tbl_pemain");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Pemain</title>
</head>
<body>

<h3>Data Pemain</h3>

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
		<td align="center"><img src="img/<?= $player['gambar']; ?>" height="50"></td>
		<td align="center"><?= $player['kode_pemain']; ?></td>
		<td><?= $player['nama']; ?></td>
		<td><?= $player['posisi']; ?></td>
		<td align="center"><?= $player['no_punggung']; ?></td>
		<td>
			<a href="">Edit | Hapus</a>
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>

</body>
</html>