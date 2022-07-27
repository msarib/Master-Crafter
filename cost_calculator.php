<?php include('header.php');include("Connection.php"); ?>
  <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Cost Calculator</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cost Calculator</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->


             <div class="page-content">
                 <form method="post" class="contact-form mb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <center>
                            <img src="assets/images/budget.png"> 
                                <h2 class="title mb-1">Cost Calculator</h2><!-- End .title mb-2 -->
                            <p class="lead text-primary">
                                We Will Calculate the Minimum or Maximum Cost Of Your House.
                            </p><!-- End .lead text-primary --></center>
                        </div>




                       

                    </div>
                           
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                    <div class="col-sm-12">
                                        <label for="cname" class="sr-only">Enter Area Sq.Feet</label>
                                        <input type="number" name="area_sq" class="form-control" id="" placeholder="Enter Area Sq.feet" required>
                                        
                                    </div><!-- End .col-sm-4 -->

                                    <div class="col-sm-3" style="margin-top: 15px">

                                       <div class="form-check">
  <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault1" value="type1">
  <img src="assets/images/building.png" style="height:40px;width:40px;margin-left:27px">
  <label class="form-check-label" for="flexRadioDefault1" style="color:black;margin-left: 13px;font-size:13px;font-weight: bold;margin-top: -3px !important">
    Single Story
  </label>
</div>
                                    </div><!-- End .col-sm-4 -->

                                     <div class="col-sm-3" style="margin-top: 15px">
                                       <div class="form-check">
  <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault2" value="type2">
   <img src="assets/images/building.png" style="height:40px;width:40px;margin-left:27px">
  <label class="form-check-label" for="flexRadioDefault2" style="color:black;margin-left: 13px;font-size:13px;font-weight: bold;margin-top: -3px !important">
    Double Story
  </label>
</div>
                                    </div><!-- End .col-sm-4 -->
                                     <div class="col-sm-3" style="margin-top: 15px">
                                       <div class="form-check">
  <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault3" value="type3">
   <img src="assets/images/building.png" style="height:40px;width:40px;margin-left:27px">
  <label class="form-check-label" for="flexRadioDefault3" style="color:black;margin-left: 13px;font-size:13px;font-weight: bold;margin-top: -3px !important">
    Single Story + Basement
  </label>
</div>
                                    </div><!-- End .col-sm-4 -->
                                     <div class="col-sm-3" style="margin-top: 15px">
                                       <div class="form-check">
  <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault4" value="type4">
   <img src="assets/images/building.png" style="height:40px;width:40px;margin-left:27px">
  <label class="form-check-label" for="flexRadioDefault4" style="color:black;margin-left: 13px;font-size:13px;font-weight: bold;margin-top: -3px !important">
    Double Story + Basement
  </label>
</div>
                                    </div><!-- End .col-sm-4 -->

                                     <div class="col-sm-3" style="margin-top: 15px">
                                       <div class="form-check">
  <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault5" value="type5">
   <img src="assets/images/building.png" style="height:40px;width:40px;margin-left:27px">
  <label class="form-check-label" for="flexRadioDefault5" style="color:black;margin-left: 13px;font-size:13px;font-weight: bold;margin-top: -3px !important">
    3rd Floor
  </label>
</div>
                                    </div><!-- End .col-sm-4 -->
                                     <div class="col-sm-3" style="margin-top: 15px">
                                       <div class="form-check">
  <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault6" value="type6">
   <img src="assets/images/building.png" style="height:40px;width:40px;margin-left:27px">
  <label class="form-check-label" for="flexRadioDefault6" style="color:black;margin-left: 13px;font-size:13px;font-weight: bold;margin-top: -3px !important">
    4th Floor
  </label>
