<?php  include('../Connection.php');?>

<?php include('header.php'); ?>

<?php

  $updates2="update tbl_party_list set read_status='Read'";
  $run_updates2=mysqli_query($con,$updates2);


if(isset($_POST['btn_inactive']))
{

$PARTY_CODE = $_POST["txt_party_code"];
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE TBL_PARTY_LIST SET STATUS_ID = 2 , UPDATED_AT='".$date."' WHERE PARTY_CODE = '".$PARTY_CODE."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Party InActive Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }

if(isset($_POST['btn_active']))
{

$PARTY_CODE = $_POST["txt_party_code"];
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE TBL_PARTY_LIST SET STATUS_ID = 1 , UPDATED_AT='".$date."' WHERE PARTY_CODE = '".$PARTY_CODE."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Party InActive Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }


 if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $del="delete from TBL_PARTY_LIST where PARTY_CODE='$did'";
    $run_del=mysqli_query($conn,$del);

    if($run_del)
    {
echo '<script> alert("User Deleted");</script>';
echo '<script>window.open("show_user.php","_self");</script>';
    }
    else
    {
        echo '<script> alert("User Not Deleted");</script>';
        echo '<script>window.open("show_user.php","_self");</script>';
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
                                    <h4 class="page-title">Show Users</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Show Users
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
                                            
                                            <th>Party Code</th>
                                            <th>Party Name</th>
                                            <th>Party Nature</th>
                                            <th>Party Email</th>
                                            <th>Party Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $QUERY = "SELECT A.PARTY_CODE,A.PARTY_NAME,A.PARTY_EMAIL,A.PARTY_NUM1,A.PARTY_NUM2,PASSWORD(A.PARTY_PASWD) AS PARTY_PASWD,A.PARTY_ADDRESS,ac.NATURE_NAME,A.STATUS_ID,B.STATUS_NAME FROM TBL_PARTY_LIST A 
                                             LEFT OUTER JOIN tbl_act_nature ac ON A.PNATURE_CODE = ac.NATURE_CODE
                                             LEFT OUTER JOIN TBL_STATUS B ON A.STATUS_ID = B.STATUS_ID";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result)) { ?>
                                            
                                        <tr>
                                            
                                            <td><?php echo $row["PARTY_CODE"]; ?></td>
                                            <td><?php echo $row["PARTY_NAME"]; ?></td>
                                            <td><?php echo $row["NATURE_NAME"]; ?></td>
                                            <td><?php echo $row["PARTY_EMAIL"]; ?></td>
                                            <td><?php echo $row["PARTY_ADDRESS"]; ?></td>
                                            <td><?php echo $row["STATUS_NAME"]; ?></td>
                                           
                                            <td>
                                            <form action="" method="post">
                                                 <input type="hidden" name="txt_party_code" value="<?php echo $row["PARTY_CODE"]; ?>">
                                                <?php if ($row["STATUS_ID"] == 1)  { ?>

                                                     <button  type="submit" onclick="return confirm('Are you sure want to Inactive user');" name="btn_inactive" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> In Active </button>

                                              <?php  } else { ?>
                                             <button  type="submit" onclick="return confirm('Are you sure want to active user');" name="btn_active" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> Active </button>
                                              
                                           <?php  } ?>
                                             <a href="?did=<?php echo $row["PARTY_CODE"] ?>" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> Delete </a>
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


