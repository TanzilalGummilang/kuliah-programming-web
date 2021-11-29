<?php 
require 'functions.php';

if(isset($_POST['insert'])) {
   if(insert($_POST) > 0) {
   echo  "<script>
         alert('data berhasil ditambahkan');
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
<form action="" method="POST">
   <ul>
      <li>
         <label>
            Kode Pemain :
            <input type="text" name="playerCode" placeholder="ply000">
         </label>
      </li>
      <li>
         <label>
            Nama :
            <input type="text" name="name" required>
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
            <input type="text" name="image">
         </label>
      </li>
      <li>
         <label>
            No Punggung :
            <input type="text" name="number" placeholder="maksimal dua-digit angka">
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
      <button type="submit" name="insert">Tambah Data</button>
   </ul>
</form>

<a href="latihan03.php">kembali</a>

</body>
</html>