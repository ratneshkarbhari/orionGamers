<!--slider section start-->
<div class="hero-section section position-relative">
    <div class="hero-slider">

        <?php $slider_images = json_decode($game['banner_images'],TRUE); foreach($slider_images as $slider_image): ?>
            <div class="game-details-slide" style="background-image: url('<?php echo site_url('assets/images/game_slider_images/'.$slider_image); ?>'); min-height: 35vw; max-height: 35vw; background-repeat: none; background-size: cover; background-position: top;"></div>
        <?php endforeach; ?>
    </div>
</div>
<div class="featured-section section pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45" style="padding-top: 5%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-12"></div>
            <div class="col-lg-6 col-sm-12 col-md-12">
                <?php  foreach($game_products as $game_product): ?>
                <div class="container-fluid card hovercard" style="padding: 2%; background-color: black; border: 1px solid red;">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                        <img src="<?php echo site_url('assets/images/game_product_featured_images/'.$game_product['featured_image']); ?>" style="width: 100%;">
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <h3 class="game-product-title"><?php echo $game_product['title']; ?></h3>
                            <del><span style="color: red;">₹ <?php echo $game_product['price']; ?></span></del> | <span style="color: red; font-size: 200%;">₹ <?php echo $game_product['sale_price']; ?></span>
                            <form action="<?php echo site_url('buy-now'); ?>" method="post">
                                <input type="hidden" name="game-product" value="<?php echo $game_product['id']; ?>">
                                <button type="submit" class="btn btn-primary btn-block" style="background-color: red; margin: 2% 0;">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div> 
            <div class="col-lg-3 col-sm-12 col-md-12"></div>
        </div>
    </div>
</div>