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

<h2>Data Pemain</h2>

<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		<th></th>
		<th>Gambar</th>
		<th>Nama</th>
		<th>No Punggung</th>
		<th>Aksi</th>
	</tr>

	<?php $i=1; ?>
	<?php foreach ($players as $player) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td align="center"><img src="img/<?= $player['gambar']; ?>" height="50"></td>
		<td><?= $player['nama']; ?></td>
		<td align="center"><?= $player['no_punggung']; ?></td>
		<td>
			<a href="detail.php?kode_pemain=<?= $player['kode_pemain']; ?>">Lihat Detail</a>
		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>

</body>
</html>