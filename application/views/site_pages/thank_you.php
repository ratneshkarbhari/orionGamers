
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
                This is your Refferal Code
            </h1>
            <pre class="text-light"><?php echo $reff_code; ?></pre>
            <p>This code will be valid for 3 friends only on their purchase.</p>
        </section>
    </main>