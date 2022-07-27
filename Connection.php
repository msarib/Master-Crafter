<?php

$conn = mysqli_connect('localhost','root',"",'master_crafter');
$con = mysqli_connect('localhost','root',"",'master_crafter');

if($conn-> connect_error)
{
	die("Connection Failed:".$conn->connect_error);
}
?>