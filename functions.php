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


function insert($data) {
	$conn = connect();

	$playerCode = htmlspecialchars($data['playerCode']);
	$playerName = htmlspecialchars($data['playerName']);
	$birthPlace = htmlspecialchars($data['birthPlace']);
	$birthDate = htmlspecialchars($data['birthDate']);
	$height = htmlspecialchars($data['height']);
	$nationality = htmlspecialchars($data['nationality']);
	$playerImage = htmlspecialchars($data['playerImage']);
	$playerNumber = htmlspecialchars($data['playerNumber']);
	$position = htmlspecialchars($data['position']);
	$positionDetail = htmlspecialchars($data['positionDetail']);
	$salary = htmlspecialchars(intval($data['salary']));
	$contractExpire = htmlspecialchars($data['contractExpire']);

	$query = 	
		"INSERT INTO players_table VALUES
		('$playerCode','$playerName','$playerImage','$playerNumber','$position','$positionDetail','$nationality','$birthPlace','$birthDate','$height',
		'$salary','$contractExpire');";

	mysqli_query($conn,$query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function delete($playerCode) {
	$conn = connect();
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
	$playerImage = htmlspecialchars($data['playerImage']);
	$playerNumber = htmlspecialchars($data['playerNumber']);
	$position = htmlspecialchars($data['position']);
	$positionDetail = htmlspecialchars($data['positionDetail']);
	$salary = htmlspecialchars(intval($data['salary']));
	$contractExpire = htmlspecialchars($data['contractExpire']);

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

	if(query("SELECT * FROM users_table WHERE user_name = '$userName' and user_password = '$userPassword'")) {
		$_SESSION['login'] = true;
		header('location: index.php');
		exit;
	} else {
		return [
			'error' => true,
			'pesan' => 'Username atau Password salah!'
		];
	}
}