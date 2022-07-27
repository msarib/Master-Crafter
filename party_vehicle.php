<?php  include('../Connection.php');?>

<?php include('header.php'); ?>

<?php

if(isset($_POST['btn_inactive']))
{

$VEH_CODE = $_POST["txt_veh_code"];
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE tbl_vehicle SET STATUS_ID = 2 , UPDATED_AT='".$date."' WHERE VEH_CODE = '".$VEH_CODE."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Vehicle InActive Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }

if(isset($_POST['btn_active']))
{

$VEH_CODE = $_POST["txt_veh_code"];
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE tbl_vehicle SET STATUS_ID = 1 , UPDATED_AT='".$date."' WHERE VEH_CODE = '".$VEH_CODE."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Vehicle InActive Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }
 ?>
 <!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
       <!--  <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" /> -->
<div class="content-page">
    <!-- Start content -->
 <div class="content">

 <div class="row">
    	<div class="container">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Show Vehicle</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Show Vehicle
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
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            
                                            <th>Vehicle Code</th>
                                            <th>Vehicle Name</th>
                                            <th>Vehicle Image</th>
                                            <th>Vehicle Company</th>
                                            <th>Vehicle Category</th>
                                            <th>Vehicle#</th>
                                            <th>Engine#</th>
                                            <th>Chasis#</th>
                                            <th>Per Km Rate</th>
                                            <th>Standard Rate</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            session_start();
                                            
                                            $QUERY = "SELECT A.*,PT.PARTY_NAME,B.STATUS_NAME,CAT.NAME AS VEH_CATE_NAME,
                                             CL.NAME AS VEH_COMP_NAME FROM tbl_vehicle A 
                                             LEFT OUTER JOIN TBL_PARTY_LIST PT ON A.PARTY_CODE = PT.PARTY_CODE
                                             LEFT OUTER JOIN TBL_STATUS B ON A.STATUS_ID = B.STATUS_ID
                                             LEFT OUTER JOIN tbl_veh_company CL ON A.VEH_COMP_CODE = CL.ID
                                             LEFT OUTER JOIN tbl_veh_category CAT ON A.VEH_CAT_CODE = CAT.ID WHERE A.PARTY_CODE = '".$_SESSION["id"]."'";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result)) { ?>
                                            
                                        <tr>
                                            
                                            <td><?php echo $row["VEH_CODE"]; ?></td>
                                            <td><?php echo $row["PARTY_NAME"]; ?></td>
                                            <td><img src="upload/Vehicle/<?php echo $row['VEH_IMG']; ?>" style="height:50px; width:50px"/></td>
                                            <td><?php echo $row["VEH_COMP_NAME"]; ?></td>
                                            <td><?php echo $row["VEH_CATE_NAME"]; ?></td>
                                            <td><?php echo $row["VEH_NO"]; ?></td>
                                            <td><?php echo $row["VEH_ENG_NO"]; ?></td>
                                            <td><?php echo $row["VEH_CHECHIS_NO"]; ?></td>
                                            <td><?php echo $row["PKMR"]; ?></td>
                                            <td><?php echo $row["STANDARD_RATE"]; ?></td>
                                            <td><?php echo $row["VEH_DESCP"]; ?></td>
                                            <td><?php echo $row["STATUS_NAME"]; ?></td>
                                            <td>

                                            <form action="" method="post">
                                                

                                                  <a href="Edit_Vehicle.php?VEH_CODE=<?php echo $row["VEH_CODE"]; ?>" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> Edit </a>
                                               
                                                     <button  type="submit" onclick="return confirm('Are you sure want to Inactive product');" name="btn_inactive" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> Delete </button>
                                                </form>
                                            </td>
                                        </tr> 
                                        <?php }?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
  
<?php include('footer.php'); ?>
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


