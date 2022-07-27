<?php 
include('../Connection.php');



if(isset($_POST['btn_save']))
{

$prod_sku_code = $_POST['prod_sku_code'];
$prod_name = $_POST['prod_name'];
$prod_uname = $_POST['prod_uname'];
$cmb_brand = $_POST['cmb_brand'];
$cmb_class = $_POST['cmb_class'];
$cmb_unit = $_POST['cmb_unit'];
$cmb_category = $_POST['cmb_category'];
$sale_rate = $_POST['sale_rate'];
$max_qty = $_POST['max_qty'];
$prod_disc = $_POST['prod_disc'];
$prod_descp = $_POST['prod_descp'];
$cmb_status = $_POST['cmb_status'];

$_upload=$_FILES['upload_img']['name'];
$_img=$_FILES['upload_img']['tmp_name'];
move_uploaded_file($_img,"upload/$_upload"); 



session_start();
$PARTY_CODE = $_SESSION["id"];

$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

$insert = "INSERT INTO tbl_item (ITEM_BCODE, ITEM_NAME, ITEM_UNAME, BRAND_ID,CLASS_ID ,CATE_ID, UNIT_ID,MAX_QTY, SALE_PRICE, DISC_RATE, DOP_ID, ITEM_DESCP, ITEM_IMG, STATUS_ID, PARTY_CODE, CREATED_AT, ADD_IP_ADDRESS, ADD_CMP_NAME, UPDATED_AT, EDIT_IP_ADDRESS, EDIT_CMP_NAME) VALUES ('".$prod_sku_code."','".$prod_name."', '".$prod_uname."', '".$cmb_brand."', '".$cmb_class."', '".$cmb_category."', '".$cmb_unit."', '".$max_qty."', '".$sale_rate."', '".$prod_disc."', '2', '".$prod_descp."','".$_upload."' ,'".$cmb_status."','".$PARTY_CODE."','".$date."','".$machinename."','".$ip_address."','".$date."','".$machinename."','".$ip_address."')";

    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
           $lastid = mysqli_insert_id($conn); 
// Count total uploaded files
 $totalfiles = count($_FILES['images']['name']);

 // Looping over all files
 for($i=0;$i<$totalfiles;$i++)
 {

 $filename = $_FILES['images']['name'][$i];
 
// Upload files and store in database
if(move_uploaded_file($_FILES["images"]["tmp_name"][$i],'upload/gallery/'.$filename))
{
    // Image db insert sql
           

            $insert_img = "INSERT INTO tbl_item_gallery(ITEM_CODE, GL_IMG,CREATED_AT,UPDATED_AT) VALUES ('".$lastid."','".$filename."','".$date."','".$date."')";
            $query = mysqli_query($conn,$insert_img);
 }
  else{}
             
        }
        echo '<script> alert("Your Item Registered Successfully!");</script>';
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
                                    <h4 class="page-title">Product</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Product
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
                                                      <div class="col-lg-12">
                                                     <input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)"> Your Like Barcode
	                                                </div>
	                                    <div class="col-lg-12" id="dvPassport" style="display: none">
                                                 <input type="text" name="prod_sku_code" class="form-control" placeholder="Product Barcode">       
	                                                </div>
                                                </div>
                                                    <div class="form-group">
	                                                <div class="col-lg-6">
	                                                    <input type="text" name="prod_name" class="form-control" placeholder="Product Name">
	                                                </div>
                                                  <div class="col-lg-6">
                                                      <input type="text" name="prod_uname" id="prod_uname"  dir="rtl" class="form-control" placeholder="آئٹم کا نام" style="text-align: right;">
                                                  </div>
	                                            </div>
	                                           
	                                            <div class="form-group">
                                                    <div class="col-lg-3">
                                                        <select name="cmb_brand" class="form-control">
                                                            <option value="0">Select Brand</option>
                                                             
                                                <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_brand where STATUS_ID = '1'");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {
                                                        echo '<option value="' .$row['ID'] .'">' .$row['NAME'] .'</option>';
                                                    }
                                                ?>
                                                             
                                                            
                                                        </select>
                                                    </div>
	                                                <div class="col-lg-3">
	                                                      <select name="cmb_category" class="form-control select2">
                                                      <option value="0">Select Category</option>
                                    
                                      <?php
        
                                             
                                                    $result2 = mysqli_query($conn,"SELECT * FROM tbl_category where STATUS_ID = '1' AND ACT_TYPE = '2'");
                                                  
                                                    while($row1 = mysqli_fetch_array($result2)) 
                                                    {
                                                     echo '<option value="' .$row1['CAT_ID'] .'"> ' .$row1['CAT_NAME'] .'</option>';
                                                    }
                                                    
                                                ?>
                                       
                                                    </select>
	                                                </div>
                                                
	                                                <div class="col-lg-2">
	                                                    <select name="cmb_class" class="form-control">
                                                           
                                                            <option value="0">Select Class</option>
	                                                         <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_class where STATUS_ID = '1'");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {
                                                        echo '<option value="' .$row['ID'] .'">' .$row['NAME'] .'</option>';
                                                    }
                                                ?>
	                                                    </select>
	                                                </div>
	                                                <div class="col-lg-2">
	                                                   <select name="cmb_unit" class="form-control">
                                                        <option value="0">Select Unit</option>
	                                                         <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_unit where STATUS_ID = '1'");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {
                                                        echo '<option value="' .$row['ID'] .'">' .$row['NAME'] .'</option>';
                                                    }
                                                ?>
	                                                    </select>
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
	                                                <div class="col-lg-2">
                                                     <input type="number" name="max_qty" placeholder="MAX QTY"  style="text-align:right;" class="form-control">
                                                  </div>
	                                                <div class="col-lg-2">
	                                                   <input type="number" name="sale_rate" placeholder="Sale Rate" style="text-align:right;" class="item sellprice form-control" placeholder="Sale Rate">
	                                                </div>
	                                               
	                                                 <div class="col-lg-2">
	                                                    <input type="number" placeholder="Discount%" name="prod_disc" style="text-align:right;" class="item prod_disc form-control" placeholder="Disc%">
	                                                </div>
                                                   <div class="col-lg-2">
                                                     <input type="number" name="actual_rate" placeholder="Actual Rate"  style="text-align:right;" class="item actual_rate form-control" readonly="true">
                                                  </div>
                                                   <div class="col-lg-4">
                                                     <input type="file" name="upload_img" class="filestyle" data-buttonname="btn-primary">
                                                    </div>
	                                                
	                                            </div>
	                                            
                            <!-- end col-->
	                                            
                        <div class="row">
							<div class="col-sm-12">
								<div class="card-box">
										<textarea name="prod_descp" id="elm1" name="area"></textarea>
								</div>
							</div>
						</div>
            <div class="col-xs-12">
                                <div class="card-box">

                                  <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            

                                            <div class="p-20">
                                                <div class="form-group clearfix">
                                                    <div class="col-sm-12 padding-left-0 padding-right-0">
                                          <input type="file" name="images[]" id="filer_input1"
                                                               multiple="multiple">
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end row -->
                            </div>
                          </div>
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



