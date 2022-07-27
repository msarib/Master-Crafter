<?php 
include('../Connection.php');
include('header.php');
if(isset($_GET['reject']))
{
    $reject=$_GET['reject'];
    $del_ord="delete from tbl_order_master where ORDER_ID='$reject'";
    $run_ord=mysqli_query($con,$del_ord);

    if($run_ord)
    {
        echo "<script>window.open('Party_Order_Detail.php','_self')</script>";
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
    
<div class="content-page">
                <!-- Start content -->
                <div class="content">
 <div class="row">
    	<div class="container">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Order Detail</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Order Detail
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
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Order Num#</th>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Unit</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>              
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Give Order</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        session_start();
                                       $QUERY = "SELECT A.*,b.UNIT_ID,C.NAME AS UNIT_NAME ,OM.CREATED_AT,OM.ORDER_STATUS FROM tbl_order_detail A 
                                       LEFT OUTER JOIN tbl_order_master OM ON A.ORDER_MID = OM.ORDER_ID 
                                       LEFT OUTER JOIN tbl_item B ON A.ITEM_CODE = B.ITEM_CODE 
                                       LEFT OUTER JOIN tbl_unit C ON B.UNIT_ID = C.ID WHERE A.PARTY_CODE = '".$_SESSION["id"]."' AND OM.ORDER_STATUS in (1,2) ";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result)) { 

                                         $checks="select * from tbl_transpoter_order where ORDER_MID='".$row["ORDER_MID"]."'";
                                         $run_checs=mysqli_query($con,$checks);
                                         $row_checks=mysqli_fetch_array($run_checs);
                                         $VEH_CODE=$row_checks['VEH_CODE'];
                                        ?>
                                         
                                        <tr>
                                            <td><?php echo $row["ORDER_MID"]?></td>
                                            <td><?php echo $row["CREATED_AT"]?></td>
                                            <td> INV-0000<?php echo $row["ORDER_MID"]?></td>
                                            <td><?php echo $row["ORDER_DID"]?></td>
                                            <td><?php echo $row["TITLE"]?></td>
                                            <td><?php echo $row["UNIT_NAME"]?></td>
                                            <td><?php echo $row["QTY"]?></td>
                                            <td><?php echo number_format($row["UNIT_PRICE"], 2);?></td>
                                            <td><?php echo number_format($row["TOTAL_PRICE"], 2); ?></td>
                                            <td> 
                                                <?php if($row["ORDER_STATUS"] == '0') {?>
                                                    <span class="label label-info">Pending</span></p>
                                                    <?php }?>
                                                     <?php if($row["ORDER_STATUS"] == '1'){ ?>
                                                     <span class="label label-success">Accept</span></p>
                                                    <?php }?>
                                                      <?php if($row["ORDER_STATUS"] == '2') {?>
                                                      <span class="label label-success">Delivered</span></p>
                                                      <?php }?>
                                                      <?php if($row["ORDER_STATUS"] == '3') { ?>
                                                       <span class="label label-danger">Rejected</span></p>
                                                       <?php }?>
                                                </td>
                                            
                                            <td>
                                                 <a href="party_invoice.php?order_id=<?php echo $row["ORDER_MID"]; ?>" class="btn btn-icon waves-effect waves-light btn-info m-b-5"> <i class="fa fa-info-circle"></i> Detail </a>
                                            </td>
                                            <td>
                                                <?php if($row["ORDER_STATUS"] == '2' || $VEH_CODE !=null) {?>
     <a class="btn btn-icon waves-effect waves-light btn-success m-b-5"> <i class="fa fa-info-circle"></i> Already Given </a>
                                                <?php } else { ?>
                                                 <a href="give_order_transpoter2.php?order_id=<?php echo $row["ORDER_MID"]; ?>" class="btn btn-icon waves-effect waves-light btn-info m-b-5"> <i class="fa fa-info-circle"></i> Give Order </a>
                                                  <a href="?reject=<?php echo $row["ORDER_MID"]; ?>" class="btn btn-icon waves-effect waves-light btn-info m-b-5"> <i class="fa fa-info-circle"></i> Delete Order </a>
                                             <?php } ?>
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


