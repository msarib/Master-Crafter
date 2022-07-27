  <?php 

require "Connection.php";
error_reporting(0);
session_start();
$pid=$_GET['pid'];

if(isset($_POST['btn_login']))
{
	$urating=$_POST['urating'];
	$ureview=$_POST['ureview'];
	$uname=$_POST['uname'];
	$ins="INSERT INTO tbl_review(product_id,uname,urating,ureview,r_date) VALUES ('$pid','$uname','$urating','$ureview',NOW())";
	$run_ins=mysqli_query($con,$ins);
	if($run_ins)
	{
		echo "<script>alert('Review Place Successfully')</script>";
		echo "<script>window.open('add_to_cart.php?ID=$pid','_self')</script>";

	}
	else
	{
			echo "<script>alert('Review Not Place Successfully')</script>";
		echo "<script>window.open('add_to_cart.php?ID=$pid','_self')</script>";

	}
}
?>  


<?php include('header.php') ?>
  <main class="main">
           

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Review</a>
							    </li>
							    
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
							    	<form  method="post">
							    		<div class="form-group">
							    			<label for="singin-password-2">Your Name</label>
							    			<input type="text" name="uname" class="form-control" id="singin-password-2" placeholder="Enter Your Name" required>
							    		</div><!-- End .form-group -->
							    		<div class="form-group">
							    			<label for="singin-email-2">Select Your Rating (5 is Good)*</label>
							    		<select class="form-control" name="urating" required>
							    			<option value="" hidden>Select Rating</option>
							    			<option>5</option>
							    			<option>4</option>
							    			<option>3</option>
							    			<option>2</option>
							    			<option>1</option>
							    		</select>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="singin-password-2">Review *</label>
							    			<input type="text" name="ureview" class="form-control" id="singin-password-2" placeholder="Enter Your Reviews" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button type="submit" name="btn_login" class="btn btn-outline-primary-2">
			                					<span>Add Review</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                				

							    		</div><!-- End .form-footer -->
							    	</form>
							    	
							    </div><!-- .End .tab-pane -->
							   
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->
         <?php include('footer.php') ?>
</body>

</html>