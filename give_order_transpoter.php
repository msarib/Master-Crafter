<?php 
include('../Connection.php');

session_start();
error_reporting(0);


 $ORDER_ID = $_GET["order_id"];
                                       $QUERY = "SELECT A.*,B.PARTY_NAME,B.PARTY_EMAIL,B.PARTY_NUM1,B.PARTY_ADDRESS FROM tbl_order_master A LEFT OUTER JOIN tbl_party_list B ON A.CUS_ID = B.PARTY_CODE WHERE ORDER_ID = '".$ORDER_ID."' ";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result))
                                       {
                                            $ORDER_NUM =  "INV-0000".$row["ORDER_ID"];
                                            $CHARGES = $row["CHARGES"];
                                       }

if(isset($_POST['btn_save']))
{

$PARTY_CODE = $_POST['cmb_transporter'];
$CHARGES = $_POST['txt_charges'];
$TO_STATUS = 0;
$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

    $insert = "INSERT INTO tbl_transpoter_order (ORDER_MID,PARTY_CODE,CHARGES,TO_STATUS,CREATED_AT,UPDATED_AT) VALUES ('".$ORDER_ID."','".$PARTY_CODE."','".$CHARGES."','".$TO_STATUS."','".$date."','".$date."')";

    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
         
            echo '<script> alert("Transporter Give Order Is Successfully!");</script>';
             echo "<script>window.location='online_order.php'</script>";
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
                                    <h4 class="page-title">Order Transfer</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Order Transfer
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
	                                                <div class="col-lg-3">
                                                        <h6>Invoice Number</h6>
	                                                    <input type="text" name="txt_order_num" readonly="true" value="<?php echo $ORDER_NUM; ?>" class="form-control" placeholder="Order#"> 
	                                                </div>

                                                   <div class="col-lg-3">
                                                    <h6>Base price </h6>
                                                      <input type="number" name="txt_charges" value="<?php echo $CHARGES; ?>" class="form-control" placeholder="Charges">
                                                  </div>

                                                   <div class="col-lg-6">
                                                    <h6>Select transpoter</h6>
                                                            <select name="cmb_transporter" class="form-control">
                                                           
                                                            <option value="0">Select Transporter</option>
                                                           <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_party_list where STATUS_ID = '1' AND PNATURE_CODE = 3");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {
                                                        echo '<option value="' .$row['PARTY_CODE'] .'">' .$row['PARTY_NAME'] .'</option>';
                                                    }
                                                ?>
                                                      </select>
                                                  </div>
                                                 
	                                            </div>
                            <!-- end col-->
	                                            
          
                    </div>
                          <div class="wrapper" align="right" >
                                                   
                                        <button type="submit" name="btn_save" style="margin-top:10px"  class="btn btn-info btn-rounded w-md waves-effect waves-light m-b-5">Save</button> 
                                                
                                                </div> 
	                                      
                        				
                        			</div>
                        		</div>
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

   



