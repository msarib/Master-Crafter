<?php
include('../Connection.php');
$id = $_POST['id'];
$name = $_POST['idd'];

$query="SELECT * from ".$name." WHERE ID = '" . $id . "'";
$result = mysqli_query($conn,$query);
$cust = mysqli_fetch_array($result);
if($cust) {
echo json_encode($cust);
} 
else 
{
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>