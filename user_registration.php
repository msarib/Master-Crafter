<?php 
include('../Connection.php');

//error_reporting(0);

if(isset($_POST['btn_save']))
{

$U_NAME = $_POST['txt_username'];
$U_EMAIL = $_POST['txt_email'];
$ROLE_ID = $_POST['cmb_role'];
$U_PASSWORD = $_POST['txt_paswd'];
$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

$insert = "INSERT INTO tbl_user (U_NAME,ROLE_ID,U_PASSWORD,U_EMAIL,CREATED_AT,ADD_IP_ADDRESS,ADD_CMP_NAME,UPDATED_AT,EDIT_IP_ADDRESS,EDIT_CMP_NAME) VALUES('".$U_NAME."','".$ROLE_ID."','".$U_PASSWORD."','".$U_EMAIL."','".$date."','".$ip_address."','".$machinename."','".$date."','".$ip_address."','".$machinename."')";

    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
          echo '<script> alert("User Registered Successfully!");</script>';    
        } 
        else
        {
            echo 'Not Inserted';
        }
    }
    if(isset($_POST['btn_inactive']))
{

$U_CODE = $_POST["txt_ucode"];
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE tbl_user SET STATUS_ID = 2 , UPDATED_AT='".$date."' WHERE U_CODE = '".$U_CODE."' ";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("User InActive Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }

if(isset($_POST['btn_active']))
{

$U_CODE = $_POST["txt_ucode"];
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE tbl_user SET STATUS_ID = 1 , UPDATED_AT='".$date."' WHERE U_CODE = '".$U_CODE."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("User Active Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }
?>

<?php include('header.php');?>
<!-- <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" /> -->
<link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<link href="plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />
<link href="assets/css/components.css" rel="stylesheet" type="text/css" />

 <!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>


 <div class="content-page">
                <!-- Start content -->
                <div class="content">
    <div class="row">
    	<div class="container">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"> User Registration  </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            User Registration
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <form class="form-horizontal" method="post">
							<div class="row">
                 
                
                            <div class="col-sm-12">
                                <div class="card-box">
                                   
                        			<div class="row">
                        				<div class="col-lg-12">
                        
                                                    <div class="form-group">
	                                                <div class="col-lg-3">
	                                               <input type="text" name="txt_username" class="form-control" placeholder="User Name">
	                                                </div>

                                                     <div class="col-lg-3">
                                                     <input type="email" name="txt_email" class="form-control" placeholder="Email">
                                                    </div>
                                               
                                                  <div class="col-lg-3">
                                                        <select name="cmb_role" class="form-control select2">
                                                      <option value="0">Select Role</option>
                                    
                                                  <?php
        
                                                    $result2 = mysqli_query($conn,"SELECT * FROM tbl_role");
                                                  
                                                    while($row1 = mysqli_fetch_array($result2)) 
                                                    {
                                                     echo '<option value="' .$row1['ROLE_ID'] .'"> ' .$row1['ROLE_NAME'] .'</option>';
                                                    }
                                                    
                                                ?>
                                       
                                                    </select>
                                                  </div>

                                                  <div class="col-lg-3">
                                                 <input type="password" name="txt_paswd" class="form-control" placeholder="Password">
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
                                <div class="row">
                              <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                                
                                            <th>User Code</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                             <th>Role </th>
                                            <th>User Password</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                       $result = mysqli_query($conn,"SELECT A.*,B.STATUS_NAME,C.ROLE_NAME FROM tbl_user A LEFT OUTER JOIN TBL_STATUS B ON A.STATUS_ID = B.STATUS_ID 
                                        LEFT OUTER JOIN TBL_ROLE C ON A.ROLE_ID = C.ROLE_ID");

                                           while($row = mysqli_fetch_array($result)){ ?>
                                            <tr>

                                             <td><?php echo $row["U_CODE"] ?></td>
                                           
                                            <td><?php echo $row["U_NAME"] ?></td>
                                           
                                            <td><?php echo $row["U_EMAIL"] ?></td>
                                             <td><?php echo $row["ROLE_NAME"] ?></td>

                                             <td><?php echo $row["U_PASSWORD"] ?></td>
                                              <td><?php echo $row["STATUS_NAME"] ?></td>
                                        
                                                  <td>
                                              
                                            <form action="" method="post">
                                                 <input type="hidden" name="txt_ucode" value="<?php echo $row["U_CODE"]; ?>">
                                                <?php if ($row["STATUS_ID"] == 1)  { ?>

                                                     <button  type="submit" onclick="return confirm('Are you sure want to Inactive user');" name="btn_inactive" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> In Active </button>

                                              <?php  } else { ?>
                                             <button  type="submit" onclick="return confirm('Are you sure want to active user');" name="btn_active" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> Active </button>
                                              
                                           <?php  } ?>
                                                </form>

                                                  </td>
                                        </tr> 
                                    <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>  
                        		</div>

                            </div>
                      


   <?php include('footer.php');?>


<script src="assets/js/urdu.js" type="text/javascript"></script>
   



    
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

  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="plugins/datatables/dataTables.colVis.js"></script>
        <script src="plugins/datatables/dataTables.fixedColumns.min.js"></script>
        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>


      <!--   <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
        <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script> -->

<script>
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>
    



