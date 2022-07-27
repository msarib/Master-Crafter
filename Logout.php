<?php

session_start();
session_destroy();
//header("Location: Login.php");
echo "<script>window.location='index.php'</script>";

	
?>