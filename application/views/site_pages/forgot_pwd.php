<main class="page-content" id="forgot-password">
    <section id="forgot-password">
    

        

        <div class="container">

        <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
            <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
        </div>
            

            <div class="row">

                <div class="col-lg-4 col-md-12 col-sm-12"></div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                
                    <div id="sendPasswordResetCode">
                    
                        <div class="form-group">
                            <label for="forgotPasswordEmail">Enter your Email Address</label>
                            <input class="form-control" type="email" name="forgotPasswordEmail" id="forgotPasswordEmail">
                        </div>

                        <button class="btn" id="sendPasswordResetCode" style="background-color: red;">Send Password Reset Code</button>
                    
                    </div>
                    
                    <div id="verifyPasswordResetCode" class="d-none">
                    
                        <div class="form-group">
                            <label for="forgotPasswordCode">Enter Password Reset Code</label>
                            <input class="form-control" type="text" name="forgotPasswordCode" id="forgotPasswordCode">
                        </div>

                        <button class="btn" id="sendPasswordResetCode" style="background-color: red;">Verify Password Reset Code</button>
                    
                    </div>
                                    
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            
            </div>      
        </div>

        
            
    
    </section>
</main>