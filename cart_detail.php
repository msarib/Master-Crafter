  
<?php include('Connection.php') ?>
<?php 

if(isset($_POST["update_cart"]))
{
 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["hidden_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
   {
    $cart_data[$keys]["item_quantity"] =  $_POST["quantity"];
   }
  }
 }
 else
 {

$QUERY = "SELECT A.*,B.CAT_NAME from tbl_item A LEFT OUTER JOIN TBL_CATEGORY B ON A.CATE_ID = B.CAT_ID WHERE A.ITEM_CODE = '".$_POST["hidden_id"]."' ";
                       $result = mysqli_query($conn,$QUERY);

              while($row = mysqli_fetch_array($result)){ 


              

  $item_array = array(
   'item_id'   => $_POST["hidden_id"],
   'item_name'   => $row["ITEM_NAME"],
   'item_price'  => $row["SALE_PRICE"],
   'item_img'  => $row["ITEM_IMG"],
   'item_quantity'  => $_POST["quantity"]
  );
  $cart_data[] = $item_array;
 }
}

 
 $item_data = json_encode($cart_data);
 setcookie('shopping_cart', $item_data, time() + (86400 * 30));
 header("Refresh:0");
 //header("location:add_to_cart.php?ID=$ITEM_CODE?success=1");
}

?>
 <?php include('header.php') ?>
   <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
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
										<tr>
											<td class="product-col">
												<form method="post">
												<div class="product">
													<figure class="product-media">
														 <input type="hidden" name="hidden_id" value="<?php echo $values["item_id"]; ?>" />
														<a href="#">
															<img src="Admin/upload/<?php echo $values["item_img"]; ?>" alt="Product image"> 
														</a>
													</figure>

													<h3 class="product-title">
														<a href="add_to_cart.php?ID=<?php echo $values["item_id"]; ?>"><?php echo $values["item_name"]; ?></a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">Rs.<?php echo $values["item_price"]; ?></td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" name="quantity" value="<?php echo $values["item_quantity"]; ?>" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            
											<td class="total-col">Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
											<td class="remove-col"><a href="javascript:;" class="btn-remove deleteCart" data-url="addtocart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="icon-close" title="Remove Product"></i></a></td>
										</tr>
										<?php $total = $total + ($values["item_quantity"] * $values["item_price"]); ?>
										<?php }?>
<?php
   }
   else
    {
    echo '
    <tr>
     <td colspan="5" align="center">No Item in Cart</td>
    </tr>
    ';
   }
   ?>
										
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">

			            			
	                				<button name="update_cart" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
			            			<!-- <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a> -->
		            			</div><!-- End .cart-bottom -->

	                		</div><!-- End .col-lg-9 -->
	                		</form>
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Final Total:</td>
	                							<?php if (empty($total)) {?>
	                								<td>Rs. 0.00</td>
	                							<?php } else {?>
	                							<td>Rs. <?php echo number_format($total ?? '0', 2);?></td>";
	                							<?php } ?>
	                						</tr><!-- End .summary-subtotal -->
	                						

	                						


	                						

	                					
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="checkout.php" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="Shop.php" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
               <?php include('footer.php') ?>
</body>

</html>
