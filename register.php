<?php 
require 'functions.php';

if(isset($_POST['btnRegister'])) {
   if(register($_POST) > 0) {
      echo
			"<script>
				alert('User baru ditambahkan.');
				document.location.href = 'login.php';
			</script>";
   } else {
      echo
			"<script>
				alert('User baru gagal ditambahkan!');
				document.location.href('register.php');
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
   <title>Daftar Akun</title>
</head>
<body>

<h2>Daftar Akun</h2>

<form action="" method="POST">
   <ul>
      <li>
         <label>
            Username :
            <input type="text" name="userName" required autofocus autocomplete="off">
         </label>
      </li>
      <li>
         <label>
            Password :
            <input type="password" name="userPassword" required>
         </label>
      </li>
      <li>
         <label>
            Konfirmasi Password :
            <input type="password" name="userPassword02" required>
         </label>
      </li>
      <br>
      <button type="submit" name="btnRegister">Daftar</button>
   </ul>
</form>

<a href="login.php">Kembali ke Login</a>

</body>
</html>