<?php include('header.php');

  if(isset($_POST['btn_checkout']))
  {
    echo "<script>window.open('dashboard.php','_self')</script>";
  }

     ?>
    
    <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Online Payment</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php ">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Payment</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Online Payment</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

       


            <div class="page-content">
                <div class="checkout">
                    <div class="container">
                        <div class="checkout-discount">
                            <!--<form action="#">
                                <input type="text" class="form-control" required id="checkout-discount-input">
                                <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                            </form> -->
                        </div><!-- End .checkout-discount -->
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <h2 class="checkout-title">Card Details</h2><!-- End .checkout-title -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Card No*</label>
                                                <input type="text"  class="form-control" required  onkeyup="card_validate(this)">
                                                <p id='out' class="text-danger"></p>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-4">
                                                <label>CVC No*</label>
                                                <input type="text"  class="form-control" required minlength="3" maxlength="3">
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-4">
                                                <label>Exp.Month*</label>
                                                <input type="text"  class="form-control" required placeholder="MM" minlength="2" maxlength="2">
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-4">
                                                <label>Exp.Year</label>
                                                <input type="text"  class="form-control" placeholder="YY" required minlength="2" maxlength="2">
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-12">
                                                <button type="submit" name="btn_checkout" class="btn btn-outline-primary-2 btn-order btn-block" >
                                            <span class="btn-text">Pay Now</span>
                                            <span class="btn-hover-text">Pay Now</span>
                                        </button>

                                            </div>

                                            
                                        </div><!-- End .row -->
                                      
                                        
                                        

                                       
                                </div><!-- End .col-lg-9 -->
                                <div class="col-lg-3"></div>
                            </div><!-- End .row -->
                        </form>
                    </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->     
      <?php include('footer.php') ?>
      <script>
      function card_validate(ele){
        var cardNo=ele.value;
        var masterCardRegex=/^(?:5[1-5][0-9]{14})$/;
        var visaCardRegex=/^(?:4[0-9]{12})(?:[0-9]{3})$/;
        var americanExpCardRegex=/^(?:3[47][0-9]{13})$/;
        
        var cardName="Not Valid";
        if(masterCardRegex.test(cardNo)){
          cardName="Master Card";
        }else if(visaCardRegex.test(cardNo)){
          cardName="Visa Card";
        }else if(americanExpCardRegex.test(cardNo)){
          cardName="American Express Card";
        }
      
        document.querySelector("#out").innerText=cardName;
      }
    </script>
      <script>
      function card_validate(ele){
        var cardNo=ele.value;
        var masterCardRegex=/^(?:5[1-5][0-9]{14})$/;
        var visaCardRegex=/^(?:4[0-9]{12})(?:[0-9]{3})$/;
        var americanExpCardRegex=/^(?:3[47][0-9]{13})$/;
        
        var cardName="Not Valid";
        if(masterCardRegex.test(cardNo)){
          cardName="Master Card";
        }else if(visaCardRegex.test(cardNo)){
          cardName="Visa Card";
        }else if(americanExpCardRegex.test(cardNo)){
          cardName="American Express Card";
        }
        document.querySelector("#out").innerText=cardName;
      }
    </script>