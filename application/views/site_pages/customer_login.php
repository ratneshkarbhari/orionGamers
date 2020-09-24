<div class="login-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45" style="margin-bottom: 3%;">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-12 col-sm-12"></div>
                <div class="col-lg-6 col-md-12 col-sm-12">

                    <div id="loginBox">
                    

                        <h1 class="text-center"><span style="color: red;">Login to</span> your account</h1>

                        <div class="text-center">
                            
                            <a href="<?php  echo $googleLoginUrl; ?>">
                                <img src="<?php echo site_url('assets/images/google-login.png'); ?>" >
                            </a>
                        </div>

                        <form action="<?php echo site_url('email-login-exe'); ?>" method="post">

                            <div class="form-group">
                                <label for="customer-email">Email Address</label>
                                <input class="form-control" type="email" name="customer-email" id="customer-email" required>
                            </div>
                            <div class="form-group">
                                <label for="customer-password">Password</label>
                                <a style="position: absolute; right:3%;" href="<?php echo site_url('forgot-password'); ?>"><small class="text-light">Show Password</small></a>
                                <input class="form-control" type="password" name="customer-password" id="customer-password" required>
                            </div>
                            <div class="form-group text-right" style="margin: 0;">
                                <a style="text-align: right;" href="<?php echo site_url('forgot-password'); ?>"><small class="text-danger">Forgot Password?</small></a>
                            </div>

                            <div class="form-group">
                            <button type="submit" class="btn btn-danger" style="background-color: red !important;">Login</button>

                            </div>

                        </form>
                        
                        <p style="color: white !important; text-align: center;">Dont have an account, <a id="hideLoginShowRegister" href="#" style="color: red !important;">Register Here</a></p>
                    
                    </div>
                    
                    <div id="registerBox" class="d-none">
                    

                        <h1 class="text-center"><span style="color: red;">Create New</span>  account</h1>


                        <div class="text-center" style="margin-bottom: 5%;">
                            

                            <a href="<?php  echo $googleLoginUrl; ?>">
                            <img src="<?php echo site_url('assets/images/google-login.png'); ?>" >
                            </a>


                        </div>
                        <h4 class="text-center">OR</h4>
                        <small class="text-danger" id="emptyError"></small>
                        <div class="form-group"  id="registerEmailBox">


                            <label for="register-email">Enter your Email Address</label>                        
                            <input class="form-control" type="email" name="register-email" id="register-customer-email">
                            <br>
                            <button class="btn" style="background-color: red;" type="button" id="sendVerifCode">Send Verification Code</button>


                            <script>
                                $("button#sendVerifCode").click(function (e) { 
                                    e.preventDefault();
                                    let enteredVerifEmail = $("input#register-customer-email").val();
                                    if (enteredVerifEmail=='') {
                                        $("small#emptyError").html('Please enter Email address to proceed');
                                    } else {
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url('send-verification-email-exe'); ?>",
                                            data: {
                                                'email_address_entered' : enteredVerifEmail 
                                            },
                                            success: function (response) {
                                                if(response=='sent'){
                                                    $("div#registerEmailBox").fadeOut();
                                                }else{
                                                    $("small#emptyError").html('Email couldnt be sent');
                                                }
                                            }
                                        });
                                    }
                                });
                            </script>

                        </div>

                        <div class="form-group" style="display: none;" id="verifyCodeBox">

                            <label for="register-customer-code">Enter the Verification Code</label>                        
                            <input type="email" name="register-customer-code" id="register-customer-code">

                            <button class="btn">Verify Code</button>

                        
                        </div>

                        <div class="form-group" style="display: none;" id="nameAndPasswordBox">

                            <label for="register-customer-code">Enter the Verification Code</label>                        
                            <input type="email" name="register-customer-code" id="register-customer-code">

                            <button class="btn">Verify Code</button>

                        
                        </div>


                        <script>
                        

                        
                        </script>

                        <p style="color: white !important; text-align: center;">Have an account with us?, <a id="hideRegisterShowLogin" href="#" style="color: red !important;">Login Now</a></p>

                    
                    </div>
                
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12"></div>
                

            </div>
        </div>
    </div><br><br>