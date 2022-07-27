<?php
//session_start();
error_reporting(0); 
if(isset($_POST['btn_wishlist']))
{
	session_start();
 if(isset($_SESSION["id"]) && $_SESSION["id"]!="")
{


		$ITEM_CODE = $_POST['hidden_idd'];
		$USER_CODE =$_SESSION["id"];
        $insert = "INSERT INTO tbl_wishlist(ITEM_CODE,USER_CODE)  VALUES ('".$ITEM_CODE."','".$USER_CODE."')";
    	$query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
            echo '<script> alert("Add to Wishlist Successfully!");</script>';
        } 
        else
        {
            echo 'Not Inserted';
        }
        }
         else
        {
           echo '<script> alert("Create Account & Add to Wishlist!");</script>';
        } 
       
}


?>