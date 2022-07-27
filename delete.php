
<?php
include ('../Connection.php');
$id = $_POST['id'];
$table = $_POST['idd'];

$query = "DELETE FROM ".$table ." WHERE ID='" . $id . "'";
$res = mysqli_query($conn, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>