<?php 
session_start();
require 'functions.php';

if(isset($_SESSION['login'])) {
   header("location: index.php");
   exit;
}

if(isset($_POST['btnLogin'])) {
   $login = login($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
</head>
<body>
   
<h2>Login</h2>

<?php if(isset($login['error'])) : ?>
   <p style="color: red; font-style: italic;"><?= $login['pesan']; ?></p>
<?php endif; ?>

<form action="" method="POST">
   <ul>
      <li>
         <label>
            Username :
            <input type="text" name="userName" placeholder="masukan username" required autofocus autocomplete="off">
         </label>
      </li>
      <li>
         <label>
            Password :
            <input type="password" name="userPassword" placeholder="masukan password" required>
         </label>
      </li>
      <button type="submit" name="btnLogin">Login</button>
   </ul>
</form>

</body>
</html>