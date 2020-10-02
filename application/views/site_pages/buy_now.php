<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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

                    <!-- <form class="container-fluid" action="<?php echo site_url('checkout-exe'); ?>" method="post"> -->

                        <div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" value="<?php echo $_SESSION['first_name']; ?>" type="text" name="first_name" id="first_name">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="last_name">Last Name</label>
                                <input value="<?php echo $_SESSION['last_name']; ?>" class="form-control" type="text" name="last_name" id="last_name">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label for="email">Email</label>
                                <input class="form-control" value="<?php echo $_SESSION['email']; ?>" type="email" name="email" id="email">
                            </div>
                            <!-- <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label for="country">Country</label>
                                <input  class="form-control" type="text" name="country" id="country">
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
                            </div> -->
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group form-check">
                            
                                <input type="checkbox" class="form-check-input" id="tncAccepted">
                                <label class="form-check-label" for="tncAccepted">I Agree to all Terms and conditions</label>
                            
                            </div>

                        </div>

                        </div>


                        <button type="button" id="checkoutExeButton" class="btn btn-large btn-block" style="background-color: red; color: white;">BUY NOW</button>

                        

                    <!-- </form> -->

                </div>
            </div>
        </div>
    </section>

</main>
<script>
    var options = {
    "key": "rzp_live_zxrps8h6nsCw9a", // Enter the Key ID generated from the Dashboard
    "amount": '<?php echo $orderData['amount']; ?>', // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Ori Gamers",
    "description": "Payment for <?php echo $game_details['title']; ?>",
    "image": "<?php echo site_url('assets/images/website_logo.png'); ?>",
    "order_id": "<?php echo $orderData['id']; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('save-transaction-add-purchase'); ?>",
            data: {
                'razorpay_payment_id' : response.razorpay_payment_id,
                'razorpay_order_id' : response.razorpay_order_id,
                'product_id' : $game_details['id'],
                'razorpay_signature' : response.razorpay_signature,
                'payee_customer_email' : '<?php echo $_SESSION['email']; ?>',
                'date' : '<?php echo date('d-m-Y'); ?>',
                'payee_customer_name' : '<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>',
                'amount' : <?php echo $game_details['sale_price']; ?>
            },
            success: function (response) {
                if (response=='success') {
                    location.href="<?php echo site_url('thank-you'); ?>"
                }  
            }
        });

       
    },
    "prefill": {
        "name": "<?php echo $_SESSION['first_name']; ?>",
        "email": "<?php echo $_SESSION['email']; ?>"
    },
    "theme": {
        "color": "#000000"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('checkoutExeButton').onclick = function(e){
    if ($("input#tncAccepted").prop("checked")==true) {
        rzp1.open();
        e.preventDefault();
    }else{
        alert('Please Accept Terms and Conditions to proceed');
    }
}

</script>