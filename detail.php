<?php 
require 'functions.php';
session_start();

if(!isset($_GET['playerCode'])) {
	header("location: index.php");
	exit;
}
if(!isset($_SESSION['login'])) {
   header("location: login.php");
   exit;
}

$playerCode = $_GET['playerCode'];
$player = query("SELECT * FROM players_table WHERE player_code = '$playerCode'");

$birthDateFormat = dateFormat($player['birth_date']);
$contractDateFormat = dateFormat($player['contract_expire']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Pemain</title>
</head>
<body>

<h2>Detail Pemain</h2>


<img src="img/<?= $player['player_image']; ?>" height="100">
<br><br>

<table border="1" cellpadding="5" cellspacing="1">
	<tr>
		<th align="left"> Kode Pemain : </th>
		<td><?= $player['player_code']; ?></td>
	</tr>
	<tr>
		<th align="left"> Nama :  </th>
		<td><?= $player['player_name']; ?></td>
	</tr>
	<tr>
		<th align="left"> Tempat Lahir :  </th>
		<td><?= $player['birth_place']; ?></td>
	</tr>
	<tr>
		<th align="left"> Tanggal Lahir :  </th>
		<td><?= $birthDateFormat; ?></td>
	</tr>
	<tr>
		<th align="left"> Tinggi :  </th>
		<td><?= $player['height']; ?> cm</td>
	</tr>
	<tr>
		<th align="left"> Kewarganegaraan :  </th>
		<td><?= $player['nationality']; ?></td>
	</tr>
	<tr>
		<th align="left"> Posisi :  </th>
		<td><?= $player['position']; ?></td>
	</tr>
	<tr>
		<th align="left"> Posisi Detail :  </th>
		<td><?= $player['position_detail']; ?></td>
	</tr>
	<tr>
		<th align="left"> No Punggung :  </th>
		<td><?= $player['player_number']; ?></td>
	</tr>
	<tr>
		<th align="left"> Gaji/Minggu :  </th>
		<td>&pound <?= $player['salary']; ?></td>
	</tr>
	<tr>
		<th align="left"> Kontrak Berakhir :  </th>
		<td><?= $contractDateFormat; ?></td>
	</tr>
</table>

<br>
<a href="update.php?playerCode=<?= $player['player_code']; ?>">Update</a> 
| 
<a href="delete.php?playerCode=<?= $player['player_code']; ?>" onclick="return confirm('yakin hapus data ?');">Hapus</a>
<br><br><a href="index.php">Kembali ke Halaman Data Pemain</a>

</body>
</html>