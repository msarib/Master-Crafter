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
                                       }


if(isset($_POST['btn_checkout']))
{

$address = $_POST["txt_address"];
$area_name=$_POST['area_name'];

$update = "UPDATE TBL_PARTY_LIST SET PARTY_ADDRESS = '".$address."' WHERE PARTY_CODE = '".$PARTY_CODE."' ";
 $Update_query = mysqli_query($conn,$update);

 if ($Update_query !="") {
 	
 

$sub_total = $_POST["sub_total"];
$Charges = $_POST["Charges"];
$grand_total = $_POST["grand_total"];
$MESSAGE = $_POST["txt_message"];
$final_amount = $_POST["final_amount"];
$gst_amount = $_POST["gst_amount"];
$upayment=$_POST['upayment'];


$ORDER_STATUS = 1;
$PAYMENT_TYPE = 1;
$date = date('d-m-y h:i:s');



$insert = "INSERT INTO tbl_order_master(CUS_ID, SUB_TOTAL, CHARGES, GRAND_TOTAL, ORDER_STATUS, PAYMENT_TYPE, MESSAGE, CREATED_AT, UPDATED_AT,gst_amount,final_amount,area_name,payment_mode) VALUES ('".$PARTY_CODE."','".$sub_total."','".$Charges."','".$grand_total."','".$ORDER_STATUS."','".$PAYMENT_TYPE."','".$MESSAGE."','".$date."','".$date."','".$gst_amount."','".$final_amount."','".$area_name."','".$upayment."')";
    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
           $lastid = mysqli_insert_id($conn); 

           							   if(isset($_COOKIE["shopping_cart"]))
                                       {
                                        
                                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                        $cart_data = json_decode($cookie_data, true);
                                        

                                        foreach($cart_data as $keys => $values)
                                        {
                                        	$insert_detail = "INSERT INTO tbl_order_detail(ORDER_MID, ITEM_CODE, TITLE, UNIT_PRICE, QTY, TOTAL_PRICE,PARTY_CODE) VALUES ('".$lastid."','".$values["item_id"]."','".$values["item_name"]."','".$values["item_price"]."','".$values["item_quantity"]."','".$values["item_quantity"] * $values["item_price"]."','".$values["party_code"]."')";
                                        	 $query1 = mysqli_query($conn,$insert_detail);
                                        }
							        if($query1!="")
							        {
							        	
							        }

							         }
							       else{

							       	echo '<script> alert("Check The data!");</script>';
							       }
							        	setcookie("shopping_cart", "", time() - 3600);
							        	echo '<script> alert("Your Order Have been Place And Delivery Charges will be collect at the Your Doorstep. ");</script>';
							        	if($upayment=="Online Payment")
							        	{
                                         echo "<script>window.location='onlinepayment.php'</script>";
							        	}
							        	else
							        	{
							        		echo "<script>window.location='dashboard.php'</script>";
							        	}
							        	

							       }
							        else{

							       	echo '<script> alert("Master Check The data!");</script>';
							       }

}
 else{

       	echo '<script> alert("Check The address!");</script>';
       }

 }


 



