<?php 
include('../Connection.php');

session_start();
error_reporting(0);

if ($_SESSION["id"] != null && isset($_SESSION["party_nature"]) != null && $_SESSION["role_id"] == null) {
  
$PARTY_CODE = $_SESSION["id"];
$PNATURE_CODE = $_SESSION["party_nature"];

$QUERY = "SELECT A.*,B.NATURE_NAME from TBL_PARTY_LIST A LEFT OUTER JOIN TBL_ACT_NATURE B ON A.PNATURE_CODE = B.NATURE_CODE WHERE A.PARTY_CODE = '".$PARTY_CODE."'";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result))

                                       {
                                            $PARTY_NAME = $row["PARTY_NAME"];
                                            $PARTY_EMAIL = $row["PARTY_EMAIL"];
                                            $PARTY_PASWD = $row["PARTY_PASWD"];
                                            $PARTY_NUM1 = $row["PARTY_NUM1"]; 
                                            $PARTY_NUM2 = $row["PARTY_NUM2"];
                                            $PARTY_NATURE = $row["NATURE_NAME"];

 }                                     
 }
 if ($_SESSION["id"] != null && isset($_SESSION["role_id"]) != null && $_SESSION["party_nature"] == null) 
 {

$PARTY_CODE = $_SESSION["id"];
$ROLE_ID = $_SESSION["role_id"];
  

$QUERY = "SELECT A.*,B.ROLE_NAME from tbl_user A LEFT OUTER JOIN TBL_ROLE B ON A.ROLE_ID = B.ROLE_ID WHERE A.U_CODE = '".$PARTY_CODE."'";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result))

                                       {
                                            $PARTY_NAME = $row["U_NAME"];
                                            $PARTY_EMAIL = $row["U_EMAIL"];
                                            $PARTY_PASWD = $row["U_PASSWORD"];
                                            $PARTY_NUM1 ="-"; 
                                            $PARTY_NUM2 = "-";
                                            $PARTY_NATURE = $row["ROLE_NAME"];

 }                                     
 }

if(isset($_POST['btn_update']))
{

$PARTY_NAME = $_POST['txt_party_name'];
$PARTY_NUM1 = $_POST['txt_party_num1'];
$PARTY_NUM2 = $_POST['txt_party_num2'];
$PARTY_PASWD = $_POST['txt_paswd'];
$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

$UPDATE = "UPDATE TBL_PARTY_LIST SET PARTY_NAME='".$PARTY_NAME."', PARTY_NUM1='".$PARTY_NUM1."', PARTY_NUM2='".$PARTY_NUM2."' ,PARTY_PASWD='".$PARTY_PASWD."' , UPDATED_AT='".$date."', EDIT_IP_ADDRESS='".$ip_address."', EDIT_CMP_NAME='".$machinename."' WHERE PARTY_CODE = '".$PARTY_CODE."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
          $_SESSION["name"] = $PARTY_NAME; 
            echo '<script> alert("Your Is Update Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }

?>
<?php include('header.php'); ?>
<!-- <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" /> -->
<link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<link href="plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
<link href="assets/css/components.css" rel="stylesheet" type="text/css" />


 <div class="content-page">
                <!-- Start content -->
                <div class="content">
    <div class="row">
    	<div class="container">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Profile</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Profile
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
						<form class="form-horizontal" method="post" enctype="multipart/form-data">
                
                            <div class="col-sm-12">
                                <div class="card-box">
                                   
                        			<div class="row">
                        				<div class="col-lg-12">
                        	
                                                    <div class="form-group">
	                                                <div class="col-lg-6">
	                                                    <input type="text" name="txt_party_name" value="<?php echo $PARTY_NAME; ?>" class="form-control" placeholder="Name">
	                                                </div>

                                                   <div class="col-lg-6">
                                                      <input type="text" name="txt_party_email" value="<?php echo $PARTY_EMAIL; ?>" class="form-control" placeholder="Email">
                                                  </div>
                                                 
	                                            </div>

	                                           
	                                            <div class="form-group">
                                                    <div class="col-lg-3">
                                                        <input type="Password" name="txt_paswd" value="<?php echo $PARTY_PASWD; ?>" class="form-control" placeholder="Password">
                                                    </div>
	                                                <div class="col-lg-3">
	                                                   <input type="text" readonly="true" name="txt_party_nature" value="<?php echo $PARTY_NATURE; ?>" class="form-control" placeholder="Nature">
	                                                </div>
                                                   <div class="col-lg-3">
                                                        <input type="number" name="txt_party_num1" class="form-control" value="<?php echo $PARTY_NUM1; ?>" placeholder="Phone#">
                                                    </div>
                                                  <div class="col-lg-3">
                                                     <input type="number" name="txt_party_num2" class="form-control" value="<?php echo $PARTY_NUM2; ?>" placeholder="Telephone#">
                                                  </div>
                                                </div>
	                                            
                            <!-- end col-->
	                                            
          
                    </div>
                          <div class="wrapper" align="right" >
                                                   
                                        <button type="submit" name="btn_update" style="margin-top:10px"  class="btn btn-info btn-rounded w-md waves-effect waves-light m-b-5">Update Profile</button> 
                                                
                                                </div> 
	                                      
                        				
                        			</div>
                        		</div>
                            <?php if ($_SESSION["name"] != "" && $PARTY_NUM1 != "" ) { ?>
                      
                          <?php } else {?>
  <div class="alert alert-danger" role="alert">
                                                <strong>Sorry!</strong> <a href="#" class="alert-link">Your Profile is not fully update</a> Please Full Details are uploaded then your work is process.
                                            </div>
                                            
                         <?php }?>
                          </div>
                        </form>
                        



   <?php include('footer.php'); ?>
<!-- jQuery  --> 
<script src="https://demos.dcblog.dev/grossprofitcalulator/jquery.js"></script>


  
     	<script src="plugins/jquery.filer/js/jquery.filer.min.js"></script>
		  <script src="assets/pages/jquery.fileuploads.init.js"></script>
     	<script src="plugins/timepicker/bootstrap-timepicker.js"></script>
     	<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
     	<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
      <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
      <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
      <script src="assets/pages/jquery.form-pickers.init.js"></script>
      <script src="plugins/tinymce/tinymce.min.js"></script>

   



