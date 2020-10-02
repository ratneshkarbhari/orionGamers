    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js"></script>
    <script>
    new ClipboardJS('.btn');
    </script>
    <main class="page-content" id="coupon-handover-page">
        <section id="congatulations-section" class="text-center" style="padding: 15vh 0 5% 0; min-height: 75vh; max-height: 75vh;">
            <h1 class="congrats-text">
                Congratulations on your purchase, <?php  echo $_SESSION['first_name']; ?>.
            </h1>
            <h4>Now Refer 3 friends so you get your discount.</h4>
            <a href="#discount-code-details" class="text-danger">See More</a>
        </section>
        <section id="discount-code-details" style="padding: 15vh 0 5% 0; min-height: 75vh; max-height: 75vh; background-color: darkred;" class="text-center">
            <h1 class="congrats-text" style="background-color: transparent !important;">
                This is your Refferal Link, join 3 people to Enjoy your discount.
            </h1>
            <small class="text-success" id="successMsg"></small>
            <button type="button" id="copyReffLink" class="btn btn-secondary" data-clipboard-text="<?php echo 'Do visit origamers.com they provide the privilege to the gamers to enjoy premium packs of all your favorite games at affordable rates.  '.site_url('?parent_reff_code='.$_SESSION['reff_code']); ?>">Copy Link</button>
        </section>
    </main>

    