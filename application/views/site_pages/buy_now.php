<script src="https://www.cashfree.com/assets/cashfree.sdk.v1.2.js" type="text/javascript"></script>

<main class="page-content" id="buy-now">

    <div class="container d-none d-lg-block d-sm-none d-md-none">

        <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
            <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
        </div>



        
    
    </div>

    <section id="buy-now-section">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-3 col-md-12 col-sm-12"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-center">

                  <div class="card">

                    <div class="card-body">
                    
                      <img src="<?php echo site_url('assets/images/game_product_featured_images/'.$game_details['featured_image']); ?>" style="width: 50%;">
                      <br><br>
                      <h2><?php echo $game_details['title']; ?></h2>
                      <p style="color: red; font-size: 250%;">₹ <?php echo $game_details['sale_price']; ?></p>
                    
                    </div>
                  
                  </div>

                  <form id="redirectForm" method="post" action="https://www.cashfree.com/checkout/post/submit">
                    <input type="hidden" name="appId" value="33090190a25fd481164ee1c1c09033"/>
                    <input type="hidden" name="orderId" value="<?php echo $orderData['id']; ?>"/>
                    <input type="hidden" name="orderAmount" value="<?php echo $orderData['amount']; ?>"/>
                    <input type="hidden" name="orderCurrency" value="INR"/>
                    <input type="hidden" name="orderNote" value=""/>
                    <input type="hidden"  name="customerName" value="<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>"/>
                    <input type="hidden" name="customerEmail" value="<?php echo $_SESSION['email']; ?>"/>
                    <input type="hidden" name="customerPhone" value="<?php echo $orderData['customerPhone']; ?>"/>
                    <input type="hidden" name="returnUrl" value="<?php echo $orderData['returnUrl']; ?>"/>
                    <input type="hidden" name="signature" value="<?php echo $token; ?>"/>


                    <button type="submit" class="btn btn-large btn-block btn-danger">Pay Now</button>
                  </form>

                </div>
                <div class="col-lg-3 col-md-12 col-sm-12"></div>
            </div>
        </div>
    </section>

</main>
