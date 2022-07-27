<?php 
session_start();

error_reporting(0); 
function getIpAddress()
{
    $ipAddress = '';
    if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
        // to get shared ISP IP address
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check for IPs passing through proxy servers
        // check if multiple IP addresses are set and take the first one
        $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ipAddressList as $ip) {
            if (! empty($ip)) {
                // if you prefer, you can check for valid IP address here
                $ipAddress = $ip;
                break;
            }
        }
    } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED'];
    } else if (! empty($_SERVER['REMOTE_ADDR'])) {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddress;
}                  
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <title>Master Crafter</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-22.css">
    <link rel="stylesheet" href="assets/css/demos/demo-22.css">

      <link href="Admin/plugins/toastr/toastr.min.CSS" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="Admin/plugins/switchery/switchery.min.css">

</head>
<body>

    <div class="page-wrapper">
        <header class="header header-22">
            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.php" class="logo">
                            <img src="assets/images/logo-mc copy.png" alt="Molla Logo" width="125" height="30">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-round">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="Shop.php" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="item_find" id="q" placeholder="Search product ..." required>

                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">

                          <?php if(isset($_SESSION["id"]) && $_SESSION["id"]!="") {?>
                       
                        <a href="wishlist.php" class="wishlist-link">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count">
                           <?php 
                            $sql="select count(*) as total from tbl_wishlist where USER_CODE = '".$_SESSION["id"]."'";
                            $result=mysqli_query($conn,$sql);
                            $data=mysqli_fetch_assoc($result);
                            echo $data['total'] ?? '0';
                           ?>
                        </span>
                        </a>
                                <?php } else { ?>

                                     <a href="#" class="wishlist-link" onclick="return window.confirm('Please Login & Go To Wishlist Page');">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count">0</span>
                        </a>
                        <?php } ?>


                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <?php 
                                    if(isset($_COOKIE["shopping_cart"]))
                                       {
                                        
                                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                        $cart_data = json_decode($cookie_data, true);
                                        $cartCount = count($cart_data); 
                                       }else { $cartCount = 0;}?>
                                <span class="cart-count"><?php echo $cartCount ?> </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                 <?php 
                                    if(isset($_COOKIE["shopping_cart"]))
                                       {
                                        $total = 0;
                                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                        $cart_data = json_decode($cookie_data, true);
                                        $cartCount = count($cart_data); 

                                        foreach($cart_data as $keys => $values)
                                        {
                                       ?>
                                <div class="dropdown-cart-products">
                                  
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="add_to_cart.php?ID=<?php echo $values["item_id"]; ?>"><?php echo $values["item_name"]; ?></a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty"><?php echo $values["item_quantity"]; ?></span>
                                                x <?php echo $values["item_price"]; ?> = <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="Admin/upload/<?php echo $values["item_img"]; ?>" alt="product">
                                            </a>
                                        </figure>
                                         <a href="javascript:;" class="btn-remove deleteCart" data-url="addtocart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="icon-close" title="Remove Product"></i></a>
                                        
                                        
                                    </div><!-- End .product -->

                                 <?php $total = $total + ($values["item_quantity"] * $values["item_price"]); ?>
                                </div><!-- End .cart-product -->
<?php }?>
                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                  
                                    <span class="cart-total-price">Rs. <?php echo number_format($total, 2); ?></span>
                                </div><!-- End .dropdown-cart-total -->

<?php
   }
   else
   {
    echo '
     <div class="dropdown-cart-total">
                                    <span>No Item in cart</span>
                                   
                                </div><!-- End .dropdown-cart-total -->
    ';
   }
   ?>
                                <div class="dropdown-cart-action">
                                    <a href="cart_detail.php" class="btn btn-primary">View Cart</a>
                                    <a href="checkout.php" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="wrap-container sticky-header">
                <div class="header-bottom">
                    <div class="container">
                        <div class="header-left">
                            <div class="category-dropdown" data-visible="true">
                             <center>   <a href="cost_calculator.php" data-display="static" title="Cost Calculator" style="font-weight: bold;font-size: 20px">
                                    Cost Calculator
                                </a></center>

                               
                            </div>
                        </div>
                        <div class="header-center">
                            <nav class="main-nav">
                                <ul class="menu sf-arrows">
                                    <li class="megamenu-container"><a href="index.php" class="">Home</a></li>
                                     <li><a href="Shop.php" class="">Shop</a></li>
                                     <li><a href="about.php">About</a></li>
                                     <li><a href="contact.php">Contact</a></li>
                                   
                                </ul><!-- End .menu -->
                            </nav><!-- End .main-nav -->
                        </div><!-- End .header-left -->

                        <div class="header-right">
                            <div class="header-text">
                                <ul class="top-menu top-link-menu">
                                    <li>
                                        <ul>
                                            <li>
                                                <?php if(isset($_SESSION["id"]) && $_SESSION["id"]!="") {?>
                                                <a href="Logout.php"><i class="icon-long-arrow-right"></i>Logout</a>



                                                <?php } else {?>

                                                
                                                <a href="Login.php" ><i class="icon-user"></i>Login / Registration</a>
                                                <?php }?>

                                     
                                            </li>
                                             <?php if(isset($_SESSION["id"]) && $_SESSION["id"]!="") {?>
                                            <li> 
                                            <a href="dashboard.php"><i class="icon-user"></i><?php echo $_SESSION["name"]; ?></a>
                                            </li>
                                        <?php }?>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- End .header-text -->
                        </div><!-- End .header-right -->
                    </div><!-- End .container -->
                </div><!-- End .header-bottom -->
            </div><!-- End .wrap-container -->
        </header><!-- End .header -->
    

