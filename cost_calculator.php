<?php 
include('../Connection.php');
include('header.php');
$fg_cost="select * from tbl_coast_calculator where cost_id=1";
$run_cost=mysqli_query($con,$fg_cost);
$row_cost=mysqli_fetch_array($run_cost);
$min_single=$row_cost['min_single'];
$max_single=$row_cost['max_single'];
$min_double=$row_cost['min_double'];
$max_double=$row_cost['max_double'];
$min_signle_basement=$row_cost['min_signle_basement'];
$max_single_basement=$row_cost['max_single_basement'];
$min_double_basement=$row_cost['min_double_basement'];
$max_double_basement=$row_cost['max_double_basement'];
$min_3rdfloor=$row_cost['min_3rdfloor'];
$max_3rdfloor=$row_cost['max_3rdfloor'];
$min_4_floor=$row_cost['min_4_floor'];
$max_4floor=$row_cost['max_4floor'];
$min_5_floor=$row_cost['min_5_floor'];
$max_5_floor=$row_cost['max_5_floor'];
$min_6_floor=$row_cost['min_6_floor'];
$max_6_floor=$row_cost['max_6_floor'];



?>


 <div class="content-page">
                <!-- Start content -->
                 <form method="post">
                <div class="content">
                    <div class="container">
                        <div class="row">
                                 <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Cost Calculator</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Cost Calculator </a>
                                        </li>
                                      
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label class="label-control">Enter per Sq Single Story</label><br>
                                <input type="number" class="form-control" placeholder="min" name="min1" style="display:inline-block;width:45%" value="<?php echo $min_single ?>">
                                <input type="number" class="form-control" placeholder="max" name="max1" style="display:inline-block;width:45%" value="<?php echo $max_single ?>">
                            </div>

                            <div class="col-sm-3">
                                <label class="label-control">Enter per Sq Double Story</label><br>
                                <input type="number" class="form-control" placeholder="min" name="min2" style="display:inline-block;width:45%" value="<?php echo $min_double ?>">
                                <input type="number" class="form-control" placeholder="max" name="max2" style="display:inline-block;width:45%" value="<?php echo $max_double ?>">
                            </div>
                            <div class="col-sm-3">
                                <label class="label-control">Enter per Sq Single+Basement Story</label><br>
                                <input type="number" class="form-control" placeholder="min" value="<?php echo $min_signle_basement ?>" name="min3" style="display:inline-block;width:45%">
                                <input type="number" class="form-control" placeholder="max" value="<?php echo $max_single_basement ?>" name="max3" style="display:inline-block;width:45%">
                            </div>
                            <div class="col-sm-3">
                                <label class="label-control">Enter per Sq Double+Basement Story</label><br>
                                <input type="number" class="form-control" placeholder="min" name="min4" style="display:inline-block;width:45%" value="<?php echo $min_double_basement ?>">
                                <input type="number" class="form-control" placeholder="max" name="max4" style="display:inline-block;width:45%" value="<?php echo $max_double_basement ?>">
                            </div>
<br>
                             <div class="col-sm-3" style="margin-top: 10px">
                                <label class="label-control">Enter per Sq 3rd Floor</label><br>
                                <input type="number" class="form-control" placeholder="min" name="min5" style="display:inline-block;width:45%" value="<?php echo $min_3rdfloor ?>">
                                <input type="number" class="form-control" placeholder="max" name="max5" style="display:inline-block;width:45%" value="<?php echo $max_3rdfloor ?>">
                            </div>
                             <div class="col-sm-3" style="margin-top: 10px">
                                <label class="label-control">Enter per Sq 4th Floor</label><br>
                                <input type="number" class="form-control" placeholder="min" name="min6" style="display:inline-block;width:45%" value="<?php echo $min_4_floor ?>">
                                <input type="number" class="form-control" placeholder="max" name="max6" style="display:inline-block;width:45%" value="<?php echo $max_4floor ?>">
                            </div>
                             <div class="col-sm-3" style="margin-top: 10px">
                                <label class="label-control">Enter per Sq 5th Floor</label><br>
                                <input type="number" class="form-control" placeholder="min" name="min7" style="display:inline-block;width:45%" value="<?php echo $min_5_floor ?>">
                                <input type="number" class="form-control" placeholder="max" name="max7" style="display:inline-block;width:45%" value="<?php echo $max_5_floor ?>">
                            </div>
                             <div class="col-sm-3" style="margin-top: 10px">
                                <label class="label-control">Enter per Sq 6th Floor</label><br>
                                <input type="number" class="form-control" placeholder="min" name="min8" style="display:inline-block;width:45%" value="<?php echo $min_6_floor ?>">
                                <input type="number" class="form-control" placeholder="max" name="max8" style="display:inline-block;width:45%" value="<?php echo $max_6_floor ?>">
                            </div>

                            <div class="col-sm-12" style="margin-top: 10px">
                                <center>
                                    <input type="submit" class="btn btn-info" name="usubmit" value="Update">

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
                $max1=$_POST['max1'];

                $min2=$_POST['min2'];
                $max2=$_POST['max2'];

                $min3=$_POST['min3'];
                $max3=$_POST['max3'];

                $min4=$_POST['min4'];
                $max4=$_POST['max4'];

                $min5=$_POST['min5'];
                $max5=$_POST['max5'];

                $min6=$_POST['min6'];
                $max6=$_POST['max6'];

                $min7=$_POST['min7'];
                $max7=$_POST['max7'];

                $min8=$_POST['min8'];
                $max8=$_POST['max8'];

                $updates="update tbl_coast_calculator set min_single='$min1',max_single='$max1',min_double='$min2',max_double='$max2',min_signle_basement='$min3',max_single_basement='$max3',min_double_basement='$min4',max_double_basement='$max4',min_3rdfloor='$min5',max_3rdfloor='$max5',min_4_floor='$min6',max_4floor='$max6',min_5_floor='$min7',max_5_floor='$max7',min_6_floor='$min8',max_6_floor='$max8' where cost_id=1";
                $run_updates=mysqli_query($con,$updates);

                if($run_updates)
                {
                    echo "<script>alert('Update Successfully')</script>";
                    echo "<script>window.open('cost_calculator.php','_self')</script>";

                }
                else
                {
                     echo "<script>alert('Update Not Successfully')</script>";
                    echo "<script>window.open('cost_calculator.php','_self')</script>";

                }
            }


            ?>