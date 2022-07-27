      <?php 

require "Connection.php";

if(isset($_POST['btn_save']))
{

$Email = $_POST['txt_email'];
$date = date('d-m-y h:i:s');
$NAME = $_POST['txt_name'];
$EMAIL = $_POST['txt_email'];
$PHONE_NUMBER = $_POST['txt_phone'];
$SUBJECT = $_POST['txt_subject'];
$MESSAGE = $_POST['txt_message'];

    $insert = "INSERT INTO tbl_contact(CT_DATE,NAME,EMAIL,PHONE_NUMBER,SUBJECT,MESSAGE)VALUES('".$date."','".$NAME."','".$Email."','".$PHONE_NUMBER."','".$SUBJECT."','".$MESSAGE."')";
    
    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
            echo '<script> alert("Thank You For The Contact!. ");</script>';
        } 
        else
        {
            echo 'Not Inserted';
        }
    }
?>


<?php include('header.php') ?>
  <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Contact us</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div id="map" class="mb-5"></div><!-- End #map -->
                <div class="container">
                	<div class="row">
                		<div class="col-md-4">
                			<div class="contact-box text-center">
        						<h3>Office</h3>

        						<address>DHA Phase IV, Khayban E Ittehad, <br>KHI 75500, Karachi</address>
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->

                		<div class="col-md-4">
                			<div class="contact-box text-center">
        						<h3>Start a Conversation</h3>

        						<div><a href="mailto:#">sarib.explore@gmail.com</a></div>
        						<div><a href="tel:#">+92 335-3509-521</a> </div>
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->

                		<div class="col-md-4">
                			<div class="contact-box text-center">
        						<h3>Social</h3>

        						<div class="social-icons social-icons-color justify-content-center">
			    					<a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
			    					<a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
			    					<a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
			    					<a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
			    					<a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
			    				</div><!-- End .soial-icons -->
        					</div><!-- End .contact-box -->
                		</div><!-- End .col-md-4 -->
                	</div><!-- End .row -->

                	<hr class="mt-3 mb-5 mt-md-1">
                	<div class="touch-container row justify-content-center">
                		<div class="col-md-9 col-lg-7">
                			<div class="text-center">
                			<h2 class="title mb-1">Get In Touch</h2><!-- End .title mb-2 -->
                			<p class="lead text-primary">
                				We collaborate with ambitious brands and people; we’d love to build something great together.
                			</p><!-- End .lead text-primary -->
                			<p class="mb-3">Master Crafter.pk wants to set new standards in the construction and finishing material purchase process by providing the most competitive rates in the market, the top quality brands, express delivery to your doorstep, multiple payment options and a dedicated customer support team.</p>
                			</div><!-- End .text-center -->

                			<form method="post" class="contact-form mb-2">
                				<div class="row">
                					<div class="col-sm-4">
                                        <label for="cname" class="sr-only">Name</label>
                						<input type="text" name="txt_name" class="form-control" id="cname" placeholder="Name *" required>
                					</div><!-- End .col-sm-4 -->

                					<div class="col-sm-4">
                                        <label for="cemail" class="sr-only">Name</label>
                						<input type="email" name="txt_email" class="form-control" id="cemail" placeholder="Email *" required>
                					</div><!-- End .col-sm-4 -->

                					<div class="col-sm-4">
                                        <label for="cphone" class="sr-only">Phone</label>
                						<input type="tel" name="txt_phone" class="form-control" id="cphone" placeholder="Phone">
                					</div><!-- End .col-sm-4 -->
                				</div><!-- End .row -->

                                <label for="csubject" class="sr-only">Subject</label>
        						<input type="text" name="txt_subject" class="form-control" id="csubject" placeholder="Subject">

                                <label for="cmessage" class="sr-only">Message</label>
                				<textarea class="form-control" name="txt_message" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>
								
								<div class="text-center">
	                				<button type="submit" name="btn_save" class="btn btn-outline-primary-2 btn-minwidth-sm">
	                					<span>SUBMIT</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
                				</div><!-- End .text-center -->
                			</form><!-- End .contact-form -->
                		</div><!-- End .col-md-9 col-lg-7 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
       <?php include('footer.php') ?>
       <!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script> -->
</body>

</html>