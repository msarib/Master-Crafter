<?php 
include('../Connection.php');

//error_reporting(0);


if(isset($_GET['cid']))
{

$cid = $_GET["cid"];

$UPDATE = "delete from tbl_contact where ID='$cid'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Message Successfully Deleted!");</script>';
            echo "<script>window.open('user_message.php','_self')</script>";
        } 
        else
        {
               echo '<script> alert("Message Not Deleted!");</script>';
            echo "<script>window.open('user_message.php','_self')</script>";
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
                                    <h4 class="page-title"> Contact Message  </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                     
                                        <li class="active">
                                            Contact Messages
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                <div class="row">
                              <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                                
                                            <th>User Name</th>
                                            <th>User Email</th>
                                             <th>Phone </th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                       $result = mysqli_query($conn,"SELECT * FROM `tbl_contact` order by ID desc");

                                           while($row = mysqli_fetch_array($result)){ ?>
                                            <tr>

                                             <td><?php echo $row["NAME"] ?></td>
                                           
                                            <td><?php echo $row["EMAIL"] ?></td>
                                           
                                            <td><?php echo $row["PHONE_NUMBER"] ?></td>
                                             <td><?php echo $row["SUBJECT"] ?></td>

                                             <td><?php echo $row["MESSAGE"] ?></td>
                                        
                                                  <td>
                                              
                                              <a href="?cid=<?php echo $row["ID"] ;?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 "> Delete</a>

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
    



