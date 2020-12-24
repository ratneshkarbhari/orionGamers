<main class="page-content" id="buy-now">
<script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="<?php echo site_url('assets/images/origamersTransparent.png'); ?>"></script>

  <div class="container">
    <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
      <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
    </div>
    <div class="row">

      <div class="col-lg-4 col-md-12 col-sm-12"></div>
      <div class="col-lg-4 col-md-12 col-sm-12 card" style="background-color: white; color: black !important;">
        <img src="<?php echo site_url('assets/images/game_product_featured_images/'.$gameProductData['featured_image']) ?>" style="width: 100%;">
        <div class="card-body">
          <h3 class="card-title" style="background-color: white !important; color: black !important;"><?php echo $gameProductData['title']; ?></h3>
          <p class="card-text"><?php echo $gameProductData['description']; ?></p>
          <form id="redirectForm" method="post" action="https://www.cashfree.com/checkout/post/submit">
            <input type="hidden" name="key" value="33090190a25fd481164ee1c1c09033"/>
            <input type="hidden" name="orderId" value="<?php echo uniqid(); ?>"/>
            <input type="hidden" name="orderAmount" value="<?php echo $orderData['amount']; ?>"/>
            <input type="hidden" name="orderCurrency" value="INR"/>
            <input type="hidden" name="orderNote" value=""/>
            <input type="hidden"  name="customerName" value="<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>"/>
            <input type="hidden" name="customerEmail" value="<?php echo $_SESSION['email']; ?>"/>
            <input type="hidden" class="form-control" name="customerPhone" value="<?php echo $orderData['customerPhone']; ?>"/>
            <br>
            <input type="hidden" name="returnUrl" value="<?php echo $orderData['returnUrl']; ?>"/>
            <input type="hidden" name="signature" value="<?php echo $token; ?>"/>


            <button type="submit" class="btn btn-large btn-block btn-danger">Pay Now</button>
          </form>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12"></div>

    </div>

  </div>

</main>