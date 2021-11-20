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