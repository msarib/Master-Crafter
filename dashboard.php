<?php 
 session_start();
 error_reporting(0); 
if($_SESSION['id']==null || $_SESSION["party_nature"] == null && $_SESSION["party_nature"] != 2 )
{
    header("Location:Login.php");
}
include('Connection.php');

									$PARTY_CODE = $_SESSION["id"];
                                      $QUERY = "SELECT * FROM TBL_PARTY_LIST where PARTY_CODE = '".$PARTY_CODE."'";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result))
                                       {
                                            $PARTY_NAME = $row["PARTY_NAME"];
                                            $PARTY_EMAIL = $row["PARTY_EMAIL"];
                                            $PARTY_NUM1 = $row["PARTY_NUM1"];
                                            $PARTY_ADDRESS = $row["PARTY_ADDRESS"];
                                            $PARTY_PASWD = $row["PARTY_PASWD"];
                                       }


if(isset($_POST['btn_update']))
{

$UPD_PARTY_NAME = $_POST['txt_party_name'];
$UPD_PARTY_NUM1 = $_POST['txt_party_num1'];
$UPD_PARTY_ADDRESS = $_POST['txt_party_address'];
$UPD_PARTY_PASWD = $_POST['txt_new_paswd'];
$OLD_PARTY_PASWD = $_POST['txt_old_paswd'];

$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

if ($PARTY_PASWD == $OLD_PARTY_PASWD) 
{
	$UPDATE = "UPDATE TBL_PARTY_LIST SET PARTY_NAME='".$UPD_PARTY_NAME."', PARTY_NUM1='".$UPD_PARTY_NUM1."', PARTY_ADDRESS='".$UPD_PARTY_ADDRESS."',PARTY_PASWD='".$UPD_PARTY_PASWD."' , UPDATED_AT='".$date."', EDIT_IP_ADDRESS='".$ip_address."', EDIT_CMP_NAME='".$machinename."' WHERE PARTY_CODE = '".$PARTY_CODE."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
          $_SESSION["name"] = $PARTY_NAME; 
            echo '<script> alert("Your account Details Update Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }

} else{
	echo '<script> alert("Your Old Password is not match!");</script>';

}

    }

?>
?>




 <?php include('header.php') ?>
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders History</a>
								    </li>
								   <!-- <li class="nav-item">
								        <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Downloads</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li> -->
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" href="Logout.php">Log Out</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
								    	<p>Hello <span class="font-weight-normal text-dark">User</span> (not <span class="font-weight-normal text-dark">User</span>? <a href="#">Log out</a>) 
								    	<br>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">

								    	<table border="1" style="width:100%">
								    		<tr style="background-color: #FCB941;">
								    			<th><center style="color:white">Item Name </center></th>
								    			<th><center style="color:white">Price </center></th>
								    			<th><center style="color:white">Qty </center></th>
								    			<th><center style="color:white">Total Price </center>
								    				<th><center style="color:white">Status </center></th>
								    		</tr>
								    		<?php
								    		$ids=$_SESSION['id'];
								    		$fg_feth="SELECT * FROM `tbl_order_master` mstr,tbl_order_detail dt where dt.ORDER_MID = mstr.ORDER_ID AND mstr.CUS_ID='$ids'";
								    		$run_feth=mysqli_query($conn,$fg_feth);
								    		while($row_feth=mysqli_fetch_array($run_feth))
								    		{
								    			$TITLE=$row_feth['TITLE'];
								    			$UNIT_PRICE=$row_feth['UNIT_PRICE'];
								    			$QTY=$row_feth['QTY'];
								    			$TOTAL_PRICE=$row_feth['TOTAL_PRICE'];
								    			$status=$row_feth['status'];

								    			echo "
								    			<tr>
								    			<td><center>$TITLE </center></td>
								    			<td><center>$UNIT_PRICE </center></td>
								    			<td><center>$QTY </center></td>
								    			<td><center>$TOTAL_PRICE </center></td>
								    			<td><center>$status </center></td>

								    			</tr>
								    			";
								    		} 


								    		?>
								    		
								    	</table>
								    	<br>
								    	<a href="Shop.php" class="btn btn-outline-primary-2"><span>GO SHOP </span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane -->

								

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="#" method="post">
			                				<div class="row">
			                					<div class="col-sm-12">
			                						<label>First Name *</label>
			                						<input type="text" class="form-control" name="txt_party_name"  value="<?php echo $PARTY_NAME; ?>" required>
			                					</div><!-- End .col-sm-6 -->

			                				
			                				</div><!-- End .row -->

			                				<div class="row">
			                					<div class="col-sm-6">
			                						<label>Email address *</label>
		        							<input type="email" class="form-control" readonly="true" value="<?php echo $PARTY_EMAIL; ?>" required>
			                					</div><!-- End .col-sm-6 -->

			                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control" name="txt_party_num1" value="<?php echo $PARTY_NUM1; ?>" required>
		                					</div><!-- End .col-sm-6 -->

			                				
			                				</div><!-- End .row -->

			                				<label>Street address *</label>
	            						<input type="text" class="form-control" name="txt_party_address"  value="<?php echo $PARTY_ADDRESS; ?>" placeholder="House number and Street name" required>

		            						

		                					

		            						<label>Current password (leave blank to leave unchanged)</label>
		            						<input type="password" name="txt_old_paswd" class="form-control">

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" name="txt_new_paswd" class="form-control">

		                					<button type="submit" name="btn_update" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
         <?php include('footer.php') ?>
</body>
</html>