<?php

	require_once './vendor/autoload.php'; // change path as needed


	use Razorpay\Api\Api;
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class SitePageLoader extends CI_Controller {
	

		
		public function __construct()
		{


			parent::__construct();
			if(isset($_GET['parent_reff_code'])){
				setcookie('parent-reff-code', $_GET['parent_reff_code'], time() + (86400 * 30), "/"); 
				
				redirect(site_url());
				
			}
		}

		public function how_it_works()
		{
			$data['title'] = 'How it Works';
			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();

			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/how_it_works', $data);
			$this->load->view('templates/site_footer', $data);

		}
		
		public function contact()
		{
			$data['title'] = 'Contact';
			$data['success'] = '';
			$this->load->model('GamesModel');

			$data['all_games'] = $this->GamesModel->fetch_all();

			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/contact', $data);
			$this->load->view('templates/site_footer', $data);

		}
		

		public function home()
		{
			$data['title'] = 'Tagline';
			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();

			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/home', $data);
			$this->load->view('templates/site_footer', $data);
		}

		public function privacy_policy(){
			$data['title'] = 'Privacy Policy';
			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();
			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/privacy_policy', $data);
			$this->load->view('templates/site_footer', $data);
		}



		public function game_details($slug)
		{
			$this->load->model('GameProductsModel');			

			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();

			$data['game'] = $this->GamesModel->fetch_game_by_slug($slug);
			$data['game_products'] = $this->GameProductsModel->fetch_all_for_game($data['game']['id']);

			$data['title'] = $data['game']['title'];

			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/game_details', $data);
			$this->load->view('templates/site_footer', $data);

		}

		public function thank_you(){


			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();

			$this->load->model('AuthModel');
			
			$data['title'] = 'Thank you for the purchase';
			$customerData = $this->AuthModel->fetch_customer_data_by_email($_SESSION['email']);
			$data['reff_code'] = $customerData['reff_code'];

			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/thank_you', $data);
			$this->load->view('templates/site_footer', $data);
		}


		public function buy_now()
		
		{

			if ($this->session->userdata('logged_in_as')!='customer') {
				
				redirect(site_url('customer-login'));
				
			}

			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();
			$this->load->model('GameProductsModel');			
			$gameProductId = $this->input->post('game-product');
			$gameProductData = $this->GameProductsModel->fetch_by_id($gameProductId);
			if ($gameProductData) {
				
				$data['title'] = 'Buy '.$gameProductData['title'];
				$data['game_details'] = $gameProductData;

				$api = new Api('rzp_live_zxrps8h6nsCw9a', 'zOUBfQo0ZR9GkiSVrHVyuXIu');

				$order = $api->order->create(array(  'receipt' => rand(1000,9999),  'amount' => $gameProductData['sale_price']*100,  'currency' => 'INR' ,         'payment_capture' => 1 // auto capture
				));

	
				$data['orderData'] = $order;


				$this->load->view('templates/site_header', $data);
				$this->load->view('site_pages/buy_now', $data);
				$this->load->view('templates/site_footer', $data);
			} else {
				redirect(site_url());
			}
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

			if ($this->session->userdata('logged_in_as')=='customer') {
				
				redirect(site_url('my-account'));
				
			}

			// $fb = new Facebook\Facebook([
			// 'app_id' => '374382520391569',
			// 'app_secret' => '0cab316d510044d0ccf0eed63a9608b9',
			// 'default_graph_version' => 'v2.10',
			// ]);

			// $helper = $fb->getRedirectLoginHelper();

			// $permissions = ['email']; // Optional permissions
			// $loginUrl = $helper->getLoginUrl(site_url('fb-login-exe'), $permissions);

			// $data['fbLoginUrl'] = $loginUrl;

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


			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();

			$data['title'] = 'Customer Login';
			$data['googleLoginUrl'] = $googleLoginUrl;
			$data['error'] = '';


			$this->load->view('templates/site_header', $data);			
			$this->load->view('site_pages/customer_login', $data);
			$this->load->view('templates/site_footer', $data);			
			

		}

		public function tnc(){
			$data['title'] = 'Terms and Conditions';
			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();
			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/tnc', $data);
			$this->load->view('templates/site_footer', $data);
		}

		public function my_account(){

			if ($this->session->userdata('logged_in_as')!='customer') {
				redirect(site_url('customer-login'));
			}

			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();

			$data['title'] = 'My Account';
			$data['error'] = $data['success'] = '';

			$this->load->model('RefferalModel');
			
			$this->load->model('AuthModel');
			
			$customerData = $this->AuthModel->fetch_customer_data_by_id($_SESSION['id']);

			$data['customerData'] = $customerData;
			$data['purchased'] = $customerData['purchased'];
			

			$data['reffered_customers'] = $this->RefferalModel->fetch_all_reffered();

			$this->load->view('templates/site_header', $data);			
			$this->load->view('site_pages/my_account', $data);
			$this->load->view('templates/site_footer', $data);	
		}

		public function forgot_pwd(){
			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();

			$data['title'] = 'Forgot Password';
			$data['error'] = '';

			$this->load->view('templates/site_header', $data);			
			$this->load->view('site_pages/forgot_pwd', $data);
			$this->load->view('templates/site_footer', $data);			

		}
	
	}
	
	/* End of file Controllername.php */
	