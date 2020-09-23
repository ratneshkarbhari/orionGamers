<?php

    require_once './vendor/autoload.php'; // change path as needed


    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Authentication extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('AuthModel');
            
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
                            'first_name' => $customerData['first_name'],
                            'last_name' => $customerData['last_name'],
                            'email' => $customerData['email'],
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
                        'logged_in_as' => 'customer',
                        'reff_code' => $accountExists['reff_code'],
                    );
                    
                    $this->session->set_userdata( $array );

                    
                    redirect(site_url('my-account'));
                    
                    
                } else {

                    if ($_COOKIE['reff-code']) {
                        $parent = $_COOKIE['reff-code'];
                    } else {
                        $parent = 'independent';
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

                    $newId = $this->AuthModel->create_customer($newCustomerObj);

                    
                    
                    
                    $array = array(
                        'id' => $newId,
                        'first_name' => $fname,
                        'last_name' => $lname,
                        'email' => $email,
                        'reff_code' => $newCustomerObj['reff_code'],
                        'logged_in_as' => 'customer'
                    );
                    
                    $this->session->set_userdata( $array );
                }
                
                
                

                
                redirect(site_url('my-account'));
                
                
            
            }else {
                
                redirect(site_url('customer-login'));
                
            }

        }
    
    }
    
    /* End of file Authentication.php */
    