<?php 
include('../Connection.php');
session_start();
//error_reporting(0);

if(isset($_POST['btn_save']))
{

$PARTY_CODE = $_SESSION["id"];
$PNATURE_CODE = $_SESSION["party_nature"];
$veh_name = $_POST['txt_vhname'];
$veh_no = $_POST['txt_vhno'];
$engineno = $_POST['txt_engno'];
$chasisno = $_POST['txt_chasisno'];
$cmb_company = $_POST['cmb_veh_comp'];
$cmb_category = $_POST['cmb_veh_category'];
$pkmr = $_POST['txt_pkmr'];
$STANDARD_RATE = $_POST['txt_standard_rate'];
$descp = $_POST['txt_descp'];
$cmb_status = $_POST['cmb_status'];
$APRV_ID = 0;
$_upload=$_FILES['upload_img']['name'];
$_img=$_FILES['upload_img']['tmp_name'];
move_uploaded_file($_img,"upload/Vehicle/$_upload"); 
$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

$insert = "INSERT INTO tbl_vehicle (PARTY_CODE, PNATURE_CODE, VEH_NAME, VEH_COMP_CODE, VEH_CAT_CODE, VEH_NO, VEH_ENG_NO, VEH_CHECHIS_NO, VEH_IMG, PKMR,STANDARD_RATE, VEH_DESCP, STATUS_ID, APRV_ID, CREATED_AT, ADD_IP_ADDRESS, ADD_CMP_NAME, UPDATED_AT, EDIT_IP_ADDRESS, EDIT_CMP_NAME) VALUES ('".$PARTY_CODE."','".$PNATURE_CODE."', '".$veh_name."', '".$cmb_company."', '".$cmb_category."', '".$veh_no."', '".$engineno."', '".$chasisno."','".$_upload."', '".$pkmr."','".$STANDARD_RATE."', '".$descp."' ,'".$cmb_status."','".$APRV_ID."','".$date."','".$ip_address."','".$machinename."','".$date."','".$ip_address."','".$machinename."')";

    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
          echo '<script> alert("Your Vehicle Registered Successfully!");</script>';    
        } 
        else
        {
            echo 'Not Inserted';
        }
    }
?>

