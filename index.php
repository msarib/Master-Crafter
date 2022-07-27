<?php include('header.php');
include('../Connection.php');
$id=$_SESSION['id'];
$party_nature=$_SESSION['party_nature'];
$role_id=$_SESSION['role_id'];

?>

 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master-Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                        <div class="row">
                            <?php if($party_nature !="" AND $party_nature == 3) {?>
                              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#EACC26;color:white">
            <center><h2  style="padding:18px;color:white" >Your Vehicle<br>
          <?php
          $fg_fg="select * from tbl_vehicle where PARTY_CODE='$id' ";
          $run_fg=mysqli_query($con,$fg_fg);
          $row_fg=mysqli_num_rows($run_fg);
        
           ?>
           <?php echo $row_fg ?>
            </h2></center>
        </div>  

      </div>
              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#2D9568;color:white">
            <center><h2  style="padding:18px;color:white" >Pick Order<br>
            <?php
            $fg_checks="SELECT A.*,too.PARTY_CODE AS TP_CODE , PT.PARTY_NAME AS TP_NAME,B.PARTY_NAME,B.PARTY_EMAIL,B.PARTY_NUM1,B.PARTY_ADDRESS,too.TO_STATUS,veh.VEH_NAME,veh.VEH_NO FROM tbl_order_master A 
                                             LEFT OUTER JOIN tbl_party_list B ON A.CUS_ID = B.PARTY_CODE 

                                             LEFT OUTER JOIN tbl_transpoter_order too ON A.ORDER_ID = too.ORDER_MID 
                                             LEFT OUTER JOIN tbl_party_list PT ON too.PARTY_CODE = PT.PARTY_CODE
                                             LEFT OUTER JOIN tbl_vehicle veh ON too.VEH_CODE = veh.VEH_CODE 
                                             WHERE (too.PARTY_CODE = '$id' || too.PARTY_CODE = 0 )";
               $run_checks=mysqli_query($con,$fg_checks);
               $row_checks=mysqli_num_rows($run_checks);      
               echo $row_checks;                        
             ?>
            </h2></center>
        </div>  

      </div>
              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#AB1414;color:white">
            <center><h2  style="padding:18px;color:white" >Un Assign Order<br>
          <?php
        $fg_kl="select * from tbl_order_master where ORDER_STATUS=1";
        $run_kl=mysqli_query($con,$fg_kl);
        $row_kl=mysqli_num_rows($run_kl);
        echo $row_kl;
           ?>
            </h2></center>
        </div>  

      </div>
              
<?php } ?>


               <?php if($party_nature !="" AND $party_nature == 1) {?>
                              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#EACC26;color:white">
            <center><h2  style="padding:18px;color:white" >Your Item<br>
          <?php
          $fg_fg="select * from tbl_item where PARTY_CODE='$id' ";
          $run_fg=mysqli_query($con,$fg_fg);
          $row_fg=mysqli_num_rows($run_fg);
        
           ?>
           <?php echo $row_fg ?>
            </h2></center>
        </div>  

      </div>
              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#2D9568;color:white">
            <center><h2  style="padding:18px;color:white" >Your Order<br>
            <?php
            $fg_checks="SELECT A.*,b.UNIT_ID,C.NAME AS UNIT_NAME ,OM.CREATED_AT,OM.ORDER_STATUS FROM tbl_order_detail A 
                                       LEFT OUTER JOIN tbl_order_master OM ON A.ORDER_MID = OM.ORDER_ID 
                                       LEFT OUTER JOIN tbl_item B ON A.ITEM_CODE = B.ITEM_CODE 
                                       LEFT OUTER JOIN tbl_unit C ON B.UNIT_ID = C.ID WHERE A.PARTY_CODE = '$id' AND OM.ORDER_STATUS in (1,2) ";
               $run_checks=mysqli_query($con,$fg_checks);
               $row_checks=mysqli_num_rows($run_checks);      
               echo $row_checks;                        
             ?>
            </h2></center>
        </div>  

      </div>
              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#AB1414;color:white">
            <center><h2  style="padding:18px;color:white" >Total Web Order<br>
          <?php
        $fg_kl="select * from tbl_order_master";
        $run_kl=mysqli_query($con,$fg_kl);
        $row_kl=mysqli_num_rows($run_kl);
        echo $row_kl;
           ?>
            </h2></center>
        </div>  

      </div>
              
<?php } ?>
      <?php if($party_nature =="" AND $role_id != "") {?>
                              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#EACC26;color:white">
            <center><h2  style="padding:18px;color:white" >Total Order<br>
          <?php
          $fg_fg="select * from tbl_order_master ";
          $run_fg=mysqli_query($con,$fg_fg);
          $row_fg=mysqli_num_rows($run_fg);
        
           ?>
           <?php echo $row_fg ?>
            </h2></center>
        </div>  

      </div>
              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#2D9568;color:white">
            <center><h2  style="padding:18px;color:white" >Total Users<br>
            <?php
            $fg_checks="select * from tbl_party_list where PNATURE_CODE=2";
               $run_checks=mysqli_query($con,$fg_checks);
               $row_checks=mysqli_num_rows($run_checks);      
               echo $row_checks;                        
             ?>
            </h2></center>
        </div>  

      </div>
              <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#AB1414;color:white">
            <center><h2  style="padding:18px;color:white" >Total Vendor<br>
          <?php
        $fg_kl="select * from tbl_party_list where PNATURE_CODE=2";
        $run_kl=mysqli_query($con,$fg_kl);
        $row_kl=mysqli_num_rows($run_kl);
        echo $row_kl;
           ?>
            </h2></center>
        </div>  
        </div>
         <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#EACC26;color:white">
            <center><h2  style="padding:18px;color:white" >Total Transportor<br>
          <?php
        $fg_kl="select * from tbl_party_list where PNATURE_CODE=3";
        $run_kl=mysqli_query($con,$fg_kl);
        $row_kl=mysqli_num_rows($run_kl);
        echo $row_kl;
           ?>
            </h2></center>
        </div>  
    </div>
    <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#2D9568;color:white">
            <center><h2  style="padding:18px;color:white" >Total Messages<br>
            <?php
            $fg_checks="select * from tbl_contact ";
               $run_checks=mysqli_query($con,$fg_checks);
               $row_checks=mysqli_num_rows($run_checks);      
               echo $row_checks;                        
             ?>
            </h2></center>
        </div>  

      </div>
        <div class="col-12 col-lg-4" >
        <div class="box box-body pull-up" style="background-color:#AB1414;color:white">
            <center><h2  style="padding:18px;color:white" >Total Vehicles<br>
          <?php
        $fg_kl="select * from tbl_vehicle";
        $run_kl=mysqli_query($con,$fg_kl);
        $row_kl=mysqli_num_rows($run_kl);
        echo $row_kl;
           ?>
            </h2></center>
        </div>  
        </div>

      
              
<?php } ?>
                        </div>
              


                    </div> 

                </div> <!-- content -->
               <!--  <?php include('footer.php');?> -->