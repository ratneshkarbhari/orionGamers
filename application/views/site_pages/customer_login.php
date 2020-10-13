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
                                <a style="position: absolute; right:3%;" href="<?php echo site_url('forgot-password'); ?>"><small class="text-light" id="showPwd">Show Password</small></a>
                                <script>
                                    $("small#showPwd").click(function (e) { 
                                        e.preventDefault();
                                        if($("input#customer-password").attr('type')=='password'){
                                            $("input#customer-password").attr('type','text');
                                        }else{ 
                                            $("input#customer-password").attr('type','password');
                                        }
                                    });
                                </script>
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
                                                if(response=='success'){
                                                    $("div#registerEmailBox").fadeOut();
                                                    $("div#verifyCodeBox").css('display','block');
                                                    $("small#emptyError").html('');
                                                    localStorage.setItem("email_under_verification", enteredVerifEmail);
                                                    $("div#verifyCodeBox").fadeIn();
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
                            <input class="form-control" type="text" name="register-customer-code" id="register-customer-code">
                            <br>
                            <button class="btn" style="background-color: red;" type="button" id="verifyCode">Verify Code</button>

                            <script>
                            
                                $("button#verifyCode").click(function (e) { 
                                    e.preventDefault();
                                    let enteredCode = $("input#register-customer-code").val();
                                    if(enteredCode==''){
                                        $("small#emptyError").html('Please Enter code to verify');
                                    }else{
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url('verify-code-exe') ?>",
                                            data: {
                                                'email_under_verification' : localStorage.getItem("email_under_verification"),
                                                'entered_code' : enteredCode
                                            },
                                            success: function (response) {
                                                if(response=='success'){
                                                    $("div#verifyCodeBox").fadeOut();
                                                    $("div#nameAndPasswordBox").css('display','block');
                                                    $("small#emptyError").html('');
                                                    $("div#nameAndPasswordBox").fadeIn();
                                                }else{
                                                    $("small#emptyError").html('Verification Code is incorrect');
                                                }
                                            }
                                        });
                                    }
                                });
                            
                            </script>

                        
                        </div>

                        <div class="form-group" style="display: none;" id="nameAndPasswordBox">

                            <small class="text-success">Congrats! your Email is verified! </small><br>

                            <label for="register-customer-first-name">Enter first Name</label>                        
                            <input class="form-control" type="text" name="register-customer-first-name" id="register-customer-first-name">
                            <br>
                            <label for="register-customer-last-name">Enter Last Name</label>                        
                            <input class="form-control" type="text" name="register-customer-last-name" id="register-customer-last-name">
                            <br>
                            <label for="register-customer-password">Set a Password</label>                        
                            <input class="form-control" type="text" name="register-customer-password" id="register-customer-password"><br>
                            <button id="createAccountWithVerifiedEmail" class="btn" style="background-color: red;">Create Account with verified Email</button>

                            <script>
                            
                            $("button#createAccountWithVerifiedEmail").click(function (e) { 
                                let enteredFirstName = $("input#register-customer-first-name").val();
                                let enteredLastName = $("input#register-customer-last-name").val();
                                let enteredPassword = $("input#register-customer-password").val();
                                if (enteredFirstName==''||enteredLastName==''||enteredPassword=='') {
                                    $("small#emptyError").html('Please enter first, Last name and password');
                                }else{
                                    $("small#emptyError").html('');
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo site_url('create-customer-account-exe'); ?>",
                                        data: {
                                            'enteredFirstName' : enteredFirstName, 
                                            'enteredLastName' : enteredLastName,
                                            'enteredPassword' : enteredPassword,
                                            'email_verified' : localStorage.getItem("email_under_verification"),
                                        },
                                        success: function (response) {
                                            if (response=='success') {
                                                window.location.href = "<?php echo site_url('my-account'); ?>";
                                            } else if(response=='failure') {
                                                $("small#emptyError").html('We are experiencing some errors please try later');
                                            }else if(response=='customer-exists'){
                                                $("small#emptyError").html('We are experiencing some errors please try later');
                                            }
                                        }
                                    });
                                }
                            });

                            </script>

                        

                        
                        </div>
                       




                        <p style="color: white !important; text-align: center;">Have an account with us?, <a id="hideRegisterShowLogin" href="#" style="color: red !important;">Login Now</a></p>

                    
                    </div>
                
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12"></div>
                

            </div>
        </div>
    </div><br><br>