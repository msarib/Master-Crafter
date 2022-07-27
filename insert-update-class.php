<?php

if(count($_POST)>0)
{    
include('../Connection.php');

$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$table ="tbl_class";
if(empty($_POST['id']))
{
	//$table =$_POST['idd'];
		$query = "INSERT INTO ".$table." (NAME,STATUS_ID)VALUES ('$name','$age')";
}
else
{
	//$table =$_POST['idd'];
$query = "UPDATE ".$table." set  NAME='" . $_POST['name'] . "', STATUS_ID='" . $_POST['age'] . "' WHERE ID='" . $_POST['id'] . "'"; 
}
$res = mysqli_query($conn, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
}else {
echo "Error:" ;
}


?>