<?php include('header.php');?>
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
                                    <h4 class="page-title"> Vehicle Registration  </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Vehicle Registration
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
							<div class="row">
                  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                
                            <div class="col-sm-12">
                                <div class="card-box">
                                   
                        			<div class="row">
                        				<div class="col-lg-12">
                        
                                                    <div class="form-group">
	                                                <div class="col-lg-6">
	                                               <input type="text" name="txt_vhname" class="form-control" placeholder="Vehicle Name">
	                                                </div>
                                                  <div class="col-lg-2">
                                                        <select name="cmb_veh_comp" class="form-control">
                                                            <option value="0">Select Company</option>
                                                             
                                                <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_veh_company where STATUS_ID = '1'");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {
                                                        echo '<option value="' .$row['ID'] .'">' .$row['NAME'] .'</option>';
                                                    }
                                                ?>  
                                                        </select>
                                                    </div>
                                                  <div class="col-lg-2">
                                                        <select name="cmb_veh_category" class="form-control select2">
                                                      <option value="0">Select Category</option>
                                    
                                                  <?php
        
                                                    $result2 = mysqli_query($conn,"SELECT * FROM tbl_veh_category where STATUS_ID = '1'");
                                                  
                                                    while($row1 = mysqli_fetch_array($result2)) 
                                                    {
                                                     echo '<option value="' .$row1['ID'] .'"> ' .$row1['NAME'] .'</option>';
                                                    }
                                                    
                                                ?>
                                       
                                                    </select>
                                                  </div>

                                                   <div class="col-lg-2">
                                                    <input type="text" name="txt_vhno" class="form-control" placeholder="Vehicle#">
                                                  </div>
                                                
                                                
	                                            </div>
	                                           
	                                            <div class="form-group">
                                                    
	                                               
	                                                <div class="col-lg-2">
	                                                 <input type="text" name="txt_engno" class="form-control" placeholder="Engine#">
	                                                </div>
                                                    <div class="col-lg-2">
                                                 <input type="text" name="txt_chasisno" class="form-control" placeholder="Chasis#">
                                                  </div>
                                                   <div class="col-lg-1">
                                                     <input type="number" name="txt_pkmr" class="form-control" placeholder="P/KM">
                                                  </div>
                                                   <div class="col-lg-1">
                                                     <input type="number" name="txt_standard_rate" class="form-control" placeholder="S/Rate">
                                                  </div>
                                                   <div class="col-lg-4">
                                                     <input type="file" name="upload_img" class="filestyle" data-buttonname="btn-primary">
                                                    </div>
                                                     <div class="col-lg-2">
                                                        <select name="cmb_status" class="form-control">
                                                           

                                                            <option value="0">Select Status</option>
                                                             <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_status ");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {
                                                        echo '<option value="' .$row['STATUS_ID'] .'">' .$row['STATUS_NAME'] .'</option>';
                                                    }
                                                ?>          
                                                        </select>
                                                    </div>
	                                            </div>
	                                           
													<div class="form-group">
	                                               
                                           <div class="col-lg-12">
                                                <input type="text" name="txt_descp" class="form-control" placeholder="Description">
                                                  </div>        
	                                                
	                                            </div>
	                                            
                            <!-- end col-->
	               
          
                    </div>
                          <div class="wrapper" align="right" >
                                                   
                                        <button type="submit" name="btn_save" style="margin-top:10px"  class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Save</button> 
                                                
                                                </div> 
	                                        
                        				</div>
                        			</div>
                              </form>
                        		</div>
                      


   <?php include('footer.php');?>
<!-- jQuery  --> 
<script src="https://demos.dcblog.dev/grossprofitcalulator/jquery.js"></script>
<script type="text/javascript">
$(function() {

    $(document).on("change", ".item", function () {

        var sellprice = $('.sellprice').val();
        var disc = $('.prod_disc').val();

        if (sellprice > 0) 
        {
            var disc_amt = (disc * sellprice / 100).toFixed(2);
            var actual_rate = sellprice - disc_amt;

           // $('.grossProfit').val(grossProfit.toFixed(2));
            $('.actual_rate').val(actual_rate);
         //   $('.profit').val(profit);
        }
    });

});
</script>
<script src="assets/js/urdu.js" type="text/javascript"></script>
    <script> window.onload = myOnload;

        function myOnload(evt) {
            MakeTextBoxUrduEnabled(prod_uname);//enable Urdu in html text box
            
        }</script>

<!-- <script type="text/javascript">
$('#category').on('change', function(e){
  console.log(e);
  var = cat_id = e.traget.value;

  $.get('/ajax-subcat?cat_id='+ cat_id, function(data){

$('#subcategory').empty();   
   $.echo(data,function(index, subcatObj){

    $('#subcategory').append('<option value="'+subcatObj.CATE_ID+'" >'+subcatObj.CATE_NAME+'</option>')
   });
    });
  });

</script> -->



     <script>
        	$(document).ready(function () {
			    if($("#elm1").length > 0){
			        tinymce.init({
			            selector: "textarea#elm1",
			            theme: "modern",
			            height:300,
			            plugins: [
			                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			                "save table contextmenu directionality emoticons template paste textcolor"
			            ],
			            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
			            style_formats: [
			                {title: 'Bold text', inline: 'b'},
			                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			                {title: 'Example 1', inline: 'span', classes: 'example1'},
			                {title: 'Example 2', inline: 'span', classes: 'example2'},
			                {title: 'Table styles'},
			                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			            ]
			        });
			    }
			});
        </script>
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

    <script type="text/javascript">
  function ShowHideDiv(chkPassport) {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
    </script>



