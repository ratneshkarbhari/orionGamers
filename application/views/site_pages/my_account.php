<div class="login-section section " style="margin-bottom: 3%;">
    <div class="container">
        <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
            <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
        </div>
        <div class="row" style="padding: 5% 0;">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Edit Profile</a>
                <?php if($purchased=='yes'||$purchased=='different'): ?>
                <a class="nav-link" id="v-referred-people-tab" data-toggle="pill" href="#v-pills-referred-people" role="tab" aria-controls="v-pills-referred-people" aria-selected="false">Refferals</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Request Google Play Voucher</a>
                
                <a class="nav-link" id="v-pills-refund-tab" data-toggle="pill" href="#v-pills-refund" role="tab" aria-controls="v-pills-refund" aria-selected="false">Request Refund</a>
                
                <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4 class='text-light'>Edit Profile</h4>
                        <small class="text-danger"><?php echo $error; ?></small>
                        <small class="text-success"><?php echo $success; ?></small>
                        <form action="<?php echo site_url('update-customer-profile'); ?>" method="post">
                            <div class="container-fluid" style="padding: 0;">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input class="form-control" type="text" name="first_name" id="first_name" value='<?php echo $_SESSION['first_name']; ?>'>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input class="form-control" type="text"  name="last_name" value='<?php echo $_SESSION['last_name']; ?>' id="last_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="email" name="email" value='<?php echo $_SESSION['email']; ?>' id="email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="mobile_number">Mobile Number</label>
                                            <input class="form-control" type="text" name="mobile_number" value="<?php if(isset($_SESSION['mobile_number'])){
                                                echo $_SESSION['mobile_number'];
                                            } ?>" id="mobile_number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input class="form-control" type="text" name="city" value="<?php if(isset($_SESSION['city'])){
                                                echo $_SESSION['city'];
                                            } ?>" id="city">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="pincode">Pincode</label>
                                            <input class="form-control" type="text" name="pincode" value="<?php if(isset($_SESSION['pincode'])){
                                                echo $_SESSION['pincode'];
                                            } ?>" id="city">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input class="form-control" type="text" name="country" value="<?php if(isset($_SESSION['country'])){
                                                echo $_SESSION['country'];
                                            } ?>" id="country">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input class="form-control" type="text" name="state" value="<?php if(isset($_SESSION['state'])){
                                                echo $_SESSION['state'];
                                            } ?>" id="state">
                                        </div>
                                    </div>
                                        
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <select class="custom-select form-control" id="platform-select" style="display: block !important;">
                                            <option name="platform" value="android" <?php if($_SESSION['platform']=='android'){echo 'selected';} ?>>Android</option>
                                            <option value="ios" <?php if($_SESSION['platform']=='ios'){echo 'selected';} ?>>iOS</option>
                                        </select>                                    
                                    </div>
                                    <br><br>
                                        

                                        

                                    <div class="form-group col-lg-12 col-sm-12 col-md-12">
                                        <button class="btn btn-lg btn-block" type="submit" style="background-color: red;">Update Profile</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-referred-people" role="tabpanel" aria-labelledby="v-pills-v-pills-referred-people-tab">
                        <h4>Refferals</h4>
                        <label>Refferal Link:</label>
                        <pre style="color: white; font-size: 18px;"><?php echo site_url('?parent_reff_code='.$_SESSION['reff_code']); ?></pre>
                        <button type="button" id="copyReffLink" class="btn btn-secondary" data-clipboard-text="<?php echo 'Do visit origamers.com they provide the privilege to the gamers to enjoy premium packs of all your favorite games at affordable rates.  '.site_url('?parent_reff_code='.$_SESSION['reff_code']); ?>">Copy Link</button>
                        <p>People who sign up with your refferal code and purchase will appeare here:</p>                   
                        <span style='padding: 2%; background-color: red !important;'>Not Purchased</span>
                        <span style='padding: 2%; background-color: darkgreen !important;'> Purchased</span>
                        <br><br>

                        <div class="container-fluid">
                            <div class="row">
                            <?php $purchasedCount = 0; foreach($reffered_customers as $reffCust): ?>

                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-left:0;padding-right:0;">
                                    <div class="card" style="<?php if($reffCust['purchased']=='no'||$reffCust['purchased']=='different'){echo 'background-color: red;';}else{
                                        echo 'background-color: darkgreen; '; $purchasedCount++;
                                    } ?>">
                                        <div class="card-body">
                                            <h4 style="background-color: transparent !important;"><?php echo $reffCust['first_name'].' '.$reffCust['last_name']; ?></h4>
                                            <h5 style="background-color: transparent !important;">Email: <?php echo $reffCust['email']; ?></h5>
                                        </div>
                                    </div>
                                </div>


                            <?php endforeach; ?>
        
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <h4>Request Google Play Voucher</h4>
                        <?php if($customerData['gpay_credit_claim_status']!='requested'||$customerData['gpay_credit_claim_status']!='settled'): ?>
                        <p>Once 3 people have joined and purchased using your refferal code, the form below will unlock kindly submit your working gmail id to receive your google play voucher code. </p>
                        <form action="<?php echo site_url('update-google-play-credit-email'); ?>" method="post">
                            <div class="form-group">
                                <label for="google-play-credits-email">Gmail address to recieve Google Play credit discount</label>
                                <input class="form-control" type="email" name="google-play-email" id="google-play-email" <?php if($purchasedCount<3){echo 'disabled';} ?>>
                            </div>
                            <button type="submit" class="btn btn-danger" <?php if($purchasedCount<3){echo 'disabled';} ?>>Save</button>
                        </form>                   
                        <?php endif; ?>
                    </div>
                    <?php if($purchased=="yes"): ?>
                    <div class="tab-pane fade" id="v-pills-refund" role="tabpanel" aria-labelledby="v-pills-refund-tab">
                        <h4>Request Refund</h4>

                        <!-- <form action="<?php echo site_url('create-refund-request-exe'); ?>" method="post"> -->
                            <div class="form-group">
                                <label for="account_number">Account Number</label>
                                <input class="form-control" type="text" name="account_number" id="account_number">
                            </div>
                            <div class="form-group">
                                <label for="ifsc">IFSC Code</label>
                                <input class="form-control" type="text" name="ifsc" id="ifsc">
                            </div>
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <input class="form-control" type="text" name="bank_name" id="bank_name">
                            </div>
                            <div class="form-group">
                                <label for="branch_name">Branch Name</label>
                                <input class="form-control" type="text" name="branch_name" id="branch_name">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number</label>
                                <input class="form-control" type="text" name="mobile_number" id="mobile_number">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" id="email">
                            </div>
                            <p class="text-success" id="success-message-rr"></p>
                            <button type="button" id="submit_refund_request" class="btn btn-danger">Send Request</button>
                        <!-- </form>                    -->
                    </div>
                    <script>
                        $("button#submit_refund_request").click(function (e) { 
                            e.preventDefault();
                            let account_number = $("input#account_number").val();
                            let ifsc = $("input#ifsc").val();
                            let bank_name = $("input#bank_name").val();
                            let branch_name = $("input#branch_name").val();
                            let mobile_number = $("input#mobile_number").val();
                            let email = $("input#email").val();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('create-refund-request-exe'); ?>",
                                data: {
                                    "account_number" : account_number,
                                    "ifsc" : ifsc,
                                    "bank_name" : bank_name,
                                    "branch_name" : branch_name,
                                    "mobile_number" : mobile_number,
                                    "email" : email 
                                },
                                success: function (response) {
                                    if(response=="done"){
                                        $("p#success-message-rr").html("Refund Request sent");
                                    }                                    
                                }
                            });
                        });
                    </script>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: red;
    }
    .nice-select{
        display: none !important;
    }
    select#platform-select{
        display: block !important;
    }
</style>
<script>
    $("select#platform-select").css('display', 'block');
</script>