</div>
                                    </div><!-- End .col-sm-4 -->
                                     <div class="col-sm-3" style="margin-top: 15px">
                                       <div class="form-check">
  <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault7" value="type7">
   <img src="assets/images/building.png" style="height:40px;width:40px;margin-left:27px">
  <label class="form-check-label" for="flexRadioDefault7" style="color:black;margin-left: 13px;font-size:13px;font-weight: bold;margin-top: -3px !important">
   5th Floor
  </label>
</div>
                                    </div><!-- End .col-sm-4 -->
                                     <div class="col-sm-3" style="margin-top: 15px">
                                       <div class="form-check">
  <input class="form-check-input" type="radio" name="utype" id="flexRadioDefault8" value="type8">
   <img src="assets/images/building.png" style="height:40px;width:40px;margin-left:27px">
  <label class="form-check-label" for="flexRadioDefault8" style="color:black;margin-left: 13px;font-size:13px;font-weight: bold;margin-top: -3px !important">
    
   6th Floor
  </label>
</div>
                                    </div><!-- End .col-sm-4 -->



                                    
                                    <div class="col-sm-12" style="margin-top: 20px">
                                        <center>  <button type="submit" name="btn_save" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                        <span>SUBMIT</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </center>
                                    </div>


                    <div class="col-sm-12" style="margin-top: 20px;border:1px solid #FCB941;pdding:10px">
                        <br>
                        <?php
                        if(isset($_POST['btn_save']))
                        {
                            $utype=$_POST['utype'];
                            $area_sq=$_POST['area_sq'];

                            // $uminrates="";
                            // $umaxrates="";

                            $fg_c="select * from tbl_coast_calculator where cost_id=1";
                            $run_c=mysqli_query($con,$fg_c);
                            $row_c=mysqli_fetch_array($run_c);
                            
                            if($utype == "type1")
                            {
                                $min_single=$row_c['min_single'];
                                $max_single=$row_c['max_single'];

                                $uminrates=$area_sq *  $min_single;
                                $umaxrates=$area_sq *  $max_single;
                            }
                             if($utype == "type2")
                            {
                                $min_double=$row_c['min_double'];
                                $max_double=$row_c['max_double'];

                                $uminrates=$area_sq *  $min_double;
                                $umaxrates=$area_sq *  $max_double;
                            }
                            if($utype == "type3")
                            {
                                $min_signle_basement=$row_c['min_signle_basement'];
                                $max_single_basement=$row_c['max_single_basement'];

                                $uminrates=$area_sq *  $min_signle_basement;
                                $umaxrates=$area_sq *  $max_single_basement;
                            }
                            if($utype == "type4")
                            {
                                $min_double_basement=$row_c['min_double_basement'];
                                $max_double_basement=$row_c['max_double_basement'];

                                $uminrates=$area_sq *  $min_double_basement;
                                $umaxrates=$area_sq *  $max_double_basement;
                            }
                            if($utype == "type5")
                            {
                                $min_3rdfloor=$row_c['min_3rdfloor'];
                                $max_3rdfloor=$row_c['max_3rdfloor'];

                                $uminrates=$area_sq *  $min_3rdfloor;
                                $umaxrates=$area_sq *  $max_3rdfloor;
                            }
                            if($utype == "type6")
                            {
                                $min_4_floor=$row_c['min_4_floor'];
                                $max_4floor=$row_c['max_4floor'];

                                $uminrates=$area_sq *  $min_4_floor;
                                $umaxrates=$area_sq *  $max_4floor;
                            }
                            if($utype == "type7")
                            {
                                $min_5_floor=$row_c['min_5_floor'];
                                $max_5_floor=$row_c['max_5_floor'];

                                $uminrates=$area_sq *  $min_5_floor;
                                $umaxrates=$area_sq *  $max_5_floor;
                            }
                            if($utype == "type8")
                            {
                                $min_6_floor=$row_c['min_6_floor'];
                                $max_6_floor=$row_c['max_6_floor'];

                                $uminrates=$area_sq *  $min_6_floor;
                                $umaxrates=$area_sq *  $max_6_floor;
                            }

                        }

                         ?>
                         <div class="row">

                            <div class="col-sm-4">
                                <center><img src="assets/images/skyscraper.png"></center>
                            </div>
                            <div class="col-sm-8">
                                <br>
                                <h4>Minimum Cost : Rs <?php echo number_format($uminrates); ?></h4>
                        <h4>Maximum Cost : Rs <?php echo number_format($umaxrates); ?></h4>
                            </div>


                            <div class="col-sm-12">

                              <table border="1" style="width: 100%;margin-top: 15px;">
                                <tr style="background-color: #FCB941;color:white">
                                  <th style="width: 120px !important"><center>Item Name</center></th>
                                  <th><center>Qty</center></th>
                                  <th><center>Price</center></th>
                                  <th style="width: 40px !important"><center>Action</center></th>
                                </tr>
                                <?php 
                                $fg_product="SELECT * FROM `tbl_calculator_itemrate` rates,tbl_item itm WHERE rates.item_id=itm.ITEM_CODE";
                                $run_product=mysqli_query($con,$fg_product);
                                while($row_product=mysqli_fetch_array($run_product))
                                {
                                  $ITEM_NAME=$row_product['ITEM_NAME'];
                                  $item_id=$row_product['item_id'];
                                  $SALE_PRICE=$row_product['SALE_PRICE'];
                                  $single_story_qty=$row_product['single_story_qty'];
$double_story_qty=$row_product['double_story_qty'];
$single_basement_qty=$row_product['single_basement_qty'];
$double_basement_qty=$row_product['double_basement_qty'];
$third_floor_qty=$row_product['third_floor_qty'];
$forth_floor_qty=$row_product['forth_floor_qty'];
$fifth_floor_qty=$row_product['fifth_floor_qty'];
$sixth_floor_qty=$row_product['sixth_floor_qty'];
$fqty=0;
$fprice=0;

                          if($utype == "type1")
                            {
                              $fqty=$single_story_qty * $area_sq;
                              $fprice=$fqty * $SALE_PRICE;
                            }
                            if($utype == "type2")
                            {
                              $fqty=$double_story_qty * $area_sq;
                              $fprice=$fqty * $SALE_PRICE;
                            }
                            if($utype == "type3")
                            {
                              $fqty=$single_basement_qty * $area_sq;
                              $fprice=$fqty * $SALE_PRICE;
                            }
                            if($utype == "type4")
                            {
                              $fqty=$double_basement_qty * $area_sq;
                              $fprice=$fqty * $SALE_PRICE;
                            }
                            if($utype == "type5")
                            {
                              $fqty=$third_floor_qty * $area_sq;
                              $fprice=$fqty * $SALE_PRICE;
                            }
                            if($utype == "type6")
                            {
                              $fqty=$forth_floor_qty * $area_sq;
                              $fprice=$fqty * $SALE_PRICE;
                            }
                            if($utype == "type7")
                            {
                              $fqty=$fifth_floor_qty * $area_sq;
                              $fprice=$fqty * $SALE_PRICE;
                            }
                            if($utype == "type8")
                            {
                              $fqty=$sixth_floor_qty * $area_sq;
                              $fprice=$fqty * $SALE_PRICE;
                            }

                       echo "
                       <tr>
                       <td><center>$ITEM_NAME</center></td>
                       <td><center>$fqty</center></td>
                       <td><center>Rs : $fprice</center></td>
                       <td><center><a href='add_to_cart.php?ID=$item_id' class='btn btn-success' >Detail</a></center></td>

                       </tr>

                       ";


                                }

                                ?>
                              </table>

                            </div>

                         </div>
                       


                    </div>







                                </div>

                                   
                                </div><!-- End .row -->
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


                            </div>
                        </form>

                              
                                
                                
                            
                        </div><!-- End .col-md-9 col-lg-7 -->
                    </div><!-- End .row -->

                    </div>

                </div>
            </div>


        </main>

        <?php include("footer.php");?>