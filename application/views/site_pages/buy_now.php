<main class="page-content" id="buy-now">

    <div class="container d-none d-lg-block d-sm-none d-md-none">

        <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
            <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
        </div>



        
    
    </div>

    <section id="buy-now-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="<?php echo site_url('assets/images/game_product_featured_images/'.$game_details['featured_image']); ?>" style="width: 100%;">
                    <br><br>
                    <h2><?php echo $game_details['title']; ?></h2>
                    <p style="color: red; font-size: 250%;">₹ <?php echo $game_details['sale_price']; ?></p>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">

                    <form class="container-fluid" action="" method="post">

                        <div class="row">

                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" type="text" name="first_name" id="first_name">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="last_name">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="country">Country</label>
                                <input class="form-control" type="text" name="country" id="country">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="state">State</label>
                                <input class="form-control" type="text" name="state" id="state">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="city">City</label>
                                <input class="form-control" type="text" name="city" id="city">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="pincode">Pincode</label>
                                <input class="form-control" type="text" name="pincode" id="pincode">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-large btn-block" style="background-color: red; color: white;">BUY NOW</button>

                    </form>

                </div>
            </div>
        </div>
    </section>

</main>