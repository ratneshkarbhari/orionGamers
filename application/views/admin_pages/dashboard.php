<main class="page-content" id="admin-dashboard">

    <div class="container">
    
        <h2 class="page-title">Welcome <?php echo $_SESSION['first_name']; ?></h2>


        <div class="row">

            <div class="col l4 m12 s12">
                <a href="<?php echo site_url('all-games'); ?>"><div class="card custom-card-one-third center-align">
                <h6>Games</h6>
                </div></a>
            </div>
            <div class="col l4 m12 s12">
                <a href="<?php echo site_url('all-game-products'); ?>"><div class="card custom-card-one-third center-align">
                <h6>Game Products</h6>
                </div></a>
            </div>
            <div class="col l4 m12 s12">
                <a href="<?php echo site_url('all-sales'); ?>"><div class="card custom-card-one-third center-align">
                <h6>Sales</h6>
                </div></a>
            </div>
            <div class="col l12 m12 s12">
                <a href="<?php echo site_url('all-google-play-credit-request'); ?>"><div class="card custom-card-one-third center-align">
                <h6>All Google Play Credit Request</h6>
                </div></a>
            </div>

        </div>
        

    </div>

</main>