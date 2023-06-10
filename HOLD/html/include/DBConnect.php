<?php
	$server = "localhost";
	$user = "hold";
	$password = "m1164819!";
	$dbname = "hold";

    session_start();

	$conn = mysqli_connect($server,$user,$password,$dbname);
	if($conn->connect_error) echo"<h2> connect Failed</h2>";

    
?>