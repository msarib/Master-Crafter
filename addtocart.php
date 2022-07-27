<?php


$message = '';

if(isset($_POST["add_to_cart"]))
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
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
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
   'party_code'  => $row["PARTY_CODE"],
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

if(isset($_GET["action"]))
{
 if($_GET["action"] == "delete")
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);
  $cart_data = json_decode($cookie_data, true);
  $cartCount = count($cart_data); 
  if ($cartCount == 1) {
     setcookie("shopping_cart", "", time() - 3600);
  }else{
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]['item_id'] == $_GET["id"])
   {
    unset($cart_data[$keys]);
    $item_data = json_encode($cart_data);
    setcookie("shopping_cart", $item_data, time() + (86400 * 30));
   
    //header("Refresh:0");
    //header('Location: '.$_SERVER['REQUEST_URI'].'?remove=1');
    //header("location:add_to_cart.php?ID=$ITEM_CODE?remove=1");
   }
  }
 }
}
 if($_GET["action"] == "clear")
 {
  setcookie("shopping_cart", "", time() - 3600);
  header("Refresh:0");
  //header('Location: '.$_SERVER['REQUEST_URI'].'?clearall=1');
  //header("location:add_to_cart.php?ID=$ITEM_CODE?clearall=1");
 }
}

if(isset($_GET["success"]))
{
 echo  '
 <script type="text/javascript">
           Command: toastr["success"]("Item Added into Cart!")

        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
}
       </script>   
 ';
}

if(isset($_GET["remove"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
}
if(isset($_GET["clearall"]))
{
 $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Your Shopping Cart has been clear...
 </div>
 ';
}
?>

