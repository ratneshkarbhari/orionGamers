<div class="login-section section " style="margin-bottom: 3%;">
    <div class="container">
        <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
            <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
        </div>
        <div class="login-section section container" style="margin-bottom: 3%;">

            <div class="row">
            
                <div class="col-lg-6 col-md-12 col-sm-12">

                <div class="  text-left" style="margin: 5% 0;">
                        <h2><span class="color-blue" style="color: red;">SEND</span> A MESSAGE</h2>
                    </div>
                
                    <form action="<?php echo site_url('contact-form-exe'); ?>" method="post">
                    
                        <p class="text-success"><?php echo $success; ?></p>

                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input class="form-control" type="text" name="full_name" id="full_name" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" id="message"></textarea>
                        </div>

                        <button type="submit" class="btn" style="background-color: red;">Send</button>

                    </form>

                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">

                <div class="  text-left" style="margin: 5% 0;">
                        <h2><span class="color-blue" style="color: red;">OUR</span> LOCATION</h2>
                    </div>


                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.691444721408!2d72.93733731376948!3d19.12118755552202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c79bf3327fa9%3A0xb68b2444dfbba0a2!2sCode%20Seva%20Co.!5e0!3m2!1sen!2sin!4v1601014900944!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>
            
            </div>
        </div>
    </div>
    </div>
<style>
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        background-color: red;
    }
</style>