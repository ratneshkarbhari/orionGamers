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
                    <input type="hidden" name="notifyUrl" value="<?php echo $orderData['notifyUrl']; ?>"/>
                    <input type="hidden" name="signature" value="<?php echo $token; ?>"/>
                    <button type="submit" class="btn btn-large btn-block btn-danger">Pay Now</button>
                  </form>

                </div>
                <div class="col-lg-3 col-md-12 col-sm-12"></div>
            </div>
        </div>
    </section>

</main>
<script type="text/javascript">  
      var payCard = null;
      var payBank = null;
      var payWallet = null;
      var payUpi = null;

      (function() {

        var data = {};
        data.appId = "33090190a25fd481164ee1c1c09033";
        data.orderId = "<?php echo $orderData['id']; ?>";
        data.orderAmount = <?php echo $orderData['amount']; ?>;
        data.customerName = "<?php echo $orderData['customerName']; ?>";
        data.customerPhone = "<?php echo $orderData['customerPhone']; ?>";
        data.customerEmail = "<?php echo $orderData['customerEmail']; ?>";
        data.notifyUrl = "<?php echo $orderData['notifyUrl']; ?>";
        data.orderNote = "";
        data.pc = "";
        data.orderCurrency = "INR";
        data.paymentToken = "<?php echo $token; ?>";
        
        var config = {};
        config.layout = {};
        config.checkout = "transparent";
        config.mode = "PRODUCTION";
        var response = CashFree.init(config);

        if (response.status != "OK") {
          // Handle error in initializing 
        }

        var postPaymentCallback = function (event) {
          console.log(event);
          // Callback method that handles Payment 
          if (event.name == "PAYMENT_RESPONSE" && event.status == "SUCCESS") {
            // Handle Success 
          } 
          else if (event.name == "PAYMENT_RESPONSE" && event.status == "CANCELLED") {
            // Handle Cancelled
          } 
          else if (event.name == "PAYMENT_RESPONSE" && event.status == "FAILED") {
            // Handle Failed
          } 
          else if (event.name == "VALIDATION_ERROR") { 
            // Incorrect inputs
          }
        };

        var pc = function () {
            // CashFree.initPopup(); This will not work because browsers block popup requests being initiated from a callback
            data.paymentOption = "card";
            data.card = {};
            data.card.number = document.getElementById("card-num").value; 
            data.card.expiryMonth = document.getElementById("card-mm").value;
            data.card.expiryYear = document.getElementById("card-yyyy").value;
            data.card.holder = document.getElementById("card-name").value;
            data.card.cvv = document.getElementById("card-cvv").value;
            CashFree.paySeamless(data, postPaymentCallback);
            return false;
        }

        // PayCard shows how to implement it if there is a callback involved in your payment click.
        payCard = function() {
          CashFree.initPopup(); // This is required for the popup to work even in case of callback.
            $.ajax({
            url: "https://reqres.in/api/users?page=2", // This is an open endpoint.
            type: "GET",
            success: function(response){
                console.log(response);
                pc();

            }
        });
        };

        payBank = function() {
          CashFree.initPopup();
          data.paymentOption = "nb";
          data.nb = {};
          data.nb.code = document.getElementById("bank-code").value;

          CashFree.paySeamless(data , postPaymentCallback);
          return false;
        };

        payWallet = function() {
          data.paymentOption = "wallet";
          data.wallet = {};
          data.wallet.code = document.getElementById("wallet-code").value;

          CashFree.paySeamless(data, postPaymentCallback);
          return false;
        };

        payUpi = function() {
          data.paymentOption = "upi";
          data.upi = {};
          data.upi.vpa = document.getElementById("upi-vpa").value;

          CashFree.paySeamless(data, postPaymentCallback);
          return false;
        };

      })();

    </script>