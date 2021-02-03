<main class="page-content" id="buy-now">

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
          
		  <!-- <form action="https://secure.payu.in/_payment/" method="post"> -->
      <form action="https://sandboxsecure.payu.in/_payment" method="post"></form>
			  <input type="hidden" name="key" value="lomegegA">
			  <input type="hidden" name="txnid" value="<?php echo $txnid = rand(1000,9999); ?>">
			  <input type="hidden" name="amount" value="<?php echo $gameProductData["sale_price"]; ?>">
			  <input type="hidden" name="productinfo" value="<?php echo $gameProductData["description"]; ?>">
			  <input type="hidden" name="firstname" value="<?php echo $_SESSION["first_name"]; ?>">
			  <input type="hidden" name="email" value="<?php echo $_SESSION["email"]; ?>">
			  <input type="hidden" name="phone" value="<?php echo $_SESSION["mobile_number"]; ?>">
			  <input type="hidden" name="surl" value="<?php echo site_url('thank-you'); ?>">
			  <input type="hidden" name="furl" value="<?php echo site_url(''); ?>">
			  <input type="hidden" name="hash" value="<?php $hashSequence2 = 'lomegegA|'.$txnid.'|'.$gameProductData["sale_price"].'|'.$gameProductData["description"].'|'.$_SESSION["first_name"].'|'.$_SESSION["email"].'|||||||||||X971ICRWjz';echo $hash = strtolower(hash("sha512",$hashSequence2)); ?>">
			  <input type="hidden" name="service_provider" value="payu_paisa">

        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="tnc_cb">
          <label class="form-check-label" for="tnc_cb">
            I Agree to all Terms and Conditions
          </label>
        </div>
        <p>Read the <a href="<?php echo site_url("terms-and-conditions"); ?>">Terms and Conditions</a></p>
        <script>
          $("input#tnc_cb").click(function (e) { 
            e.preventDefault();
            if($("button#PayButton").hasClass("d-none")){
              $("button#PayButton").removeClass("d-none");
            }else{
              $("button#PayButton").addClass("d-none");
            }
          });
        </script>
			  <button id="PayButton" class="btn btn-danger d-none" style="background-color: red !important; color: white !important;" type="submit">Pay ₹ <?php echo $gameProductData["sale_price"]; ?></button>
		  </form>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12"></div>

    </div>

  </div>

</main>