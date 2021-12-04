<?php

function connect() {
	return mysqli_connect('localhost', 'root', '', 'db_chelsea_fc');
}


function query($query) {
	$conn = connect();
	$result = mysqli_query($conn, $query);

	// utk detail.php
	if (mysqli_num_rows($result) == 1) {
		return mysqli_fetch_assoc($result);
	}

	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// format tgl lahir
function dateFormat($dateFormat) {
	$date = substr($dateFormat, 8, 2);
	$month = getMonth(substr($dateFormat, 5, 2));
	$year = substr($dateFormat, 0, 4);
	return $date.' '.$month.' '.$year;
}
function getMonth($month) {
	switch ($month) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "Nopember";
			break;
		case 12:
			return "Desember";
			break;
	}
}

function uploadImage() {
	$fileName = $_FILES['playerImage']['name'];
	// $fileType = $_FILES['playerImage']['type'];
	$fileTmpName = $_FILES['playerImage']['tmp_name'];
	$fileError = $_FILES['playerImage']['error'];
	$fileSize = $_FILES['playerImage']['size'];

	if($fileError == 4) {
		/* echo
			"<script>
				alert('pilih gambar terlebih dahulu!');
			</script>"; */
		return 'nophoto02.jpg';
	}

	$fileExtensionList = ['jpg','jpeg','png'];
	$fileExtension = explode('.',$fileName);
	$fileExtension = strtolower(end($fileExtension));
	if(!in_array($fileExtension, $fileExtensionList)) {
		echo
			"<script>
				alert('pilih gambar berekstensi (jpg, jpeg, png)!');
			</script>";
		return false;
	}

	/* if($fileType != 'image/jpeg' && $fileType != 'image/png') {
		echo
			"<script>
				alert('yg anda pilih bukan gambar!');
			</script>";
		return false;
	} */

	if($fileSize > 3000000) {
		echo
			"<script>
				alert('ukuran file terlalu besar!');
			</script>";
		return false;
	}

	$fileNewName = uniqid();
	$fileNewName .= '.';
	$fileNewName .= $fileExtension;
	move_uploaded_file($fileTmpName, 'img/'. $fileNewName);
	return $fileNewName;
}

function insert($data) {
	$conn = connect();

	$playerCode = htmlspecialchars($data['playerCode']);
	$playerName = htmlspecialchars($data['playerName']);
	$birthPlace = htmlspecialchars($data['birthPlace']);
	$birthDate = htmlspecialchars($data['birthDate']);
	$height = htmlspecialchars($data['height']);
	$nationality = htmlspecialchars($data['nationality']);
	// $playerImage = htmlspecialchars($data['playerImage']);
	$playerNumber = htmlspecialchars($data['playerNumber']);
	$position = htmlspecialchars($data['position']);
	$positionDetail = htmlspecialchars($data['positionDetail']);
	$salary = htmlspecialchars(intval($data['salary']));
	$contractExpire = htmlspecialchars($data['contractExpire']);

	$playerImage = uploadImage();
	if(!$playerImage) {
		return false;
	}

	$query = 	
		"INSERT INTO players_table VALUES
		('$playerCode','$playerName','$playerImage','$playerNumber','$position','$positionDetail','$nationality','$birthPlace','$birthDate','$height',
		'$salary','$contractExpire');";

	mysqli_query($conn,$query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function delete($playerCode) {
	$conn = connect();

	$playerImage = query("SELECT * FROM players_table WHERE player_code = '$playerCode'");
	if($playerImage['player_image'] != 'nophoto02.jpg') {
		unlink('img/' . $playerImage['player_image']);
	}

	mysqli_query($conn, "DELETE FROM players_table WHERE player_code = '$playerCode'") or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function update($data) {
	$conn = connect();

	$playerCode = htmlspecialchars($data['playerCode']);
	$playerName = htmlspecialchars($data['playerName']);
	$birthPlace = htmlspecialchars($data['birthPlace']);
	$birthDate = htmlspecialchars($data['birthDate']);
	$height = htmlspecialchars($data['height']);
	$nationality = htmlspecialchars($data['nationality']);
	$playerOldImage = htmlspecialchars($data['playerOldImage']);
	$playerNumber = htmlspecialchars($data['playerNumber']);
	$position = htmlspecialchars($data['position']);
	$positionDetail = htmlspecialchars($data['positionDetail']);
	$salary = htmlspecialchars(intval($data['salary']));
	$contractExpire = htmlspecialchars($data['contractExpire']);

	$playerImage = uploadImage();
	if(!$playerImage) {
		return false;
	}
	if($playerImage == 'nophoto02.jpg') {
		$playerImage = $playerOldImage;
	}

	$query =
		"UPDATE players_table SET
			player_name = '$playerName',
			birth_place = '$birthPlace',
			birth_date = '$birthDate',
			height = '$height',
			nationality = '$nationality',
			player_image = '$playerImage',
			player_number = '$playerNumber',
			position = '$position',
			position_detail = '$positionDetail',
			salary = $salary,
			contract_expire = '$contractExpire'
		WHERE player_code = '$playerCode'";

	mysqli_query($conn,$query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function searchData($keyword) {
	$conn = connect();

	$query = 
		"SELECT * FROM players_table WHERE
			player_code LIKE '%$keyword%' or
			player_name LIKE '%$keyword%' or
			position LIKE '%$keyword%' or
			player_number LIKE '%$keyword%'
		";
	$result = mysqli_query($conn, $query);
	// var_dump($result);

	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function login($data) {
	$conn = connect();

	$userName = htmlspecialchars($data['userName']);
	$userPassword = htmlspecialchars($data['userPassword']);

	if($user = query("SELECT * FROM users_table WHERE user_name = '$userName'")) {
		if(password_verify($userPassword, $user['user_password'])) {
			$_SESSION['login'] = true;
			header('location: index.php');
			exit;
		}
	}
	return [
		'error' => true,
		'pesan' => 'Username atau Password salah!'
	];
	
}

function register($data) {
	$conn = connect();

	$userName = htmlspecialchars(strtolower($data['userName']));
	$userPassword = mysqli_real_escape_string($conn, $data['userPassword']);
	$userPassword02 = mysqli_real_escape_string($conn, $data['userPassword02']);

	if(empty($userName) || empty($userPassword) || empty($userPassword02)) {
		echo
			"<script>
				alert('Username dan Password tidak boleh kosong!');
				document.location.href = 'register.php';
			</script>";
		return false;
	}

	if(query("SELECT * FROM users_table WHERE user_name = '$userName'")) {
		echo
			"<script>
				alert('Username sudah terdaftar!');
				document.location.href ='register.php';
			</script>";
			return false;
	}

	if($userPassword !== $userPassword02) {
		echo
		"<script>
		alert('Password dan Konfirmasi Password tidak sesuai!');
		document.location.href = 'register.php';
		</script>";
		return false;
	}
	if(strlen($userPassword) < 5) {
		echo
			"<script>
				alert('Password terlalu pendek!');
				document.location.href = 'register.php';
			</script>";
			return false;
	}

	$userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);
	$query = "INSERT INTO users_table VALUES ('$userName','$userPasswordHash')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}