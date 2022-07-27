  <?php 

require "Connection.php";
error_reporting(0);
session_start();

if($_SESSION['id']!=null && $_SESSION["party_nature"] ==2 ){
  
    header("Location:index.php");
}
if(isset($_POST['btn_submit']))
{

$Name = $_POST['txt_name'];
$Email = $_POST['txt_email'];
$Number = $_POST['txt_number'];
$Passwd = $_POST['txt_paswd'];
    $area_name=$_POST['area_name'];
$Pnature = $_POST['cmb_pnature'];
$STATUS_ID = '1';
$date = date('d-m-y h:i:s');

$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

	$check_email = mysqli_query($conn, "SELECT PARTY_EMAIL FROM tbl_party_list WHERE PARTY_EMAIL = '".$Email."' ");
if(mysqli_num_rows($check_email) > 0){
     echo '<script> alert("Email Already Exists !!!...");</script>';
}else{



    $insert = "INSERT INTO tbl_party_list(PARTY_NAME,PARTY_NUM1,PARTY_EMAIL,PARTY_PASWD,PNATURE_CODE,STATUS_ID,CREATED_AT,ADD_CMP_NAME,ADD_IP_ADDRESS,UPDATED_AT,EDIT_CMP_NAME,EDIT_IP_ADDRESS,area_name)  VALUES ('".$Name."','".$Number."','".$Email."','".$Passwd."','".$Pnature."','".$STATUS_ID."','".$date."','".$machinename."','".$ip_address."','".$date."','".$machinename."','".$ip_address."','".$area_name."')";
    
    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
            echo '<script> alert("You Are Registered Successfully!");</script>';
        } 
        else
        {
            echo '<script> alert("Not Inserted");</script>';
        }
    }

}
if(isset($_POST['btn_login']))
{
    $useremail = $_POST['email'];
    $username = $_POST['email'];
    $Password = $_POST['pass']; 

    $login = "SELECT * FROM tbl_party_list WHERE  (PARTY_NAME = '".$username."' OR PARTY_EMAIL ='".$useremail."') AND PARTY_PASWD='".$Password."' AND STATUS_ID = 1";
    $result = mysqli_query($conn,$login)or die (mysqli_error($Connection));
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if($count==1 || $count==2)
    {
        $_SESSION["id"] = $row['PARTY_CODE'];
        $_SESSION["name"] = $row['PARTY_NAME'];
        $_SESSION["email"] = $row['PARTY_EMAIL'];
        $_SESSION["party_nature"] = $row['PNATURE_CODE'];     
    }
    else
    {
    echo header("Location:Error.php");
    }
    if (isset($_SESSION["id"]) && $_SESSION["id"]!="")
    {
       if ($_SESSION["party_nature"] == 1 || $_SESSION["party_nature"] == 3 ) 
       {
           echo "<script>window.location='Admin/index.php'</script>";
       }
       elseif ($_SESSION["party_nature"] == 2) 
       {
           echo "<script>window.location='index.php'</script>";
       }
       else
       {
        echo "<script>window.location='Error.php'</script>";
       }
         
    }
}
?>  


<?php include('header.php') ?>
  <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
							    </li>
							    <li class="nav-item">
							        <a class="nav-link" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
							    </li>
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
							    	<form action="#" method="post">
							    		<div class="form-group">
							    			<label for="singin-email-2">Username or email address *</label>
							    			<input type="text" name="email" class="form-control" id="singin-email-2" name="singin-email" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="singin-password-2">Password *</label>
							    			<input type="password" name="pass" class="form-control" id="singin-password-2" name="singin-password" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button type="submit" name="btn_login" class="btn btn-outline-primary-2">
			                					<span>LOG IN</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                			
											<a href="forget_password.php" class="forgot-link">Forgot Your Password?</a>
							    		</div><!-- End .form-footer -->
							    	</form>
							    	
							    </div><!-- .End .tab-pane -->
							    <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
							    	<form action="#" method="post">
							    			<div class="form-group">
							    			<label for="register-email-2">Full Name *</label>
							    			<input type="text" name="txt_name" class="form-control" id="register-email-2" name="register-email" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="register-email-2">Your email address *</label>
							    			<input type="email" name="txt_email" class="form-control" id="register-email-2" name="register-email" required>
							    		</div><!-- End .form-group -->

							    			<div class="form-group">
							    			<label for="register-email-2">Phone Number *</label>
							    			<input type="text" name="txt_number" class="form-control" id="register-email-2" name="register-email" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="register-password-2">Password *</label>
							    			<input type="password" name="txt_paswd" class="form-control" id="register-password-2" name="register-password" required>
							    		</div><!-- End .form-group -->


							    		 <div class="form-group">
                                            <label for="register-password">Nature</label>
                                             <select class="form-control" name="cmb_pnature">
                                                <option value="0">----Select------</option>
                                            <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_act_nature");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {
                                                        
                                                        
                                                        echo '<option value="' .$row['NATURE_CODE'] .'">' .$row['NATURE_NAME'] .'</option>';
                                                    }
                                                ?>
                                          </select>
                        
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                        	<label for="register-password">Area Name</label>
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

							    		<div class="form-footer">
							    			<button type="submit" name="btn_submit" class="btn btn-outline-primary-2">
			                					<span>SIGN UP</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

			                				<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="register-policy-2" required>
												<label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
											</div><!-- End .custom-checkbox -->
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