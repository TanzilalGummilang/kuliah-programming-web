<?php
session_start();
require 'functions.php';

if(!isset($_SESSION['login'])) {
   header("location: login.php");
   exit;
}

if(isset($_POST['btnInsert'])) {
   if(insert($_POST) > 0) {
   echo  "<script>
         alert('data berhasil ditambahkan');
         document.location.href = 'index.php';
         </script>";
   } else {
   echo  "<script>
            alert('data gagal ditambahkan !');
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
<form action="" method="POST" enctype="multipart/form-data">
   <ul>
      <li>
         <label>
            Kode Pemain :
            <input type="text" name="playerCode" placeholder="ply000 jangan duplikat!">
         </label>
      </li>
      <li>
         <label>
            Nama :
            <input type="text" name="playerName" required>
         </label>
      </li>
      <li>
         <label>
            Tempat Lahir :
            <input type="text" name="birthPlace" placeholder="Kota, Negara">
         </label>
      </li>
      <li>
         <label>
            Tanggal Lahir :
            <input type="date" name="birthDate">
         </label>
      </li>
      <li>
         <label>
            Tinggi :
            <input type="text" name="height" placeholder="maksimal tiga-digit angka"> cm
         </label>
      </li>
      <li>
         <label>
            Kewarganegaraan :
            <input type="text" name="nationality">
         </label>
      </li>
      <li>
         <label>
            Gambar :
            <input type="file" name="playerImage">
         </label>
      </li>
      <li>
         <label>
            No Punggung :
            <input type="text" name="playerNumber" placeholder="maksimal dua-digit angka">
         </label>
      </li>
      <li>
         <label for="position">Posisi :</label>
         <select name="position" id="position">
            <option value=""></option>
            <option value="Goalkeeper">Goalkeeper</option>
            <option value="Defender">Defender</option>
            <option value="Midfielder">Midfielder</option>
            <option value="Forward">Forward</option>
         </select>
      </li>
      <li>
         <label>
            Posisi Detail :
            <input type="text" name="positionDetail" placeholder="boleh lebih dari satu">
         </label>
         <br><label style="color: grey;">co : GK, CB, CDM, CM, CAM, CF, ST</label>
      </li>
      <li>
         <label>
            Gaji/minggu :
            <input type="text" name="salary" placeholder="masukan angka"> &pound
         </label>
      </li>
      <li>
         <label>
            Kontrak Berakhir :
            <input type="date" name="contractExpire">
         </label>
      </li>
      <button type="submit" name="btnInsert">Tambah Data</button>
   </ul>
</form>

<a href="index.php">kembali</a>

</body>
</html>