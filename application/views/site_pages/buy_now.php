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
          <a href="<?php echo $paymentLink; ?>" class="btn btn-block" style="background-color: red; color: white;">Buy Now</a>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12"></div>

    </div>

  </div>

</main>