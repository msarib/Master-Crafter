
<?php 
include('Connection.php');
include('add_wishlist.php');
 ?>
<?php include('header.php') ?>
        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="intro-slider-container mt-2">
                            <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
                                data-owl-options='{
                                    "dots": true,
                                    "nav": true, 
                                    "responsive": {
                                        "1200": {
                                            "nav": true,
                                            "dots": true
                                        }
                                    }
                                }'>
                                <div class="intro-slide banner-lg" style="background-image: url(assets/images/cement1.webp);">
                                    <div class="intro">
                                        <div class="title">
                                            <a>deal of the day</a>
                                        </div>
                                        <div class="content">
                                            <h3><span>up to</span> 20% <span>off</span></h3><h4>heavy duty deals</h4>
                                        </div>
                                        <div class="action">
                                            <a href="Shop.php">discover now</a>
                                        </div>
                                    </div>
                                </div><!-- End .intro-slide -->

                                <div class="intro-slide banner-lg" style="background-image: url(assets/images/cement2.jpg);">
                                    <div class="intro">
                                        <div class="title">
                                            <a>clearance</a>
                                        </div>
                                        <div class="content">
                                            <h3>power tools<br>up to <span>30% off</span></h3>
                                        </div>
                                        <div class="action">
                                            <a href="Shop.php">discover now</a>
                                        </div>
                                    </div>
                                </div><!-- End .intro-slide -->


                                
                            </div><!-- End .intro-slider owl-carousel owl-simple -->

                            <span class="slider-loader"></span><!-- End .slider-loader -->
                        </div><!-- End .intro-slider-container -->
                    </div>
                    <div class="col-lg-4 banner">
                        <div class="col-12" style="background-image: url(assets/images/demos/demo-22/slider/banner-1.jpg)">
                            <div class="intro">
                                <div class="title">
                                    <h3>New arrivals</h3>
                                </div>
                                <div class="content">
                                    <h3>up to </h3> <h3 class="highlight">&nbsp;40% off</h3>
                                </div>
                                <div class="action">
                                    <a href="Shop.php">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="background-image: url(assets/images/demos/demo-22/slider/banner-2.jpg)">
                            <div class="intro">
                                <div class="title">
                                    <h2>outdoor</h2>
                                </div>
                                <div class="content">
                                    <h4>power equipment</h4>
                                </div>
                                <div class="action">
                                    <a href="Shop.php">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="background-image: url(assets/images/demos/demo-22/slider/banner-3.jpg)">
                            <div class="intro">
                                <div  class="title">
                                    <h3 class="highlight">save 20%</h3><h3>&nbsp;or more</h3>
                                </div>
                                <div class="content">
                                    <h3>deals & savings</h3>
                                </div>
                                <div class="action">
                                    <a href="Shop.php">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
          <!--container text-center shop

 <div class="container text-center shop">
                <h2 class="title mt-4 mb-5"> Shop by Brands </h2>
                <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
                    data-owl-options='{
                        "nav": true, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
                    <a href="#" class="brand">
                        <img src="assets/images/brands/1.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/2.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/3.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/4.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/5.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/6.png" alt="Brand Name">
                    </a>

                    <a href="#" class="brand">
                        <img src="assets/images/brands/7.png" alt="Brand Name">
                    </a>
                </div> End .owl-carousel 
            </div> End .container -->
          --> 

            <div class="featured-back" style="background-image: url(assets/images/demos/demo-22/featured/background.jpg);">
                <div class="container">
                    <div class="section-title">
                        <ul class="nav nav-pills nav-border-anim" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-featured-link" data-toggle="tab" href="#tab-featured" role="tab" aria-controls="tab-featured" aria-selected="true"><span>Featured</span></a>
                            </li>
                           
                        </ul>

                    
                       
                    </div>

                    <div class="row">


                        <div class="col-lg-12 col-md-12">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-featured" role="tabpanel" aria-labelledby="tab-featured-link">
                                    <div class="row products all">
<?php 
$QUERY = "SELECT A.*,B.CAT_NAME from tbl_item A LEFT OUTER JOIN TBL_CATEGORY B ON A.CATE_ID = B.CAT_ID where A.STATUS_ID = 1 ";
                                       $result = mysqli_query($conn,$QUERY);

                                           while($row = mysqli_fetch_array($result)){ ?>
                                        <div class="col-lg-3 col-6">
                                            <div class="product product-3 text-center">
                                                <figure class="product-media">
                                                   
                                                    <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>">
                                                        <img src="Admin/upload/<?php echo $row['ITEM_IMG']; ?>" alt="Product image" class="product-image" style="height: 320px;">
                                                    </a>

                                                    <div class="product-action-vertical">
                                                        <!-- <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a> -->
                                                        <form method="post">
                                                             <input type="hidden" name="hidden_idd" value="<?php echo $row['ITEM_CODE']; ?>" />
                                                        <button type="submit" name="btn_wishlist" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></button>
                                                        </form>
                                                    </div><!-- End .product-action-vertical -->
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <div class="product-cat">
                                                        <a href="#"><?php echo $row["CAT_NAME"] ?></a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>">
                                                    <?php echo $row["ITEM_NAME"] .="(".  $row["ITEM_UNAME"]  .")"; ?></a></h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                 <span class="new-price">Rs. <?php echo number_format($row["SALE_PRICE"], 2); ?>/= </span>
                                                        
                                                    </div><!-- End .product-price -->
                                                </div><!-- End .product-body -->

                                                <div class="product-footer">
                                                   
                                                    <div class="product-action">
                                                        <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                         <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>" class="btn-product btn-cart" title="Add to cart"><span>quick view</span></a>
                                                       
                                                    </div><!-- End .product-action -->
                                                </div><!-- End .product-footer -->
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                       <?php } ?>

                                    </div><!-- End .row -->
                                </div><!-- .End .tab-pane -->
                                
                            </div>

                        </div>
                        
                    </div>

                    <div class="mb-2"></div><!-- End .mb-6 -->
                </div><!-- End .container -->
            </div>

 

            <div class="container banner-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 banner-lg">
                        <a href="Shop.php">
                            <img src="assets/images/cement.jpg" >
                        </a>
                        <div class="banner-content">
                            <div class="title">
                                <a href="Shop.php">save up to 30%</a>
                            </div>
                            <div class="content">
                                <a href="Shop.php">
                                    <h3 class="highlight">Premium Cement</h3>
                                   
                                </a>
                            </div>
                            <div class="action">
                                <a href="Shop.php">discover now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 banner-lg">
                        <a href="category.html">
                            <img src="assets/images/steel.webp">
                        </a>
                        <div class="banner-content">
                            <div class="title">
                                <a href="Shop.php">Save Upto 40% </a>
                            </div>
                            <div class="content">
                                <a href="Shop.php">
                                    <h3>Branded Steels</h3>
                                </a>
                            </div>
                            <div class="action">
                                <a href="Shop.php">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         
            <div class="container popular">
                <hr class="mb-5">

                <div class="section-title">
                    <div><p class="title"><span>Best Seller</span></p></div>
                    
                    <a class="link" href="Shop.php">See All Products</a>
                </div>

                <div class="row products">

                    <?php 


