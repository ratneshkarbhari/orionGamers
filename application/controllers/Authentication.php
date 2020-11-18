<?php

    require_once './vendor/autoload.php'; // change path as needed


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';


    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Authentication extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('AuthModel');
            
        }

        

        public function contact_exe(){
            
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $from = "contact_form@origamers.com";

            // Create email headers
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();

            $body =  'Full Name:'.$this->input->post('full_name').'<br>
            Email: '.$this->input->post('email').'<br>
            Message:'.$this->input->post('message').'<br>
            ';
                
            $res = mail("inquiryorigamers@gmail.com","New Enquiry from contact form",$body,$headers);

            if ($res) {
                $data['title'] = 'Contact';
                $data['success'] = 'Message Sent Successfully';
                $this->load->model('GamesModel');

                $data['all_games'] = $this->GamesModel->fetch_all();

                $this->load->view('templates/site_header', $data);
                $this->load->view('site_pages/contact', $data);
                $this->load->view('templates/site_footer', $data);
            } else {
                
                redirect(site_url());
                
            }

           
        }

        public function update_customer_profile(){

            if ($this->session->userdata('logged_in_as')!='customer') {
                
                redirect(site_url());
                
            }

            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');            
            $email = $this->input->post('email');        
            $mobile_number = $this->input->post('mobile_number');            
            $city = $this->input->post('city');            
            $pincode = $this->input->post('pincode');      
            $state = $this->input->post('state');     
            $country = $this->input->post('country');        
            
            $objToUpdate = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'mobile_number' => $mobile_number,
                'city' => $city,
                'country' => $country,
                'pincode' => $pincode,
                'state' => $state
            );

            $customerUpdated = $this->AuthModel->update_customer($objToUpdate);
            $this->load->model('GamesModel');	
            
            $this->load->model('RefferalModel');		


            if($customerUpdated){
                
                $objToUpdate['logged_in_as'] = 'customer';
                
                $this->session->set_userdata( $objToUpdate );

                
                $data['title'] = 'My Account';
                $data['error'] = '';
                $data['success'] = 'Customer Profile updated successfully';
    
                $data['all_games'] = $this->GamesModel->fetch_all();
                
                $data['reffered_customers'] = $this->RefferalModel->fetch_all_reffered();
                $customerData = $this->AuthModel->fetch_customer_data_by_id($_SESSION['id']);

                $data['customerData'] = $customerData;
                $data['purchased'] = $customerData['purchased'];
    
                $this->load->view('templates/site_header', $data);			
                $this->load->view('site_pages/my_account', $data);
                $this->load->view('templates/site_footer', $data);	
                
                
            }else {
    
                $data['title'] = 'My Account';
                $data['error'] = 'Customer Profile not updated';
                $data['success'] = '';
    
                $this->load->model('RefferalModel');
                $data['all_games'] = $this->GamesModel->fetch_all();

                
                $data['reffered_customers'] = $this->RefferalModel->fetch_all_reffered();
    
                $this->load->view('templates/site_header', $data);			
                $this->load->view('site_pages/my_account', $data);
                $this->load->view('templates/site_footer', $data);	
            }

        }

        public function create_customer_account(){

            $fname = $this->input->post('enteredFirstName');
            $lname = $this->input->post('enteredLastName');
            $enteredPwd = $this->input->post('enteredPassword');
            $enterdMobileNumber = $this->input->post('mobile_number');

            $verifiedEmail = $this->input->post('email_verified');

            if(!isset($_COOKIE['parent-reff-code'])){
                $parent = 'independent';
            }else {
                $parent = $_COOKIE['parent-reff-code'];
            }
            $reffCode = uniqid();
            $newCustomerObj = array(
                'first_name' => $fname,
                'last_name' => $lname,
                'email' => $verifiedEmail,
                'password' => password_hash($enteredPwd,PASSWORD_DEFAULT),
                'account_auth_by' => 'email',
                'purchased' => 'no',
                'mobile_number' => $enterdMobileNumber,
                'parent_code' => $parent,
                'reff_code' => $reffCode
            );

            $newId = $this->AuthModel->create_customer($newCustomerObj);            

            if ($newId) {
                
                $array = array(
                    'id' => $newId,
                    'reff_code' => $reffCode,
                    'first_name' => $fname,
                    'last_name' => $lname,
                    'email' => $verifiedEmail,
                    'mobile_number' => $enterdMobileNumber,
                    'logged_in_as' => 'customer'
                );
                
                $this->session->set_userdata( $array );

                exit('success');
                
            }else {
                exit('fail');
            }

        }

        public function codeVerifExe(){

            $enteredCode = $this->input->post('entered_code');
            $emailUnderVerif = $this->input->post('email_under_verification');
            
            $md5Hash = md5($enteredCode);

            $otpData = $this->AuthModel->fetch_otp($emailUnderVerif);


            if (md5($otpData['otp'])==$md5Hash) {
            
                $this->AuthModel->delete_otp($emailUnderVerif);

                exit('success');
            
            } else {
                exit('failure');
            }
            
        }

        public function emailVerif(){

            $email = $this->input->post('email_address_entered');

            $customerExists = $this->AuthModel->fetch_customer_data_by_email($email);
            
            if ($customerExists) {
                exit('customer-exists');
            }

            $existingOtpData = $this->AuthModel->fetch_otp($email);

            if ($existingOtpData) {
                
                $random = $existingOtpData['otp'];
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://origamers.com/email-verification-api",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('email' => $email,'code' => $random),
                CURLOPT_HTTPHEADER => array(
                    "Cookie: __cfduid=dcdaa12686f170fa9f59f5fef1d791a6e1602233984; ci_session=b4833f5e884236952dff7a31ec72a8985320d8d2"
                ),
                ));
    
                $emailSent = curl_exec($curl);
    
                curl_close($curl);
                
                
            } else {
                
                $random = rand(100000,999900);
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://origamers.com/email-verification-api",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('email' => $email,'code' => $random),
                CURLOPT_HTTPHEADER => array(
                    "Cookie: __cfduid=dcdaa12686f170fa9f59f5fef1d791a6e1602233984; ci_session=b4833f5e884236952dff7a31ec72a8985320d8d2"
                ),
                ));
    
                $emailSent = curl_exec($curl);
    
                curl_close($curl);

                $this->AuthModel->save_otp($email,$random);
                    
            }

            if ($emailSent) {
                $_SESSION['email_under_verification'] = $email;
                exit('success');
            } else {
                exit('failure');
            }
            

        }

        private function sendVerificationEmail($recieverEmail,$code){

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $from = "OriGamers email_verification@origamers.com";

            // Create email headers
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();

            $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head> <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> <title>Verify your email address</title> <style type="text/css" rel="stylesheet" media="all"> /* Base ------------------------------ */ *:not(br):not(tr):not(html){font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;}body{width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F5F7F9; color: #0a0a0a; -webkit-text-size-adjust: none;}a{color: #414EF9;}/* Layout ------------------------------ */ .email-wrapper{width: 100%; margin: 0; padding: 0; background-color: #F5F7F9;}.email-content{width: 100%; margin: 0; padding: 0;}/* Masthead ----------------------- */ .email-masthead{padding: 25px 0; text-align: center;}.email-masthead_logo{max-width: 400px; border: 0;}.email-masthead_name{font-size: 16px; font-weight: bold; color: #839197; text-decoration: none; text-shadow: 0 1px 0 white;}/* Body ------------------------------ */ .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #E7EAEC; border-bottom: 1px solid #E7EAEC; background-color: #FFFFFF;}.email-body_inner{width: 570px; margin: 0 auto; padding: 0;}.email-footer{width: 570px; margin: 0 auto; padding: 0; text-align: center;}.email-footer p{color: #839197;}.body-action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}.body-sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #E7EAEC;}.content-cell{padding: 35px;}.align-right{text-align: right;}/* Type ------------------------------ */ h1{margin-top: 0; color: #292E31; font-size: 19px; font-weight: bold; text-align: left;}h2{margin-top: 0; color: #292E31; font-size: 16px; font-weight: bold; text-align: left;}h3{margin-top: 0; color: #292E31; font-size: 14px; font-weight: bold; text-align: left;}p{margin-top: 0; color: #839197; font-size: 16px; line-height: 1.5em; text-align: left;}p.sub{font-size: 12px;}p.center{text-align: center;}/* Buttons ------------------------------ */ .button{display: inline-block; width: 200px; background-color: #414EF9; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 45px; text-align: center; text-decoration: none; -webkit-text-size-adjust: none; mso-hide: all;}.button--green{background-color: #28DB67;}.button--red{background-color: #FF3665;}.button--blue{background-color: #414EF9;}/*Media Queries ------------------------------ */ @media only screen and (max-width: 600px){.email-body_inner, .email-footer{width: 100% !important;}}@media only screen and (max-width: 500px){.button{width: 100% !important;}}</style></head><body> <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0"> <tr> <td align="center"> <table class="email-content" width="100%" cellpadding="0" cellspacing="0"> <tr> <td class="email-masthead"> <a class="email-masthead_name">Origamers</a> </td></tr><tr> <td class="email-body" width="100%"> <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"> <tr> <td class="content-cell"> <h1>Verify your email address</h1> <p>Thanks for signing up for Origamers! We"re excited to have you on our website.</p><table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0"> <tr> <td align="center"> <div> <p>Please enter the Code : '.$code.' on our website to verify your Email Address</p></div></td></tr></table> <p>Thanks,<br>The Origamers Team</p><table class="body-sub"> <tr> <td> <p class="sub"></p></td></tr></table> </td></tr></table> </td></tr><tr> <td> <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"> <tr> <td class="content-cell"> <p class="sub center"> Origamers. <br>Nagpur, India </p></td></tr></table> </td></tr></table> </td></tr></table></body></html>';
                
            $res = mail($recieverEmail,"Email Verification",$body,$headers);

            if ($res) {
                exit('success');
            } else {
                exit('fail');
            }
            

        }

        public function sendVerificationEmailx(){

            $recieverEmail = $this->input->post('email');
            
            $code = $this->input->post('code');

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $from = "OriGamers email_verification@origamers.com";

            // Create email headers
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();

            $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head> <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> <title>Verify your email address</title> <style type="text/css" rel="stylesheet" media="all"> /* Base ------------------------------ */ *:not(br):not(tr):not(html){font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;}body{width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F5F7F9; color: #0a0a0a; -webkit-text-size-adjust: none;}a{color: #414EF9;}/* Layout ------------------------------ */ .email-wrapper{width: 100%; margin: 0; padding: 0; background-color: #F5F7F9;}.email-content{width: 100%; margin: 0; padding: 0;}/* Masthead ----------------------- */ .email-masthead{padding: 25px 0; text-align: center;}.email-masthead_logo{max-width: 400px; border: 0;}.email-masthead_name{font-size: 16px; font-weight: bold; color: #839197; text-decoration: none; text-shadow: 0 1px 0 white;}/* Body ------------------------------ */ .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #E7EAEC; border-bottom: 1px solid #E7EAEC; background-color: #FFFFFF;}.email-body_inner{width: 570px; margin: 0 auto; padding: 0;}.email-footer{width: 570px; margin: 0 auto; padding: 0; text-align: center;}.email-footer p{color: #839197;}.body-action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}.body-sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #E7EAEC;}.content-cell{padding: 35px;}.align-right{text-align: right;}/* Type ------------------------------ */ h1{margin-top: 0; color: #292E31; font-size: 19px; font-weight: bold; text-align: left;}h2{margin-top: 0; color: #292E31; font-size: 16px; font-weight: bold; text-align: left;}h3{margin-top: 0; color: #292E31; font-size: 14px; font-weight: bold; text-align: left;}p{margin-top: 0; color: #839197; font-size: 16px; line-height: 1.5em; text-align: left;}p.sub{font-size: 12px;}p.center{text-align: center;}/* Buttons ------------------------------ */ .button{display: inline-block; width: 200px; background-color: #414EF9; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 45px; text-align: center; text-decoration: none; -webkit-text-size-adjust: none; mso-hide: all;}.button--green{background-color: #28DB67;}.button--red{background-color: #FF3665;}.button--blue{background-color: #414EF9;}/*Media Queries ------------------------------ */ @media only screen and (max-width: 600px){.email-body_inner, .email-footer{width: 100% !important;}}@media only screen and (max-width: 500px){.button{width: 100% !important;}}</style></head><body> <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0"> <tr> <td align="center"> <table class="email-content" width="100%" cellpadding="0" cellspacing="0"> <tr> <td class="email-masthead"> <a class="email-masthead_name">Origamers</a> </td></tr><tr> <td class="email-body" width="100%"> <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"> <tr> <td class="content-cell"> <h1>Verify your email address</h1> <p>Thanks for signing up for Origamers! We"re excited to have you on our website.</p><table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0"> <tr> <td align="center"> <div> <p>Please enter the Code : '.$code.' on our website to verify your Email Address</p></div></td></tr></table> <p>Thanks,<br>The Origamers Team</p><table class="body-sub"> <tr> <td> <p class="sub"></p></td></tr></table> </td></tr></table> </td></tr><tr> <td> <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"> <tr> <td class="content-cell"> <p class="sub center"> Origamers. <br>Nagpur, India </p></td></tr></table> </td></tr></table> </td></tr></table></body></html>';
                
            $res = mail($recieverEmail,"Email Verification",$body,$headers);

            if ($res) {
                exit('success');
            } else {
                exit('fail');
            }
            

        }

        public function fetch_otp_api(){
            $otpentered = $this->input->post('entered_code');
            $otpData = $this->AuthModel->fetch_otp();
            if ($otpData) {
                exit('verified');
            } else {
                exit('verification-fail');
            }
        }

    
        public function admin_login_exe()
        {
            
            if ($this->session->userdata('logged_in_as')=='admin') {
            
                redirect(site_url('admin-dashboard'));

            }else {
            
                $entered_username = $this->input->post('admin-username');
                $entered_password = $this->input->post('admin-password');

                if ($entered_username!=''&&$entered_password!='') {


                    $adminData = $this->AuthModel->fetch_admin_data_by_username($entered_username);

                    if ($adminData) {
                        
                        $passwordCorrect = password_verify($entered_password,$adminData['password']);

                        if ($passwordCorrect) {
                            
                            
                            $array = array(

                                'first_name' => $adminData['first_name'],
                                'last_name' => $adminData['last_name'],
                                'username' => $adminData['username'],
                                'logged_in_as' => 'admin'
                            );
                            
                            $this->session->set_userdata( $array );

                            
                            redirect(site_url('admin-dashboard'));
                            

                        } else {
                        
                            $data['title'] = 'Admin Login';
                            $data['success'] = ''; 
                            $data['error'] = 'Please username is incorrect';
                        
                            $this->load->view('templates/site_header', $data);
                            $this->load->view('site_pages/admin_login', $data);
                            $this->load->view('templates/site_footer', $data);
                        
                        }
                        
                        
                    } else {
                        
                        $data['title'] = 'Admin Login';
                        $data['success'] = ''; 
                        $data['error'] = 'Please username is incorrect';
                    
                        $this->load->view('templates/site_header', $data);
                        $this->load->view('site_pages/admin_login', $data);
                        $this->load->view('templates/site_footer', $data);

                    }
                    
                } else {
                    
                    $data['title'] = 'Admin Login';
                    $data['success'] = ''; $data['error'] = 'Please enter both username and password';
                
                    $this->load->view('templates/site_header', $data);
                    $this->load->view('site_pages/admin_login', $data);
                    $this->load->view('templates/site_footer', $data);
                    
                }
                



            }

        }

        public function admin_logout(){
            if ($this->session->userdata('logged_in_as')!='admin') {
                
                redirect(site_url('admin-login'));
                
            } else {

                
                $this->session->sess_destroy();
                
                
                redirect(site_url('admin-login'));
                
                
            }
        }

        public function customer_logout(){
            if ($this->session->userdata('logged_in_as')!='customer') {
                
                redirect(site_url());
                
            } else {

                
                $this->session->sess_destroy();
                
                
                redirect(site_url());
                
                
            }
        }

        public function facebookLoginExe(){

            $fb = new Facebook\Facebook([
                'app_id' => '374382520391569',
                'app_secret' => '0cab316d510044d0ccf0eed63a9608b9',
                'default_graph_version' => 'v2.10',
                ]);
    
            $helper = $fb->getRedirectLoginHelper();

            $accessToken = $helper->getAccessToken();


           

            if (! isset($accessToken)) {
                echo '<script>alert("Please allow facebook access for login"); </script>';
            }

            $response = $fb->get('/me', $accessToken);

            // print_r($response);

            $me = $response->getGraphUser();


            echo $full_name = $me->getName(); 

        }
       
        public function email_login_exe(){

            $customerEmail = $this->input->post('customer-email');
            $customerPassword = $this->input->post('customer-password');

            $clientID = '627783576646-m10djg85fun4k3q653ti16dc88191j69.apps.googleusercontent.com';
            $clientSecret = 'iiF2s97KwPIwYNEAv1G7H4KP';
            $redirectUri = site_url('google-login-exe');
            
            // create Client Request to access Google API
            $client = new Google_Client();
            $client->setClientId($clientID);
            $client->setClientSecret($clientSecret);
            $client->setRedirectUri($redirectUri);
            $client->addScope("email");
            $client->addScope("profile"); 
            
            $googleLoginUrl = $client->createAuthUrl();

            if ($customerEmail==''||$customerPassword=='') {
                
                $data['title'] = 'Customer Login';
                $data['googleLoginUrl'] = $googleLoginUrl;
                $data['error'] = 'Please enter both email and password';

                $this->load->view('templates/site_header', $data);			
                $this->load->view('site_pages/customer_login', $data);
                $this->load->view('templates/site_footer', $data);	

            } else {
                
                $customerData = $this->AuthModel->fetch_customer_data_by_email($customerEmail);

                if ($customerData) {
                    
                    $passwordCorrect = password_verify($customerPassword,$customerData['password']);

                    if ($passwordCorrect) {
                        
                        
                        $array = array(
                            'id' => $customerData['id'],
                            'first_name' => $customerData['first_name'],
                            'last_name' => $customerData['last_name'],
                            'email' => $customerData['email'],
                            'reff_code' => $customerData['reff_code'],
                            'mobile_number' => $customerData['mobile_number'],
                            'logged_in_as' => 'customer'
                        );
                        
                        $this->session->set_userdata( $array );
                        
                        
                        redirect(site_url('my-account'));
                        

                    } else {
                        $data['title'] = 'Customer Login';
                        $data['googleLoginUrl'] = $googleLoginUrl;
                        $data['error'] = 'Password is incorrect';

                        $this->load->view('templates/site_header', $data);			
                        $this->load->view('site_pages/customer_login', $data);
                        $this->load->view('templates/site_footer', $data);	
                    }
                    

                } else {
                    
                    $data['title'] = 'Customer Login';
                    $data['googleLoginUrl'] = $googleLoginUrl;
                    $data['error'] = 'Email is incorrect';
    
                    $this->load->view('templates/site_header', $data);			
                    $this->load->view('site_pages/customer_login', $data);
                    $this->load->view('templates/site_footer', $data);	    

                }

            }
        }

        public function googleLoginExe(){

            $clientID = '627783576646-m10djg85fun4k3q653ti16dc88191j69.apps.googleusercontent.com';
            $clientSecret = 'iiF2s97KwPIwYNEAv1G7H4KP';
            $redirectUri = site_url('google-login-exe');
            
            // create Client Request to access Google API
            $client = new Google_Client();
            $client->setClientId($clientID);
            $client->setClientSecret($clientSecret);
            $client->setRedirectUri($redirectUri);
            $client->addScope("email");
            $client->addScope("profile");
            
            // authenticate code from Google OAuth Flow
            if (isset($_GET['code'])) {
                
                $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                $client->setAccessToken($token['access_token']);
                
                // get profile info
                $google_oauth = new Google_Service_Oauth2($client);
                $google_account_info = $google_oauth->userinfo->get();
                
                $email =  $google_account_info->email;
                $name =  $google_account_info->name;
                
                $nameArray = explode(' ',$name);

                $fname = $nameArray[0]; $lname = $nameArray[1]; 

                $accountExists = $this->AuthModel->fetch_customer_data_by_email($email);

                if ($accountExists) {
                    
                    $array = array(
                        'id' => $accountExists['id'],
                        'first_name' => $accountExists['first_name'],
                        'last_name' => $accountExists['last_name'],
                        'email' => $accountExists['email'],
                        'mobile_number' => $accountExists['mobile_number'],
                        'logged_in_as' => 'customer',
                        'reff_code' => $accountExists['reff_code'],
                    );
                    
                    $this->session->set_userdata( $array );

                    
                    redirect(site_url());
                    
                    
                } else {

                    if(!isset($_COOKIE['parent-reff-code'])){
                        $parent = 'independent';
                    }else {
                        $parent = $_COOKIE['parent-reff-code'];
                    }

                    $newCustomerObj = array(
                        'first_name' => $fname,
                        'last_name' => $lname,
                        'email' => $email,
                        'account_auth_by' => 'google_login',
                        'purchased' => 'no',
                        'parent_code' => $parent,
                        'reff_code' => uniqid()
                    );

                    $encryptedNewCustomerData = openssl_encrypt(json_encode($newCustomerObj),'BF-CBC','ratnesh47',0,94949494);
                    setcookie('googleVerifCustomerData',$encryptedNewCustomerData,time()+24*300);

                    $data['title'] = 'Create Account ';
                    $data['customerData'] = $newCustomerObj;

                    $this->load->view('templates/site_header', $data);
                    $this->load->view('site_pages/create_google_verified_account', $data);
                    $this->load->view('templates/site_footer', $data);
                    

                }
                
            
            }else {
                
                redirect(site_url('customer-login'));
                
            }

        }


        public function create_customer_account_google(){

            if($this->session->userdata('type')=='customer'||$this->session->userdata('type')=='admin'){
                
                redirect(site_url('customer-login'));
                
            }else{

                $customerDataSaved = $_COOKIE['googleVerifCustomerData'];

                $customerDataDecryptedJson = openssl_decrypt($customerDataSaved,'BF-CBC','ratnesh47',0,94949494);

                $customerDataDecryptedObj = json_decode($customerDataDecryptedJson,TRUE);

                

                $customerMobileNumber = $this->input->post('mobileNumber');
                
                $customerDataDecryptedObj['mobile_number'] = $customerMobileNumber;
                

                $created = $this->AuthModel->create_customer($customerDataDecryptedObj);

                $customerDataDecryptedObj['logged_in_as'] = 'customer';


                if($created){

                    $customerDataDecryptedObj['id'] = $created;

                    $this->session->set_userdata( $customerDataDecryptedObj );
                    
                    
                    redirect(site_url('my-account'));
                    
                    
                }else{
                    
                    
                    redirect(site_url('customer-login'));
                    
                    
                }

            }

        }
    
    }
    
    /* End of file Authentication.php */
    