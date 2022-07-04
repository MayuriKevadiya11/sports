<?php 

	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "db_sports");

	//1.Creating Database connection
	$conn=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

	//test the connection 
	if(mysqli_connect_errno())
	{
		die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
	}
	else
	{
		//echo "connectionn establised sucessfully";
	}

?>