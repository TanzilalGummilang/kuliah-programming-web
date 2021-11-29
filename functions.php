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
	$name = htmlspecialchars($data['name']);
	$birthPlace = htmlspecialchars($data['birthPlace']);
	$birthDate = htmlspecialchars($data['birthDate']);
	$height = htmlspecialchars($data['height']);
	$nationality = htmlspecialchars($data['nationality']);
	$image = htmlspecialchars($data['image']);
	$number = htmlspecialchars($data['number']);
	$position = htmlspecialchars($data['position']);
	$positionDetail = htmlspecialchars($data['positionDetail']);
	$salary = htmlspecialchars(intval($data['salary']));
	$contractExpire = htmlspecialchars($data['contractExpire']);

	$query = 	
		"INSERT INTO players_table VALUES
		('$playerCode','$name','$position','$positionDetail','$image','$number','$nationality','$birthPlace','$birthDate','$height',
		'$salary','$contractExpire');";

	mysqli_query($conn,$query);

	// echo mysqli_error($conn); // cek error
	return mysqli_affected_rows($conn);
}