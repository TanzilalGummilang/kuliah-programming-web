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
            <input type="password" name="userPassword01" required>
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

</body>
</html>