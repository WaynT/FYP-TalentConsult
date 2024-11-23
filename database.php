<?php
	require_once "settings.php";
	$conn = @mysqli_connect ($host, $user, $pwd, $sql_db);
	if ($conn)
	{
		echo "<p>connection successful! </p>";

		$query1 = "CREATE TABLE Applicants (
            date date,
            name varchar (20),
			IC varchar(40),
			contact_num varchar(15),
			email varchar (40),
			project varchar(30),
			PIC varchar (400),
			remark TEXT,
			status varchar(20)
			)";
		
		$query2 = "CREATE TABLE PIC (
			projectname varchar(40),
			client varchar(30),
			applicants int,
			priority int,
			remarks TEXT,
			recruiters varchar(400)
			)";

		$query3 = "CREATE TABLE User (
            username varchar(30),
            email varchar (40),
			password varchar(30),
			PIC varchar(10),
			phonenumber varchar(30),
			reset_token_hash VARCHAR(64) NULL DEFAULT NULL,
			reset_token_expires_at DATETIME NULL DEFAULT NULL,
			UNIQUE(`reset_token_hash`),
			verification VARCHAR(6) NULL
			)";
		
		$query4 = "INSERT INTO `User`
		(`username`, `email`, `password`, `PIC`, `phonenumber`, `reset_token_hash`,
		 `reset_token_expires_at`, `verification`) 
		 VALUES ('Admin','Talentconsult@gmail.com','intiandtc',
		 'true',NULL,NULL,NULL,NULL)";

	if ($conn->query($query1) === TRUE)
	{
		echo "Table 'Applicants' created successfully<br>";
	}else
	{
		echo "Error creating table 'Applicants': " . $conn->error . "<br>";
	}

	if ($conn->query($query2) === TRUE)
	{
		echo "Table 'PIC' created successfully<br>";
	}else
	{
		echo "Error creating table 'PIC': " . $conn->error . "<br>";
	}

	if ($conn->query($query3) === TRUE)
	{
		echo "Table 'User' created successfully<br>";
	}else
	{
		echo "Error creating table 'User': " . $conn->error . "<br>";
	}

	if ($conn->query($query4) === TRUE)
	{
		echo "User 'Talentconsult@gmail.com' has been added!<br>";
	}else
	{
		echo "Error adding user 'Talentconsult@gmail.com': " . $conn->error . "<br>";
	}

	$conn->close();
	}
	else
        echo "<p>Unable to connect to the db.</p>";
?>
 