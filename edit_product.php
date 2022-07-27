<?php 

include('../Connection.php');


$ITEM_CODE = $_GET["ITEM_CODE"];

 $QUERY = "SELECT A.*,PT.PARTY_NAME,B.STATUS_NAME,BR.NAME AS BRAND_NAME,CAT.CAT_NAME AS CATE_NAME,
                                             CL.NAME AS CLASS_NAME FROM tbl_item A 
                                             LEFT OUTER JOIN TBL_PARTY_LIST PT ON A.PARTY_CODE = PT.PARTY_CODE
                                             LEFT OUTER JOIN TBL_STATUS B ON A.STATUS_ID = B.STATUS_ID
                                             LEFT OUTER JOIN TBL_BRAND BR ON A.BRAND_ID = BR.ID
                                             LEFT OUTER JOIN TBL_CLASS CL ON A.CLASS_ID = CL.ID
                                             LEFT OUTER JOIN TBL_CATEGORY CAT ON A.CATE_ID = CAT.CAT_ID
                                             WHERE A.ITEM_CODE = '".$ITEM_CODE."' ";


                                              $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result))
                                       {
                                           $prod_sku_code = $row['ITEM_BCODE'];
                                            $prod_name = $row['ITEM_NAME'];
                                            $prod_uname = $row['ITEM_UNAME'];
                                            $cmb_brand = $row['BRAND_ID'];
                                            $cmb_class = $row['CLASS_ID'];
                                            $cmb_unit = $row['UNIT_ID'];
                                            $cmb_category = $row['CATE_ID'];
                                            $sale_rate = $row['SALE_PRICE'];
                                            $max_qty = $row['MAX_QTY'];
                                            $prod_disc = $row['DISC_RATE'];
                                            $prod_descp = $row['ITEM_DESCP'];
                                            $cmb_status = $row['STATUS_ID'];
                                            $_upload = $row['ITEM_IMG'];
                                            
                                       }


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

if ($_upload != null) {
       
$_img=$_FILES['upload_img']['tmp_name'];
move_uploaded_file($_img,"upload/$_upload");
} else {

    
    $_upload = $_POST['prev_img'];
}

$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

