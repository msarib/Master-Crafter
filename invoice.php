<?php include('../Connection.php');?>
<?php

if(isset($_POST['btn_accept']))
{

$ORDER_ID = $_GET["order_id"];
$UPDT_ORDER_STATUS = 1;
$date = date('d-m-y h:i:s');
 

            $UPDATE = "UPDATE tbl_order_master SET ORDER_STATUS='".$UPDT_ORDER_STATUS."', UPDATED_AT='".$date."' WHERE ORDER_ID = '".$ORDER_ID."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Order Accepted Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }

if(isset($_POST['btn_reject']))
{

$ORDER_ID = $_GET["order_id"];
$UPDT_ORDER_STATUS = 3;
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE tbl_order_master SET ORDER_STATUS='".$UPDT_ORDER_STATUS."', UPDATED_AT='".$date."' WHERE ORDER_ID = '".$ORDER_ID."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Order Rejected Successfully!");</script>';

        } 
        else
        {
            echo 'Not Updated';
        }
    }


                                       $ORDER_ID = $_GET["order_id"];
                                       $QUERY = "SELECT A.*,B.PARTY_NAME,B.PARTY_EMAIL,B.PARTY_NUM1,B.PARTY_ADDRESS FROM tbl_order_master A LEFT OUTER JOIN tbl_party_list B ON A.CUS_ID = B.PARTY_CODE WHERE ORDER_ID = '".$ORDER_ID."' ";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result))
                                       {

                                            $ORDER_NUM =  "INV-0000".$row["ORDER_ID"];
                                            $PARTY_NAME = $row["PARTY_NAME"];
                                            $PARTY_ADDRESS = $row["PARTY_ADDRESS"];
                                            $PARTY_NUM1 = $row["PARTY_NUM1"];
                                            $SUB_TOTAL = $row["SUB_TOTAL"];
                                            $CHARGES = $row["CHARGES"];
                                            $GRAND_TOTAL = $row["GRAND_TOTAL"];
                                            $ORDER_STATUS = $row["ORDER_STATUS"];
                                            $CREATED_AT = $row["CREATED_AT"];
                                            $gst_amount = $row["gst_amount"];
                                            $final_amount = $row["final_amount"];
                                            $payment_mode = $row["payment_mode"];
                                       }




          ?>
<?php include('header.php'); ?>

 <div class="content-page">
                <!-- Start content -->
                <div class="content">
<div class="row">
    <div class="container">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Invoice</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Invoice </a>
                                        </li>
                                        <li class="active">
                                            Show Invoice
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                               
                                                <img src="../assets/images/logo-mc.png" alt="" height="100">
                                              
                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                   
                                                    <strong><?php echo $ORDER_NUM; ?></strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong><?php echo $PARTY_NAME; ?></strong><br>
                                                     
                                                     <?php echo $PARTY_ADDRESS; ?><br>
                                                      <abbr title="Phone">P:</abbr>  <?php echo $PARTY_NUM1; ?>
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> <?php echo $CREATED_AT; ?></p>
                                                    <p><strong>Order Status: </strong> 
                                                     <?php if($ORDER_STATUS == '0'){?>
                                                    <span class="label label-info">Pending</span></p>
                                                <?php }?>
                                                     <?php if($ORDER_STATUS  == '1') {?>
                                                     <span class="label label-success">Accept</span></p>
                                                 <?php }?>
                                                      <?php if($ORDER_STATUS  == '2') {?>
                                                      <span class="label label-success">Delivered</span></p>
                                                  <?php }?>
                                                      <?php if($ORDER_STATUS  == '3') {?>
                                                       <span class="label label-danger">Rejected</span></p>
                                                       <?php }?>                                                     
                                                    <p><strong>Order ID: </strong> # <?php echo $ORDER_ID; ?></p>
                                                    <p><strong>Payment Type : </strong> # <?php echo $payment_mode; ?></p>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->
                                      
                                        <div class="m-h-50"></div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr>
                                                            <th>#</th>
                                                            <th>Item</th>
                                                            <th>Unit</th>
                                                             <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                        <tbody>
                                                            <?php 
                                       $ORDER_ID = $_GET["order_id"];
                                       $QUERY = "SELECT A.*,b.UNIT_ID,C.NAME AS UNIT_NAME FROM tbl_order_detail A 
                                       LEFT OUTER JOIN tbl_item B ON A.ITEM_CODE = B.ITEM_CODE 
                                       LEFT OUTER JOIN tbl_unit C ON B.UNIT_ID = C.ID WHERE A.ORDER_MID = '".$ORDER_ID."' ";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result)) { ?>
                                                            
                                                            <tr>
                                                                <td><?php echo $row["ORDER_DID"]?></td>
                                                                <td><?php echo $row["TITLE"]?></td>
                                                                 <td><?php echo $row["UNIT_NAME"]?></td>
                                                                 <td><?php echo $row["QTY"]?></td>
                                                                 <td><?php echo number_format($row["UNIT_PRICE"], 2);?></td>
                                                                 <td><?php echo number_format($row["TOTAL_PRICE"], 2); ?></td>
                                                            </tr>
                                                           <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="clearfix m-t-40">
                                                    <h5 class="small text-inverse font-600">PAYMENT TERMS AND POLICIES</h5>

                                                    <small>
                                                        All accounts are to be paid within 7 days from receipt of
                                                        invoice. To be paid by cheque or credit card or direct payment
                                                        online. If account is not paid within 7 days the credits details
                                                        supplied as confirmation of work undertaken will be charged the
                                                        agreed quoted fee noted above.
                                                    </small>
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-3">
                                               <p class="text-right"><b>Sub-total:</b> <?php echo number_format($SUB_TOTAL, 2); ?></p>
                                                 
                                                <p class="text-right">Delivery Charges: <?php echo number_format($CHARGES, 2);?></p>
                                                <p class="text-right">Net Amount: <?php echo number_format($SUB_TOTAL + $CHARGES, 2);?></p>
                                                <p class="text-right">GST Amount (17%): <?php echo number_format($gst_amount, 2);?></p>
                                               
                                                <hr>
                                               <h3 class="text-right">PKR <?php echo number_format($final_amount, 2); ?></h3>
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <form method="post">
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                            <?php if($ORDER_STATUS =='0'){?>
                                            <button  type="submit" name="btn_accept" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> Accept </button>

                                             <button type="submit" name="btn_reject"class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('Are you sure want to Reject Order');"> <i class="fa fa-remove m-r-5"></i><span>Reject</span> </button>
                                           <?php }?>

                                            <?php if($ORDER_STATUS !='0'){?>
                                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light m-b-5"><i class="fa fa-print"></i></a>
                                               <?php } ?>
                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>

                            </div>

                        </div>

</div>
 <script>
            var resizefunc = [];
        </script>




 