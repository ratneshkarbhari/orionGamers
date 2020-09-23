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
                        
                    
                    
                    </div>

                    <div id="registerBox" class="d-none">
                    

                        <h1 class="text-center"><span style="color: red;">Create New</span>  account</h1>


                        <div class="text-center" style="margin-bottom: 5%;">
                             <a href="<?php  echo $googleLoginUrl; ?>">
                            <img src="<?php echo site_url('assets/images/'); ?>" >
                            </a>

                            <a href="<?php  echo $googleLoginUrl; ?>">
                            <img src="<?php echo site_url('assets/images/google-login.png'); ?>" >
                            </a>


                        </div>

                        <form action="" method="post">

                            <div class="container-fluid" style="margin:0; padding:0;">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="first-name">First Name</label>
                                        <input class="form-control" type="text" name="first-name" id="first-name">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="last-name">Last Name</label>
                                        <input class="form-control" type="text" name="last-name" id="last-name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="customer-email">Email Address</label>
                                <input class="form-control" type="email" name="customer-email" id="customer-email">
                            </div>
                            <div class="form-group">
                                <label for="customer-password">Password</label>
                                <a style="position: absolute; right:3%;" href="<?php echo site_url('forgot-password'); ?>"><small class="text-light">Show Password</small></a>
                                <input class="form-control" type="password" name="customer-password" id="customer-password">
                            </div>
                            <div class="form-group text-right" style="margin: 0;">
                                <a style="text-align: right;" href="<?php echo site_url('forgot-password'); ?>"><small class="text-danger">Forgot Password?</small></a>
                            </div>

                            <div class="form-group">
                            <button type="submit" class="btn btn-danger">Login</button>

                            </div>

                        </form>
                        
                    
                    
                    </div>
                
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12"></div>
                

            </div>
        </div>
    </div><br><br>