<?php

	require_once './vendor/autoload.php'; // change path as needed

	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class SitePageLoader extends CI_Controller {
	
		public function home()
		{
			$data['title'] = 'Tagline';
			
			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/home', $data);
			$this->load->view('templates/site_footer', $data);
		}

		public function privacy_policy(){
			$data['title'] = 'Privacy Policy';
			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/privacy_policy', $data);
			$this->load->view('templates/site_footer', $data);
		}

		public function login_register()
		{
			
		}

		public function all_games()
		{
			
		}

		public function game_details()
		{
			
		}

		public function checkout()
		{
			
		}

		public function account()
		{
			
		}

		public function admin_login(){

			if ($this->session->userdata('logged_in_as')=='admin') {
				
				
				redirect(site_url('admin-dashboard'));
				
				
			} else {

				$data['title'] = 'Admin Login';
				$data['success'] = $data['error'] = '';
			
				$this->load->view('templates/site_header', $data);
				$this->load->view('site_pages/admin_login', $data);
				$this->load->view('templates/site_footer', $data);

			}
			


		}

		public function customer_login(){

			// $fb = new Facebook\Facebook([
			// 'app_id' => '2668062993460781',
			// 'app_secret' => 'e7eec93c9e6947d971c2d3d151d3c1bf',
			// 'default_graph_version' => 'v2.10',
			// ]);

			// $helper = $fb->getRedirectLoginHelper();

			// $permissions = ['email']; // Optional permissions
			// $loginUrl = $helper->getLoginUrl(site_url('fb-login-exe'), $permissions);

			// $data['loginUrl'] = $loginUrl;

			//google login
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

			$data['title'] = 'Customer Login';
			$data['googleLoginUrl'] = $googleLoginUrl;
			$data['error'] = '';


			$this->load->view('templates/site_header', $data);			
			$this->load->view('site_pages/customer_login', $data);
			$this->load->view('templates/site_footer', $data);			
			

		}
	
	}
	
	/* End of file Controllername.php */
	