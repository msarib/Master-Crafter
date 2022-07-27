<?php 
session_start();
error_reporting(0);
if($_SESSION['id']==null && $_SESSION["party_nature"] == null)
{
    header("Location: Login.php");
}
elseif($_SESSION['id']==null && $_SESSION['role_id']==null)
{
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Master Crafter - Responsive Admin Dashboard Template</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>
      <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                   <!--  <a class="logo"><span>Zir<span>cos</span></span><i class="mdi mdi-layers"></i></a> -->
                    <!-- Image logo -->
                    <a href="#" class="logo">
                        <span>
                            Master Crafter
                        </span>
                        <i>
                            <img src="assets/images/logo_sm.png" alt="" height="28">
                        </i>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                       
                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                           


                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>
                                            Hi, <?php 
                                            if(isset($_SESSION["id"]) && $_SESSION["id"]!="" ) 
                                            {    echo $_SESSION["email"];   } ?>

                                        </h5>
                                    </li>
                                    <li><a href="Profile.php"><i class="ti-user m-r-5"></i> Profile</a></li>
                                   
                                    <li><a href="../Logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                               
                            </li>

                            <?php if ($_SESSION["name"] != "" &&  $_SESSION["party_nature"] == 1) { ?>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Item Master Setup </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                   
                                    <li><a href="Product.php">Item Registration</a></li>
                                    <li><a href="party_product.php">Products Record</a></li>
                                   
                                </ul>
                            </li>


                              <li class="has_sub">
                                <a href="Party_Order_Detail.php" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Order Detail </span> </a>
                               
                            </li>
                           <!--  <li class="has_sub">
                                <a href="online_order.php" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Giver Order totransporter  </span> </a>
                               
                            </li>
                            -->
                        
                        
                        <?php } elseif ($_SESSION["name"] != "" &&  $_SESSION["party_nature"] == 3) {  ?>


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Transpoter Setup </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                      <li><a href="pick_order_transporter.php">Pick Order</a></li>
                                    <li><a href="Vehicle_Registration.php">Vehicle Registration</a></li>
                                     <li><a href="party_vehicle.php">Vehicle Record</a></li>
                                   
                                </ul>
                            </li>
                        
                        <?php } elseif($_SESSION["name"] == ""){  ?>
                            <li class="has_sub">

                              <a href="Profile.php" class="waves-effect"><i class="mdi mdi-face"></i> <span> Update Profile </span> </a>
                               
                            </li>
                                     

                            <?php } elseif($_SESSION['id']!=null && $_SESSION['role_id']!=null ) {?>

                                    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Item Master Setup </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="Brand_Registration.php">Brand Registration</a></li>
                                    <li><a href="Category_Registration.php">Category Registration</a></li>
                                    <li><a href="Class_Registration.php">Class Registration</a></li>
                                    <li><a href="Unit_Registration.php">Unit Registration</a></li>
                                    <li><a href="show_product.php">Items Record</a></li>
                                   
                                </ul>
                            </li>

                                 <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Vehicle Setup </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="vehicle_company.php">Vehicle Company Registration</a></li>
                                    <li><a href="vehicle_category.php">Vehicle Category Registration</a></li>
                                    <li><a href="show_vehicle.php">Vechicle Records</a></li> 
                                </ul>
                            </li>

                                <li class="has_sub">
                                <a href="online_order.php" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Online Order Detail </span></a>
                              
                            </li>

                              <li class="has_sub">
                                <a href="show_user.php" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> User Record 
                                <span class="badge badge-danger" style="padding-top:5px;padding-right:5px ">
                                    <?php
                                    $fg_cn2="select * from tbl_party_list where read_status='NotRead'";
                                    $run_cn2=mysqli_query($conn,$fg_cn2);
                                    $row_cn2=mysqli_num_rows($run_cn2);
                                    echo $row_cn2;

                                     ?>
                                </span> 
                            </span></a>
                              
                            </li>
                            <?php if ($_SESSION['id']!=null && $_SESSION['role_id']!=null && $_SESSION['role_id'] == 1 ) { ?>
                                  <li class="has_sub">
                                <a href="cost_calculator.php" class="waves-effect"><i class="mdi mdi-account"></i> <span> Cost Calculator </span></a>
                              
                            </li>
                            <li class="has_sub">
                                <a href="cost_calculator_setting.php" class="waves-effect"><i class="mdi mdi-account"></i> <span>  Calculator Setting</span></a>
                              
                            </li>
                             <li class="has_sub">
                                <a href="user_registration.php" class="waves-effect"><i class="mdi mdi-account"></i> <span> User Registration </span></a>
                              
                            </li>
                             <li class="has_sub">
                                <a href="user_message.php" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Messages <span class="badge badge-danger" style="padding-top:5px;padding-right:5px ">
                                    <?php
                                    $fg_cn="select * from tbl_contact";
                                    $run_cn=mysqli_query($conn,$fg_cn);
                                    $row_cn=mysqli_num_rows($run_cn);
                                    echo $row_cn;

                                     ?>
                                </span> </span> </a>
                               
                            </li>
   <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted m-t-0">For Help ?</h5>
                     <p class="m-b-0"><span class="text-custom">Email:</span> <br/> sarib.explore@gmail.com</p>
                        <p class="m-b-0"><span class="text-custom">Call:</span> <br/> (+92) 335 3509 521</p>
                    </div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
