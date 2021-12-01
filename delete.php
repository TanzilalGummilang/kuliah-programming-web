<?php 
require 'functions.php';

if(!isset($_GET['player_code'])) {
header("location: index.php");
exit;
}

$playerCode = $_GET['player_code'];

if(delete($playerCode) > 0) {
   echo  
	"<script>
      alert('data berhasil dihapus');
		document.location.href = 'index.php';
   </script>";
   } else {
   echo  
		"<script>
         alert('data gagal dihapus !');
         document.location.href = 'index.php';
		</script>";
   }


?>