$QUERY = "SELECT A.*,B.CAT_NAME,BR.NAME AS BRAND_NAME FROM tbl_item A LEFT OUTER JOIN TBL_CATEGORY B ON A.CATE_ID = B.CAT_ID LEFT OUTER JOIN TBL_BRAND BR ON A.BRAND_ID = BR.ID LEFT OUTER JOIN tbl_review R on R.product_id=A.ITEM_CODE where R.urating=5";
                                       $result = mysqli_query($conn,$QUERY);

                                           while($row = mysqli_fetch_array($result)){ ?>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-3 text-center">
                            <figure class="product-media">
                                
                                <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>">
                                   <img src="Admin/upload/<?php echo $row['ITEM_IMG']; ?>" alt="Product image" class="product-image" style="height: 300px;">
                                </a>

                                <div class="product-action-vertical">
                                    <form method="post">
                                                             <input type="hidden" name="hidden_idd" value="<?php echo $row['ITEM_CODE']; ?>" />
                                                        <button type="submit" name="btn_wishlist" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></button>
                                                        </form>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#"><?php echo $row["CAT_NAME"] .="(".  $row["BRAND_NAME"]  .")"; ?></a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>"> <?php echo $row["ITEM_NAME"] .="(".  $row["ITEM_UNAME"]  .")"; ?></a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Rs. <?php echo number_format($row["SALE_PRICE"], 2); ?>/=</span>
                                    <span class="old-price">Was Rs. <?php echo number_format($row["SALE_PRICE"], 2); ?>/=</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->

                            <div class="product-footer">
                              

                                <div class="product-action">
                                   <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>" class="btn-product btn-cart" title="Add to cart"></a>
                                   
                                    
                                </div><!-- End .product-action -->
                            </div><!-- End .product-footer -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                <?php }?>

                   
                </div><!-- End .row -->
            </div>



            <div class="container popular">
                <hr class="mb-5">

                <div class="section-title">
                    <div><p class="title"><span>Popular Products</span></p></div>
                    
                    <a class="link" href="Shop.php">See All Products</a>
                </div>

                <div class="row products">

                    <?php 


$QUERY = "SELECT A.*,B.CAT_NAME,BR.NAME AS BRAND_NAME FROM tbl_item A LEFT OUTER JOIN TBL_CATEGORY B ON A.CATE_ID = B.CAT_ID LEFT OUTER JOIN TBL_BRAND BR ON A.BRAND_ID = BR.ID WHERE A.ITEM_CODE BETWEEN 1 AND 10 ";
                                       $result = mysqli_query($conn,$QUERY);

                                           while($row = mysqli_fetch_array($result)){ ?>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-3 text-center">
                            <figure class="product-media">
                                
                                <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>">
                                   <img src="Admin/upload/<?php echo $row['ITEM_IMG']; ?>" alt="Product image" class="product-image" style="height: 300px;">
                                </a>

                                <div class="product-action-vertical">
                                    <form method="post">
                                                             <input type="hidden" name="hidden_idd" value="<?php echo $row['ITEM_CODE']; ?>" />
                                                        <button type="submit" name="btn_wishlist" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></button>
                                                        </form>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#"><?php echo $row["CAT_NAME"] .="(".  $row["BRAND_NAME"]  .")"; ?></a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>"> <?php echo $row["ITEM_NAME"] .="(".  $row["ITEM_UNAME"]  .")"; ?></a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Rs. <?php echo number_format($row["SALE_PRICE"], 2); ?>/=</span>
                                    <span class="old-price">Was Rs. <?php echo number_format($row["SALE_PRICE"], 2); ?>/=</span>
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->

                            <div class="product-footer">
                              

                                <div class="product-action">
                                   <a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>" class="btn-product btn-cart" title="Add to cart"></a>
                                   
                                    
                                </div><!-- End .product-action -->
                            </div><!-- End .product-footer -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                <?php }?>

                   
                </div><!-- End .row -->
            </div>


         

        </main>


       <?php include('footer.php') ?>
</body>

</html>
