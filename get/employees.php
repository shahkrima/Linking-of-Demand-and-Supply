<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "linking";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$skill_table = strtolower(trim($_GET['skill']));
	$sql = "SELECT fullName, DOB, gender, city, rating FROM employee JOIN $skill_table ON employee.UID=$skill_table.UID";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	$names = array();
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	array_push($names, $row);
	    }
	}
	print_r(json_encode($names));
?>