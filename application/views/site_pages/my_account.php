<div class="login-section section " style="margin-bottom: 3%;">
    <div class="container">
        <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
            <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
        </div>
        <div class="row" style="padding: 5% 0;">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Edit Profile</a>
                <a class="nav-link" id="v-referred-people-tab" data-toggle="pill" href="#v-pills-referred-people" role="tab" aria-controls="v-pills-referred-people" aria-selected="false">Refferals</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Discount Settings</a>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4 class='text-light'>Edit Profile</h4>
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
                                            <input class="form-control" type="email" name="email" value='<?php echo $_SESSION['email']; ?>' id="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="mobile_number">Mobile Number</label>
                                            <input class="form-control" type="text" name="mobile_number" <?php if(isset($_SESSION['email'])){
                                                echo $_SESSION['email'];
                                            } ?> id="mobile_number">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-sm-12 col-md-12">
                                        <button class="btn btn-lg btn-danger btn-block" type="submit">Update Profile</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-referred-people" role="tabpanel" aria-labelledby="v-pills-v-pills-referred-people-tab">
                        <h4>Refferals</h4>
                        <label>Refferal Code:</label>
                        <pre style="color: white; font-size: 18px;">1u310d1</pre>
                        <p>People who sign up with your refferal code and purchase will appeare here:</p>                   
                        <span style='padding: 2%; background-color: red !important;'>Not Purchased</span>
                        <span style='padding: 2%; background-color: darkgreen !important;'> Purchased</span>
                        <br><br>

                        <div class="container-fluid">
                            <div class="row">
                            <?php foreach($reffered_customers as $reffCust): ?>

                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-left:0;padding-right:0;">
                                    <div class="card" style="<?php if($reffCust['purchased']=='no'){echo 'background-color: red;';}else{
                                        echo 'background-color: darkgreen;';
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
                        <h4>Discount Settings</h4>
                        <form action="<?php //echo site_url('update-google-play-credit-email'); ?>" method="post">
                            <div class="form-group">
                                <label for="google-play-credits-email">Gmail address to recieve Google Play credit discount</label>
                                <input class="form-control" type="email" name="google-play-email" id="google-play-email" disabled>
                            </div>
                            <button type="submit" class="btn btn-danger" disabled>Save</button>
                        </form>                   
                    </div>
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