$insert = "UPDATE  tbl_item SET ITEM_BCODE = '".$prod_sku_code."', ITEM_NAME = '".$prod_name."', ITEM_UNAME='".$prod_uname."', BRAND_ID='".$cmb_brand."',CLASS_ID ='".$cmb_class."',CATE_ID='".$cmb_category."', UNIT_ID='".$cmb_unit."',MAX_QTY='".$max_qty."', SALE_PRICE='".$sale_rate."', DISC_RATE='".$prod_disc."', DOP_ID='2', ITEM_DESCP = '".$prod_descp."', ITEM_IMG='".$_upload."', STATUS_ID='".$cmb_status."', UPDATED_AT='".$date."', EDIT_IP_ADDRESS='".$ip_address."', EDIT_CMP_NAME ='".$machinename."'WHERE ITEM_CODE = '".$ITEM_CODE."' ";

    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
          echo '<script> alert("Your Item Update Successfully!");</script>';
          echo "<script>window.location='party_product.php'</script>"; 
        }
       
        else
        {
            echo '<script> alert("NOT UPDATED!");</script>';
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
                                                 <input type="text" name="prod_sku_code" value="<?php echo $prod_sku_code; ?>" class="form-control" placeholder="Product Barcode">       
	                                                </div>
                                                </div>
                                                    <div class="form-group">
	                                                <div class="col-lg-6">
	                                                    <input type="text" name="prod_name" value="<?php echo $prod_name; ?>" class="form-control" placeholder="Product Name">
	                                                </div>
                                                  <div class="col-lg-6">
                                                      <input type="text" name="prod_uname" id="prod_uname"  dir="rtl" class="form-control" value="<?php echo $prod_uname; ?>" placeholder="آئٹم کا نام" style="text-align: right;">
                                                  </div>
	                                            </div>
	                                           
	                                            <div class="form-group">
                                                    <div class="col-lg-3">
                                                        <select name="cmb_brand" class="form-control">
                                                            <option value="0">Select Brand</option>
                                                             
                                                <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_brand where STATUS_ID = '1'");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {?>
                                                    <option <?php if($row["ID"]==$cmb_brand){ ?> selected="selected" <?php }?> value=<?php echo $row["ID"]; ?>><?php echo $row["NAME"]; ?></option>';
                                                   
                                               <?php } ?>
                                                             
                                                            
                                                        </select>
                                                    </div>
	                                                <div class="col-lg-3">
	                                                      <select name="cmb_category" class="form-control select2">
                                                      <option value="0">Select Category</option>
                                    
                                      <?php
        
                                             
                                                    $result2 = mysqli_query($conn,"SELECT * FROM tbl_category where STATUS_ID = '1' AND ACT_TYPE = '2'");
                                                  
                                                  while($row = mysqli_fetch_array($result1)) 
                                                    {?>
                                                    <option <?php if($row["CAT_ID"]==$cmb_category){ ?> selected="selected" <?php }?> value=<?php echo $row["CAT_ID"]; ?>><?php echo $row["CAT_NAME"]; ?></option>';
                                                   
                                               <?php } ?>
                                                    </select>
	                                                </div>
                                                
	                                                <div class="col-lg-2">
	                                                    <select name="cmb_class" class="form-control">
                                                           
                                                            <option value="0">Select Class</option>
	                                                         <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_class where STATUS_ID = '1'");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {?>
                                                    <option <?php if($row["ID"]==$cmb_class){ ?> selected="selected" <?php }?> value=<?php echo $row["ID"]; ?>><?php echo $row["NAME"]; ?></option>';
                                                   
                                               <?php } ?>
	                                                    </select>
	                                                </div>
	                                                <div class="col-lg-2">
	                                                   <select name="cmb_unit" class="form-control">
                                                        <option value="0">Select Unit</option>
	                                                         <?php
        
                                              $result1 = mysqli_query($conn,"SELECT * FROM tbl_unit where STATUS_ID = '1'");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {?>
                                                    <option <?php if($row["ID"]==$cmb_unit){ ?> selected="selected" <?php }?> value=<?php echo $row["ID"]; ?>><?php echo $row["NAME"]; ?></option>';
                                                   
                                               <?php } ?>
	                                                    </select>
	                                                </div>
                                                     <div class="col-lg-2">
                                                        <select name="cmb_status" class="form-control">
                                                           

                                                            <option value="0">Select Status</option>
                                                             <?php
        
                                            $result1 = mysqli_query($conn,"SELECT * FROM tbl_status");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {?>
                                                    <option <?php if($row["STATUS_ID"]==$cmb_status){ ?> selected="selected" <?php }?> value=<?php echo $row["STATUS_ID"]; ?>><?php echo $row["STATUS_NAME"]; ?></option>';
                                                   
                                               <?php } ?>
                                                           
                                                            
                                                        </select>
                                                    </div>
	                                            </div>
	                                           
													<div class="form-group">
	                                                <div class="col-lg-2">
                                                     <input type="number" name="max_qty" value="<?php echo $max_qty; ?>" placeholder="MAX QTY"  style="text-align:right;" class="form-control">
                                                  </div>
	                                                <div class="col-lg-2">
	                                                   <input type="number" name="sale_rate"  placeholder="Sale Rate" style="text-align:right;" value="<?php echo $sale_rate; ?>"class="item sellprice form-control" placeholder="Sale Rate">
	                                                </div>
	                                               
	                                                 <div class="col-lg-2">
	                                                    <input type="number" placeholder="Discount%" name="prod_disc" style="text-align:right;" value="<?php echo $prod_disc; ?>" class="item prod_disc form-control" placeholder="Disc%">
	                                                </div>
                                                   <div class="col-lg-2">
                                                     <input type="number" name="actual_rate" placeholder="Actual Rate"  style="text-align:right;" class="item actual_rate form-control" readonly="true" value="<?php echo $sale_rate; ?>">
                                                  </div>
                                                   <div class="col-lg-4">
                                                     <input type="file" name="upload_img" value="<?php echo $_upload; ?>" class="filestyle" data-buttonname="btn-primary">

                                                      <input  name="prev_img" class="form-control" value="<?php echo $_upload; ?>">
                                                    </div>
	                                                
	                                            </div>

	                                            
                            <!-- end col-->
	                                            
                        <div class="row">
							<div class="col-sm-12">
								<div class="card-box">
										<textarea name="prod_descp" id="elm1" name="area"  ><?php echo $prod_descp; ?></textarea>
								</div>
							</div>
						</div>
    
                    </div>
                          <div class="wrapper" align="right" >
                                                   
                                        <button type="submit" name="btn_save" style="margin-top:10px"  class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Update</button> 
                                                
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



