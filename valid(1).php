<?php

// session_start();
// include"index.php";

	$firstname = $_GET['firstname'];
	$lastname= $_GET['lastname'];
	$email = $_GET['email'];
	$address = $_GET['address'];
	$telephone = $_GET['telephone'];


// database connection
	$conn = new mysqli('localhost', 'root', '', 'reg_db');
	if ($conn->connect_error) {
		// code...

		die('connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare(INSERT INTO `userdata1`(`id`, `firstname`, `lastname`, `email`, `address`, `telephone`) VALUES (NULL,'$firstname','$lastname','$email','$address','$telephone'));
		$stmt->bind_param("sssii", $id, $firstname, $lastname, $email, $address, $telephone);
		$stmt->execute();

		echo "regestration successfully";
		$stmt->close();
		$conn->close();
	}
?>