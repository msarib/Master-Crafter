  <?php require "Connection.php";
error_reporting(0);
session_start();

if($_SESSION['id']!=null && $_SESSION["party_nature"] ==2 ){
  
    header("Location:index.php");
}

if(isset($_POST['btn_login']))
{
    $useremail = $_POST['email'];
    $username = $_POST['email'];
    $Password = $_POST['pass']; 
    $login = "SELECT * FROM tbl_party_list WHERE  (PARTY_NAME = '".$username."' OR PARTY_EMAIL ='".$useremail."')";
    $result = mysqli_query($conn,$login)or die (mysqli_error($Connection));
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if($count==1 || $count==2)
    {
        $update="update tbl_party_list set PARTY_PASWD='$Password' where (PARTY_NAME = '".$username."' OR PARTY_EMAIL ='".$useremail."')";
        $run_update=mysqli_query($conn,$update);
        if($run_update)
        {
        	echo "<script>alert('Password Change Sucessfully')</script>";
    echo "<script>window.open('Login.php','_self')</script>";

        }    
    }
    else
    {
    	echo "<script>alert('Username or Email Does Not Exist')</script>";
    echo "<script>window.open('forget_password.php','_self')</script>";
    }

}
?>  


<?php include('header.php') ?>
  <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			
							<div class="tab-content">
							    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
							    	<form method="post">
							    		<div class="form-group">
							    			<label for="singin-email-2">Username or email address *</label>
							    			<input type="text" name="email" class="form-control" id="singin-email-2" name="singin-email" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="singin-password-2">New Password *</label>
							    			<input type="password" name="pass" class="form-control" id="singin-password-2" name="singin-password" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button type="submit" name="btn_login" class="btn btn-outline-primary-2">
			                					<span>Change Password</span>
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