<?php

	$Firstname = $_POST['Firstname'];
	$Lastname= $_POST['Lastname'];
	$Gender = $_POST['Gender'];
	$ID = $_POST['ID'];
	$DoB= $_POST['Date of birth'];
	$Email= $_POST['Email'];
	$Address = $_POST['Address'];
	$Telephone = $_POST['Telephone'];
	$Mobile = $_POST['Mobile'];
	$Country= $_POST['Country'];
	// $massage = $_POST['massage'];

	if (!empty($Firstname) || !empty(Lastname) || !empty(Gender) || !empty(ID) || !empty(DoB) || !empty(Email) || !empty(Address) || !empty(Telephone) || !empty(Mobile) || !empty(Country))


	{
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "reg_db";

		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		if (mysqli_connect_error())
		{
			die('connect_Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}else 
		{

			$SELECT = "SELECT Email From customerdata Where Email = ? Limit 1";
			$INSERT = "INSERT Into customerdata(Firstname, Lastname, Gender, ID, DoB, Email, Address, Telephone, Mobile, Country, massage) value(?,?,?,?,?,?,?,?,?,?,?,?)";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $Email);
			$stmt->execute();
			$stmt->bind_results($Email);
			$stmt->store_results();
			$rnum = $stmt->num_rows;
				if ($rnum==0)
				{
					$stmt->close();
					$stmt = $conn->prepare($INSERT);
					$stmt->bind_param("ssssssssssss", $Firstname, $Lastname, $Gender, $ID, $DoB, $Email, $Address, $Telephone, $Mobile, $Country, $massage);
					$stmt->execute();

					echo "New record inserted successfully";
				}else 
				{
					echo "The Email already exist";
				}
				$stmt->close();
				$conn->close();
		}

	}else 
	{
		echo "All fieldare required";
		die();
	}



?>