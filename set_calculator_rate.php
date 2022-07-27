<?php 
include('../Connection.php');
include('header.php');
$itemid=$_GET['itemid'];
$fg_item="select * from tbl_item where ITEM_CODE='$itemid'";
$run_item=mysqli_query($con,$fg_item);
$row_item=mysqli_fetch_array($run_item);
$ITEM_NAME=$row_item['ITEM_NAME'];

$fg_cost="select * from tbl_calculator_itemrate where item_id='$itemid'";
$run_cost=mysqli_query($con,$fg_cost);
$row_cost=mysqli_fetch_array($run_cost);
$cn_cost=mysqli_num_rows($run_cost);
$single_story_qty=$row_cost['single_story_qty'];
$double_story_qty=$row_cost['double_story_qty'];
$single_basement_qty=$row_cost['single_basement_qty'];
$double_basement_qty=$row_cost['double_basement_qty'];
$third_floor_qty=$row_cost['third_floor_qty'];
$forth_floor_qty=$row_cost['forth_floor_qty'];
$fifth_floor_qty=$row_cost['fifth_floor_qty'];
$sixth_floor_qty=$row_cost['sixth_floor_qty'];

?>


 <div class="content-page">
                <!-- Start content -->
                 <form method="post">
                <div class="content">
                    <div class="container">
                        <div class="row">
                                 <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Item = <?php echo $ITEM_NAME ?></h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Master Crafter</a>
                                        </li>
                                      
                                      
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label class="label-control">Enter per Sq Single Story</label><br>
                                <input type="number" class="form-control" placeholder="Qty" name="min1" style="display:inline-block;" value="<?php echo $single_story_qty ?>" step="0.00000000000000001">
                                
                            </div>

                            <div class="col-sm-3">
                                <label class="label-control">Enter per Sq Double Story</label><br>
                                <input type="number" step="0.00000000000000001" class="form-control" placeholder="Qty" name="min2" style="display:inline-block;" value="<?php echo $double_story_qty ?>">
                            </div>
                            <div class="col-sm-3">
                                <label class="label-control">Enter per Sq Single+Basement Story</label><br>
                                <input type="number" step="0.00000000000000001" class="form-control" placeholder="Qty" value="<?php echo $single_basement_qty ?>" name="min3" style="display:inline-block;">
                              
                            </div>
                            <div class="col-sm-3">
                                <label class="label-control">Enter per Sq Double+Basement Story</label><br>
                                <input type="number" step="0.00000000000000001" class="form-control" placeholder="Qty" name="min4" style="display:inline-block;" value="<?php echo $double_basement_qty ?>">
                            </div>
<br>
                             <div class="col-sm-3" style="margin-top: 10px">
                                <label class="label-control">Enter per Sq 3rd Floor</label><br>
                                <input type="number" step="0.00000000000000001" class="form-control" placeholder="Qty" name="min5" style="display:inline-block;" value="<?php echo $third_floor_qty ?>">
                            
                            </div>
                             <div class="col-sm-3" style="margin-top: 10px">
                                <label class="label-control">Enter per Sq 4th Floor</label><br>
                                <input type="number" step="0.00000000000000001" class="form-control" placeholder="Qty" name="min6" style="display:inline-block;" value="<?php echo $forth_floor_qty ?>">
                            </div>
                             <div class="col-sm-3" style="margin-top: 10px">
                                <label class="label-control">Enter per Sq 5th Floor</label><br>
                                <input type="number" step="0.00000000000000001" class="form-control" placeholder="Qty" name="min7" style="display:inline-block;" value="<?php echo $fifth_floor_qty ?>">
                              </div>
                             <div class="col-sm-3" style="margin-top: 10px">
                                <label class="label-control">Enter per Sq 6th Floor</label><br>
                                <input type="number" step="0.00000000000000001" class="form-control" placeholder="Qty" name="min8" style="display:inline-block;" value="<?php echo $sixth_floor_qty ?>">
                                
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <center>
                                    <?php if($cn_cost==0)
                                    { ?>
 <input type="submit" class="btn btn-info" name="usubmit" value="Add">
                                     <?php } else {?>
                                    <input type="submit" class="btn btn-info" name="usubmit2" value="Update">
                                <?php } ?>

                                </center>


                          </div>



                   

                 




                        </div>

                    </div>

                </div>
                   </form>

            </div>

            <?php 
            if(isset($_POST['usubmit']))
            {
                $min1=$_POST['min1'];

                $min2=$_POST['min2'];

                $min3=$_POST['min3'];
                
                $min4=$_POST['min4'];
                
                $min5=$_POST['min5'];
                
                $min6=$_POST['min6'];
                
                $min7=$_POST['min7'];
                
                $min8=$_POST['min8'];
                
                $updates="INSERT INTO tbl_calculator_itemrate(item_id,single_story_qty,double_story_qty,single_basement_qty,double_basement_qty,third_floor_qty,forth_floor_qty,fifth_floor_qty,sixth_floor_qty)VALUES ('$itemid','$min1','$min2','$min3','$min4','$min5','$min6','$min7','$min8')";
                $run_updates=mysqli_query($con,$updates);

                if($run_updates)
                {
                    echo "<script>alert('Add Successfully')</script>";
                    echo "<script>window.open('cost_calculator_setting.php','_self')</script>";

                }
                else
                {
                     echo "<script>alert('Add Not Successfully')</script>";
                    echo "<script>window.open('cost_calculator_setting.php','_self')</script>";

                }
            }



 if(isset($_POST['usubmit2']))
            {
                $min1=$_POST['min1'];

                $min2=$_POST['min2'];

                $min3=$_POST['min3'];
                
                $min4=$_POST['min4'];
                
                $min5=$_POST['min5'];
                
                $min6=$_POST['min6'];
                
                $min7=$_POST['min7'];
                
                $min8=$_POST['min8'];
                
                $updates="update tbl_calculator_itemrate set single_story_qty='$min1',double_story_qty='$min2',single_basement_qty='$min3',double_basement_qty='$min4',third_floor_qty='$min5',forth_floor_qty='$min6',fifth_floor_qty='$min7',sixth_floor_qty='$min8' where item_id='$itemid'";
                $run_updates=mysqli_query($con,$updates);

                if($run_updates)
                {
                    echo "<script>alert('Update Successfully')</script>";
                    echo "<script>window.open('cost_calculator_setting.php','_self')</script>";

                }
                else
                {
                     echo "<script>alert('Update Not Successfully')</script>";
                    echo "<script>window.open('cost_calculator_setting.php','_self')</script>";

                }
            }


            ?>