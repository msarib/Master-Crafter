<?php include('../Connection.php'); ?>

<?php 


if(isset($_POST['btn_accept']))
{
session_start();
$PARTY_CODE = $_SESSION['id'];
$ORDER_MID = $_POST['txt_order_id']; 
$VEH_CODE = $_POST['cmb_vehicle'];
$TO_STATUS = 1;
$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

    $insert = "UPDATE  tbl_transpoter_order SET PARTY_CODE = '".$PARTY_CODE."',VEH_CODE='".$VEH_CODE."',TO_STATUS = '".$TO_STATUS."',UPDATED_AT = '".$date."' WHERE ORDER_MID = '".$ORDER_MID."' ";

    $query = mysqli_query($conn,$insert);

        $updates="update tbl_order_master set status='On Way' WHERE ORDER_ID = '".$ORDER_MID."'";
    $run_updates=mysqli_query($con,$updates);
    
        if($query!="")
        {
         
            echo '<script> alert("Transporter Accept Order Is Successfully");</script>';
            echo '<script> window.open("pick_order_transporter.php","_self");</script>';
             
        } 
        else
        {
            echo 'Not Updated';
        }
    }


  if(isset($_GET['com']))  
  {
    $oid=$_GET['com'];
    $UPDATE = "UPDATE tbl_order_master SET ORDER_STATUS = 2,status='Complete'  WHERE ORDER_ID = '".$oid."'";

      $insert = "UPDATE  tbl_transpoter_order SET TO_STATUS = '3' WHERE ORDER_MID = '".$oid."' ";

    $query = mysqli_query($conn,$insert);

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Delivered Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
  }



?>
<?php include('header.php'); ?>
 
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
                                    <h4 class="page-title">Pick Order</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Pick Order
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>


  

 <form action=""  method="POST">
                                       
                                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 id="userModel" class="modal-title">Vehicle Assign</h4>
                                                </div>

                                     <div class="modal-body">
                                        <div class="row">
                                         
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">Unit Status</label>
                                                               <select  name="cmb_vehicle" class="form-control">
                                                           

                                                            <option value="0">Select Vehicle</option>
                                                             <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_vehicle ");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {

                                                      echo '<option value="' .$row['VEH_CODE'] .'">' .$row['VEH_NAME'] .' - ' .$row['VEH_NO'] .' </option>';
                                                    }
                                                ?>
                                                        </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="btn_accept" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                   

                        		  <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Order Num#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                            <th>Address</th>
                                            <th>Message</th>
                                            <th>Payment Type</th>
                                            <th>Sub Total</th>
                                            <th>D.Charges</th>
                                            <th>Grand Total</th>
                                            <th>Status</th>
                                            <th>Vehicle #</th>
                                            <th>Transpoter Name</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                        session_start();
                                       $QUERY = "SELECT A.*,too.PARTY_CODE AS TP_CODE , PT.PARTY_NAME AS TP_NAME,B.PARTY_NAME,B.PARTY_EMAIL,B.PARTY_NUM1,B.PARTY_ADDRESS,too.TO_STATUS,veh.VEH_NAME,veh.VEH_NO FROM tbl_order_master A 
                                             LEFT OUTER JOIN tbl_party_list B ON A.CUS_ID = B.PARTY_CODE 

                                             LEFT OUTER JOIN tbl_transpoter_order too ON A.ORDER_ID = too.ORDER_MID 
                                             LEFT OUTER JOIN tbl_party_list PT ON too.PARTY_CODE = PT.PARTY_CODE
                                             LEFT OUTER JOIN tbl_vehicle veh ON too.VEH_CODE = veh.VEH_CODE 
                                             WHERE (too.PARTY_CODE = '".$_SESSION["id"]."' || too.PARTY_CODE = 0 )";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result)) { $fgs=$row["ORDER_ID"];?>
                                            
                                          
                                        <tr>
                                            <td>
                                                     <input type="hidden" name="txt_order_id" value="<?php echo $row["ORDER_ID"]; ?>">
                                                <?php echo $row["ORDER_ID"]?></td>
                                            <td><?php echo $row["CREATED_AT"]?></td>
                                            <td> INV-0000<?php echo $row["ORDER_ID"]?></td>
                                            <td><?php echo $row["PARTY_NAME"]?></td>
                                            <td><?php echo $row["PARTY_EMAIL"]?></td>
                                            <td><?php echo $row["PARTY_NUM1"]?></td>
                                            <td><?php echo $row["PARTY_ADDRESS"]?></td>
                                            <td><?php echo $row["TO_STATUS"]?></td>
                                            <td>
                                                <?php if($row["PAYMENT_TYPE"] == '1') {?>
                                                Cash On Delivery
                                               <?php } ?>
                                            </td>
                                            <td><?php echo $row["SUB_TOTAL"]?></td>
                                            
                                            <td><?php echo $row["CHARGES"]?></td>
                                            <td> <?php echo $row["GRAND_TOTAL"]?></td>
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

                                                <td><?php echo $row["VEH_NAME"]?> - <?php echo $row["VEH_NO"]?></td>
                                                <td><?php echo $row["TP_NAME"]?></td>

                                            
                                            <td>
                                                 <a href="invoice.php?order_id=<?php echo $row["ORDER_ID"]; ?>" class="btn btn-icon waves-effect waves-light btn-info m-b-5"> <i class="fa fa-info-circle"></i> Detail </a>

                                                 <?php if($row["TO_STATUS"] == '0') { ?>
                                                  

                                       
                                            <button  type="button" data-toggle="modal" data-target="#con-close-modal" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> Accept </button>
                                             
                                               
                                           </td>
                                           <?php }?>
                                                <?php if($row["TO_STATUS"] == '1') {
                                                 ?>
                                                  

                                       
                                            <a  href="?com=<?php echo $fgs ?>" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> Complete </a>
                                             
                                               
                                           </td>
                                           <?php }?>
                                        </tr> 
                                 
                                      <?php }?>
                                        

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        </form>
                        
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


