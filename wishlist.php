  
<?php include('Connection.php');

if(isset($_POST['btn-remove']))
{
		$WISH_ID = $_POST['hidden_id'];
        $DELETE = "DELETE FROM tbl_wishlist WHERE WISH_ID = '".$WISH_ID."' ";
    	$query = mysqli_query($conn,$DELETE);
    
        if($query!="")
        {
            echo '<script> alert("Delete Item to Wishlist!");</script>';
        } 
        else
        {
            echo 'Not deleted';
        } 
} ?>


  <?php include('header.php') ?>
   <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Wishlist<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="container">
					<table class="table table-wishlist table-mobile">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>
								<th>Category</th>
								<th>Action</th>
								<th>Remove</th>
							</tr>
						</thead>

						<tbody>

							<?php 
							$QUERY = "SELECT A.*,B.ITEM_NAME ,B.ITEM_IMG,B.SALE_PRICE,C.CAT_NAME from tbl_wishlist A LEFT OUTER JOIN TBL_ITEM B ON A.ITEM_CODE = B.ITEM_CODE LEFT OUTER JOIN TBL_CATEGORY C ON B.CATE_ID = C.CAT_ID WHERE USER_CODE = '".$_SESSION["id"]."'";
                            $result = mysqli_query($conn,$QUERY);
                            while($row = mysqli_fetch_array($result)){ ?>
							<tr>
								<td class="product-col">
									<div class="product">
										<figure class="product-media">
											<a href="#">
												 <img src="Admin/upload/<?php echo $row['ITEM_IMG']; ?>" alt="Product image" class="product-image">
											</a>
										</figure>

										<h3 class="product-title">
											<a href="#"><?php echo $row["ITEM_NAME"]; ?></a>
										</h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col">Rs. <?php echo number_format( $row["SALE_PRICE"], 2); ?></td>
								<td class="stock-col"><span class="in-stock"><?php echo $row["CAT_NAME"]; ?></span></td>
								<td class="action-col">

									<a href="add_to_cart.php?ID=<?php echo $row["ITEM_CODE"]; ?>"><button class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</button></a>
								</td>
								<form method="post">
									 <input type="hidden" name="hidden_id" value="<?php echo $row['WISH_ID']; ?>" />
								<td class="remove-col"><button type="submit" name="btn-remove" class="btn-remove" onclick="return window.confirm('Are U Sure Want to Delete');"><i class="icon-close"></i></button></td>
								</form>
							</tr>

							<?php }?>


							
						</tbody>
					</table><!-- End .table table-wishlist -->
	            	
            	</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
 <?php include('footer.php') ?>
</body>

</html>