?>
     <?php include('header.php') ?>
    
    <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php ">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<div class="checkout-discount">
            				<!--<form action="#">
        						<input type="text" class="form-control" required id="checkout-discount-input">
            					<label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
            				</form> -->
            			</div><!-- End .checkout-discount -->
            			<form action="#" method="post">
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-12">
		                						<label>First Name *</label>
		                						<input type="text" value="<?php echo $PARTY_NAME; ?>"readonly="true" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                					
		                				</div><!-- End .row -->
	            						<div class="row">
	            							<div class="col-sm-6">
		                						<label>Email address *</label>
	        							<input type="email" class="form-control" readonly="true" value="<?php echo $PARTY_EMAIL; ?>" required>
		                					</div><!-- End .col-sm-6 -->
		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control" readonly="true" value="<?php echo $PARTY_NUM1; ?>" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->
                                         <div class="row">
	            							<div class="col-sm-9">
	            								<label>Street address *</label>
	            						<input type="text" class="form-control" name="txt_address" placeholder="House number and Street name" required>
	            							</div>
	            							<div class="col-sm-3">
	            								<label>Area Name *</label>
	            						  <select class="form-control" name="area_name" required>
	            						  	<option value="" hidden>Select Area</option>
	            						  	<option>Gulshan e Iqbal</option>
	            						  	<option>Malir</option>
	            						  	<option>Hassan Square</option>
	            						  	<option>Laiqatabad</option>
	            						  	<option>Cant Station</option>
	            						  	<option>Defence</option>
	            						  	<option>Landhi</option>
	            						  	<option>Scheme 33</option>
	            						  	<option>Nagan Chrowngi</option>
	            						  	<option>Nazimabad</option>
	            						  	<option>Kareemabad</option>
	            						  	<option>Shershah</option>
	            						  </select>
	            							</div>
	            						</div>
	            						
	            						

	                					<label>Order notes (optional)</label>
	        							<textarea class="form-control" name="txt_message" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>

	        							<div class="card-body"><p>
	        								<h2 class="red-text" style="color: red;">Notice</h2>

        <table class="table">
          <tr>
          	<th><center>#</center></th>
          	<th><center>Vehicle</center></th>
          	<th><center>Per km</center></th>
          	<th><center>Base Price</center></th>
          	<th><center>Weight</center></th>
          </tr>
          <tr>
          	<td><center><img src="assets/images/suzuki.jpeg" style="height:80px;width:120px"></center></td>
          	<td><center>Suzuki</center></td>
          	<td><center>Rs : 100</center></td>
          	<td><center>Rs : 1000</center></td>
          	<td><center>2ton</center></td>
          </tr>
          <tr>
       <td><center><img src="assets/images/shezor.jpg" style="height:80px;width:120px"></center></td>
          	<td><center>Shezor</center></td>
          	<td><center>Rs : 150</center></td>
          	<td><center>Rs : 1500</center></td>
          	<td><center>4ton</center></td>
          </tr>
          <tr>
         
           <td><center><img src="assets/images/truck.jpg" style="height:80px;width:120px"></center></td>
          	<td><center>Truck</center></td>
          	<td><center>Rs : 200</center></td>
          	<td><center>Rs : 2000</center></td>
          	<td><center>10ton</center></td>
          </tr>
        </table>



	        								
										            </div>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>


		                					<tbody>
		                						<?php 
                                    if(isset($_COOKIE["shopping_cart"]))
                                       {
                                        $total = 0;
                                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                        $cart_data = json_decode($cookie_data, true);
                                        $cartCount = count($cart_data); 

                                        foreach($cart_data as $keys => $values)
                                        {
                                       ?>
		                						<tr>
		                							<td><a href="#"><?php echo $values["item_name"]; ?></a></td>
		                							<td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
		                						</tr>
		                						<?php $total = $total + ($values["item_quantity"] * $values["item_price"]); ?>
		                					<?php }}?>
		                					
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
	                							<?php if (empty($total)) {?>
	                								<td>Rs. 0.00</td>
	                							<?php } else {?>
	                							<td>Rs. <?php echo number_format($total, 2);?>
	                								<input type="hidden" name="sub_total" id="total" value="<?php echo ($total); ?>">
	                							</td>
	                							
	                							<?php } ?>
		                						</tr><!-- End .summary-subtotal -->
		                					<!-- 	<tr>
		                							<td>Standard Rate:</td>
		                							<td>Rs. <?php $CHARGES = "1000"; echo ($CHARGES); ?>
		                								
		                								<input type="hidden" name="Charges" id="charges" value="<?php echo ($CHARGES); ?>">
		                							</td>
		                							
		                						</tr> --> 
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>Rs. <?php echo ($total+$CHARGES); ?>

		                								
		                								<input type="hidden" name="grand_total" id="grand_total" value="<?php echo ($total+$CHARGES); ?>">
		                							</td>
		                							 
		                						</tr><!-- End .summary-total -->
		                						<?php
                                                      $finalamount=$total+$CHARGES;
                                                      $gst=($finalamount * 17) / 100;
		                							 ?>
		                						<tr class="summary-total">
		                							<td>GST(17%):</td>
		                							<td>Rs. <?php echo ($gst); ?>

		                								
		                								<input type="hidden" name="gst_amount" id="gst_amount" value="<?php echo $gst; ?>">
		                							</td>
		                							 
		                						</tr><!-- End .summary-total -->
		                						<?php
                                                      $granttotal=$finalamount + $gst;
                                                     
		                							 ?>
		                						<tr class="summary-total">
		                							<td>Grant Total:</td>
		                							<td>Rs. <?php echo ($granttotal); ?>

		                								
		                								<input type="hidden" name="final_amount" id="final_amount" value="<?php echo $granttotal; ?>">
		                							</td>
		                							 
		                						</tr><!-- End .summary-total -->
		                						
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										  
										    <div class="card">
										    	<select class="form-control" name="upayment" required>
										    		<option>Cash On Delivery</option>
										    		<option>Online Payment</option>
										    	</select>
										       
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										            <!--<div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
										            </div>--><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										
										</div><!-- End .accordion -->

		                				<button type="submit" name="btn_checkout" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->     
         <?php include('footer.php') ?>
</body>

</html>
