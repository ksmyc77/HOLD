<?php
	$server = "localhost";
	$user = "root";
	$password = "6527";
	$dbname = "BBLE";

	$conn = mysqli_connect($server,$user,$password,$dbname);
	if($conn->connect_error) echo"<h2> connect Failed</h2>";

?>