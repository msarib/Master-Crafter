  <?php require "Connection.php";?>
   <?php include('header.php');
   include('add_wishlist.php');?>
   <?php 

   if ($_GET['item_find'] !="") {

     $QUERY = "SELECT A.*,B.CAT_NAME from tbl_item A LEFT OUTER JOIN TBL_CATEGORY B ON A.CATE_ID = B.CAT_ID where A.STATUS_ID = 1  AND A.ITEM_NAME LIKE '%".$_GET['item_find']."%' OR B.CAT_NAME LIKE '%".$_GET['item_find']."%'";
      
   }else{

      if(isset($_POST['usearch']))
      {
        $ucat=$_POST['ucat'];
        
        $QUERY="SELECT A.*,B.CAT_NAME from tbl_item A LEFT OUTER JOIN TBL_CATEGORY B ON A.CATE_ID = B.CAT_ID where A.STATUS_ID = 1 and A.CATE_ID='$ucat'";
      }
      else
      {
            $QUERY = "SELECT A.*,B.CAT_NAME from tbl_item A LEFT OUTER JOIN TBL_CATEGORY B ON A.CATE_ID = B.CAT_ID where A.STATUS_ID = 1 ";        
      }

   }
   

   ?>
   <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Shop</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
                        </div><!-- End .toolbox-left -->

                        

                      
                    </div><!-- End .toolbox -->

                    <div class="products">
                        <div class="row">

                                        <?php 
                                       
                                        $result = mysqli_query($conn,$QUERY);
                                        while($row = mysqli_fetch_array($result)){ ?>

                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product">
                                    <figure class="product-media">
                                        
                                        <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>">
                                            <img src="Admin/upload/<?php echo $row['ITEM_IMG']; ?>" alt="Product image" class="product-image" style="height: 320px;">  
                                        </a>
                                        <div class="product-action-vertical">
                                            <form method="post">
                                                             <input type="hidden" name="hidden_idd" value="<?php echo $row['ITEM_CODE']; ?>" />
                                                        <button type="submit" name="btn_wishlist" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></button>
                                                        </form>
                                        </div><!-- End .product-action -->

                                        <div class="product-action action-icon-top">

                                                <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>

                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?php echo $row["CAT_NAME"] ?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>"> <?php echo $row["ITEM_NAME"] .="(".  $row["ITEM_UNAME"]  .")"; ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <?php echo "Rs. ".$row["SALE_PRICE"] .".00 /="; ?>
                                        </div><!-- End .product-price -->
                                       <!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                             <?php } ?>




                        </div><!-- End .row -->

                        
                    </div><!-- End .products -->

                    <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
                    <aside class="sidebar-shop sidebar-filter">
                        <div class="sidebar-filter-wrapper">
                            <div class="widget widget-clean">
                                <label><a href='Shop.php'><i class="icon-close"></i></a>Filters</label>
                            </div><!-- End .widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <form method="post">
                                        <div class="filter-items filter-items-count">
                                            <?php

                                             $fg_cat="select * from tbl_category";
                                             $run_cat=mysqli_query($conn,$fg_cat);
                                             while($row_cat=mysqli_fetch_array($run_cat))
                                             {
                                                $CAT_ID=$row_cat['CAT_ID'];
                                                $CAT_NAME=$row_cat['CAT_NAME']; ?>

                       <div class="custom-control custom-radio">
  <input type="radio" id="ex<?php echo $CAT_ID ?>" name="ucat" class="custom-control-input" value="<?php echo $CAT_ID ?>">
  <label class="custom-control-label" for="ex<?php echo $CAT_ID ?>"><?php echo $CAT_NAME ?></label>
</div>
                                   

                                            
                                        <?php  } ?>

                                         <input type="submit" class="btn btn-info" value="Search" name="usearch">

                                         
                                        </div>
                                    </form><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                        

                           
                        </div><!-- End .sidebar-filter-wrapper -->
                    </aside><!-- End .sidebar-filter -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <?php include('footer.php');?>
        <script src="assets/js/wNumb.js"></script>