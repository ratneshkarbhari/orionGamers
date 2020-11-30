<main class="page-content" id="create-google-verified-account">

    <div class="container">
    
        <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
            <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
        </div>

        <div class="row" id="create-google-verified-account">
        
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="card">

                    <div class="card-body">
                        
                        <h4 style="background-color: white !important; color: black !important;">Verified Name:</h4>
                        <p style="background-color: white !important; color: black !important;"><?php echo $customerData['first_name'].' '.$customerData['last_name']; ?></p>
                        <h4 style="background-color: white !important; color: black !important;">Verified Email:</h4>
                        <p style="background-color: white !important; color: black !important;"><?php echo $customerData['email']; ?></p>

                    </div>
                
                </div>
                
                <form style="margin-top: 5%;" action="<?php echo site_url('create-customer-account-with-google'); ?>" method="post">

                    <div class="form-group">
                        <label for="mobileNumber">Mobile Number</label>
                        <input type="text" name="mobileNumber" class="form-control" id="mobileNumber" required>
                    </div>

                    <button type="submit" class="btn btn-block" style="background: red; color: white;">Get Started with OriGamers</button>
                            
                </form>
            
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
        
        </div>
    
    </div>

</main>