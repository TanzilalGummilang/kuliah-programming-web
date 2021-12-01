<?php 
require 'functions.php';

if(!isset($_GET['player_code'])) {
	header("location: index.php");
	exit;
}

$playerCode = $_GET['player_code'];
$player = query("SELECT * FROM players_table WHERE player_code = '$playerCode'");

if(isset($_POST['update'])) {
   if(update($_POST) > 0) {
   echo  "<script>
         alert('data berhasil di update');
         document.location.href = 'index.php';
         </script>";
   } else {
   echo  "<script>
            alert('data gagal di update !');
         </script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah Data Pemain</title>
</head>
<body>

<h2>Tambah Data Pemain</h2>
<form action="" method="POST">
   <ul>
      <li>
         <label>
            Kode Pemain :
            <input type="text" name="playerCode" placeholder="ply000 jangan duplikat!" value="<?= $player['player_code']; ?>" readonly>
         </label>
      </li>
      <li>
         <label>
            Nama :
            <input type="text" name="playerName" required value="<?= $player['player_name']; ?>">
         </label>
      </li>
      <li>
         <label>
            Tempat Lahir :
            <input type="text" name="birthPlace" placeholder="Kota, Negara" value="<?= $player['birth_place']; ?>">
         </label>
      </li>
      <li>
         <label>
            Tanggal Lahir :
            <input type="date" name="birthDate" value="<?= $player['birth_date']; ?>">
         </label>
      </li>
      <li>
         <label>
            Tinggi :
            <input type="text" name="height" placeholder="maksimal tiga-digit angka" value="<?= $player['height']; ?>"> cm
         </label>
      </li>
      <li>
         <label>
            Kewarganegaraan :
            <input type="text" name="nationality" value="<?= $player['nationality']; ?>">
         </label>
      </li>
      <li>
         <label>
            Gambar :
            <input type="text" name="playerImage" value="<?= $player['player_image']; ?>">
         </label>
      </li>
      <li>
         <label>
            No Punggung :
            <input type="text" name="playerNumber" placeholder="maksimal dua-digit angka" value="<?= $player['player_number']; ?>">
         </label>
      </li>
      <li>
         <label for="position">Posisi :</label>
         <select name="position" id="position" >
            <option value=""><?= $player['position']; ?></option>
            <option value="Goalkeeper">Goalkeeper</option>
            <option value="Defender">Defender</option>
            <option value="Midfielder">Midfielder</option>
            <option value="Forward">Forward</option>
         </select>
      </li>
      <li>
         <label>
            Posisi Detail :
            <input type="text" name="positionDetail" placeholder="boleh lebih dari satu" value="<?= $player['position_detail']; ?>">
         </label>
         <br><label style="color: grey;">co : GK, CB, CDM, CM, CAM, CF, ST</label>
      </li>
      <li>
         <label>
            Gaji/minggu :
            <input type="text" name="salary" placeholder="masukan angka" value="<?= $player['salary']; ?>"> &pound
         </label>
      </li>
      <li>
         <label>
            Kontrak Berakhir :
            <input type="date" name="contractExpire" value="<?= $player['contract_expire']; ?>">
         </label>
      </li>
      <button type="submit" name="update">Update Data</button>
   </ul>
</form>

<a href="index.php">kembali</a>

</body>
</html>