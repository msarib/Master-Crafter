 
<?php include('Connection.php') ?>
<?php include('addtocart.php')?>
<?php include('add_wishlist.php');?>

 <?php include('header.php') ?>
  
    
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
<?php 

$ITEM_CODE = $_GET["ID"];

                                      $QUERY = "SELECT A.*,B.CAT_NAME,BR.NAME AS BRAND_NAME from tbl_item A LEFT OUTER JOIN TBL_CATEGORY B ON A.CATE_ID = B.CAT_ID
                                      LEFT OUTER JOIN TBL_BRAND BR ON A.BRAND_ID = BR.ID WHERE A.ITEM_CODE = '".$ITEM_CODE."'";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result))
                                       {
                                            $ITEM_NAME = $row["ITEM_NAME"] .="(".  $row["ITEM_UNAME"]  .")";
                                            $ITEM_PRICE = "Rs. ".$row["SALE_PRICE"] .".00 /=";
                                            $ITEM_IMG = "Admin/upload/".$row["ITEM_IMG"] .""; 
                                            $ITEM_DESCP = $row["ITEM_DESCP"];
                                            $CATE_ID = $row["CATE_ID"];
                                            $CATEGORY = $row["CAT_NAME"];
                                            $BRAND_NAME = $row["BRAND_NAME"];
                                            $MAX_QTY = $row["MAX_QTY"];




                                       }

?>
 <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home </a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Default</li>
                    </ol>

                   <!-- <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav> End .pager-nav -->
                </div><!--End .container -->
            </nav><!--End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="<?php echo $ITEM_IMG; ?>" data-zoom-image="<?php echo $ITEM_IMG; ?>" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">

<?php
                                        $QUERY = "SELECT * from tbl_item_gallery WHERE ITEM_CODE = '".$ITEM_CODE."'";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result))
                                       {?> 
                                             <a class="product-gallery-item active" href="#" data-image="Admin/upload/gallery/<?php echo $row["GL_IMG"]; ?>" data-zoom-image="Admin/upload/gallery/<?php echo $row["GL_IMG"];?>">
                                                <img src="Admin/upload/gallery/<?php echo $row["GL_IMG"];?>" alt="product side">
                                            </a>
                                            

                                    <?php    }?>
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->




                                          
                            <div class="col-md-6">
                                <div class="product-details">
                                    <form method="post">
                                     <?php echo $message; ?>
                                    <input type="hidden" name="hidden_id" value="<?php echo $ITEM_CODE; ?>" />
                                    <h1 class="product-title"> <?php echo $ITEM_NAME; ?></h1><!-- End .product-title -->

                                   

                                    <div class="product-price">
                                        <?php echo $ITEM_PRICE; ?>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                      
                                    </div><!-- End .product-content -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" value="<?php echo $MAX_QTY; ?>" id="qty2" hidden>
                                            <input type="number" name="quantity" id="qty" class="form-control" value="<?php echo $MAX_QTY; ?>" min="<?php echo $MAX_QTY; ?>"   step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">

                                  <button type="submit" name="add_to_cart" id="add_to_cart" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</button>

                                        <div class="details-action-wrapper">


                                             <form method="post">
                                                             <input type="hidden" name="hidden_idd" value="<?php echo $ITEM_CODE; ?>" />



                                                        <button style="border: 0; background: transparent;" type="submit" name="btn_wishlist" style="margin-left: 100px;" class="btn-product btn-wishlist"><span>add to wishlist</span></button>
                                                        </form>

                                          
                                            
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="#"> <?php echo $CATEGORY; ?></a>
                                            
                                        </div><!-- End .product-cat -->

                                    </div><!-- End .product-details-footer -->

                                     <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Brand:</span>
                                            <a href="#"> <?php echo $BRAND_NAME; ?></a>
                                            
                                        </div><!-- End .product-cat -->

                                        

                                       
                                    </div><!-- End .product-details-footer -->
                                </form>
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                       


                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->


     <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                      <?php echo $ITEM_DESCP; ?>
                             
                                </div>
                            </div><!-- .End .tab-pane -->
                          
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews &nbsp;&nbsp;&nbsp;&nbsp;<a href="add_review.php?pid=<?php echo $ITEM_CODE ?>" class="btn" style="background-color: #EACC26;color:white">Add Review</a></h3>
                                    

                                      <?php
                                      $fg_review="select * from tbl_review where product_id='$ITEM_CODE'";
                                      $run_review=mysqli_query($con,$fg_review);
                                      while($row_review=mysqli_fetch_array($run_review))
                                      {
                                        $uname=$row_review['uname'];
                                        $urating=$row_review['urating'];
                                        $ureview=$row_review['ureview'];
                                        $r_date=$row_review['r_date'];
                                       
                                      


                                       ?>
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#"><?php echo $uname ?></a></h4>
                                               <!-- End .rating-container -->
                                                <span class="review-date"><?php echo $r_date ?></span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4><?php echo $ureview ?> ( <?php 

                                                    for($i=0;$i < $urating ;$i++)
                                                    {
                                                        echo "<img src='assets/images/star.png' style='display:inline-block'>";
                                                    }



                                                    ?> )</h4>

                                              
                                                
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    <?php } ?>
                                    </div><!-- End .review -->

                                    
                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
                     <div class="products">
                        <div class="row">
               

                        <?php

                                     $QUERY = "SELECT * FROM `tbl_item` WHERE CATE_ID='$CATE_ID'";
                                       $result = mysqli_query($con,$QUERY); 
                                       while($row = mysqli_fetch_array($result))

                                       {?>
                                    
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
                            </div>
 <?php  }?>
               </div>
           </div>
    
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->


       <?php include('footer.php') ?>  
       <script src="assets/js/jquery.magnific-popup.min.js"></script> 
      
</body>



</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
