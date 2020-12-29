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


		private function public_page_loader($view,$data){

			$this->load->driver('cache', array('adapter' => 'file'));


			if ( ! $games = $this->cache->get('games'))
			{
				
				$this->load->model('GamesModel');			
				$games = $this->GamesModel->fetch_all();
				// Save into the cache for 5 minutes
				$this->cache->save('games', $games, (24*3600));
			}else {
				$games = $this->cache->get('games');			
			}

			$data['all_games'] = $games;

			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/'.$view, $data);
			$this->load->view('templates/site_footer', $data);
		}

		public function how_it_works()
		{
			$data['title'] = 'How it Works';


			$this->public_page_loader('how_it_works',$data);

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
			$this->load->model('YtModel');
			
			$data['title'] = 'More than just a Game';
			$data['videos'] = $this->YtModel->fetch_all();
			$this->public_page_loader('home',$data);

		}

		public function privacy_policy(){
			$data['title'] = 'Privacy Policy';
			$this->public_page_loader('privacy_policy',$data);
		}

		public function payment_response(){

			
			if ($this->session->userdata('logged_in_as')!='customer') {
				
				redirect(site_url('customer-login'));
				
			}

			$this->load->driver('cache');

			$sessiondata = $this->cache->get('sessiondata');

			session_set_userdata($sessiondata);

			$orderId = $_POST["orderId"];
			$orderAmount = $_POST["orderAmount"];
			$referenceId = $_POST["referenceId"];
			$txStatus = $_POST["txStatus"];
			$paymentMode = $_POST["paymentMode"];
			$txMsg = $_POST["txMsg"];
			$txTime = $_POST["txTime"];
			$signature = $_POST["signature"];
			$data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
			$hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
			$computedSignature = base64_encode($hash_hmac);


			// signature verification
			if ($signature==$computedSignature) {
				
				echo 'SessionData Print<br>';
				print_r($_SESSION);
				
			} else {
				
				redirect('signature-failure');
				
			}
			


		}



		public function game_details($slug)
		{
			$this->load->model('GameProductsModel');			

			$this->load->model('GamesModel');

			$data['game'] = $this->GamesModel->fetch_game_by_slug($slug);
			$data['game_products'] = $this->GameProductsModel->fetch_all_for_game($data['game']['id']);

			$data['title'] = $data['game']['title'];


			$this->public_page_loader('game_details',$data);

		}

		public function thank_you(){

			$this->load->driver('cache');

			$sessiondata = $this->cache->file->get('sessiondata');

			$productID = $this->cache->file->get('checkout_product');


		

			$this->session->set_userdata( $sessiondata );

			


			$this->session->set_userdata( $sessiondata );

			$this->load->model('AuthModel');			

			$customerData = $this->AuthModel->fetch_customer_data_by_email($sessiondata['email']);

			if (isset($_POST)) {
				$status=$_POST["status"];
				$firstname=$_POST["firstname"];
				$amount=$_POST["amount"];
				$txnid=$_POST["txnid"];
				$posted_hash=$_POST["hash"];
				$key=$_POST["key"];
				$productinfo=$_POST["productinfo"];
				$email=$_POST["email"];
				$salt="X971ICRWjz";
				$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
				
				$hash = hash("sha512", $retHashSeq);
				if ($hash != $posted_hash) {
					echo "Invalid Transaction. Please try again";
				} else {
					$this->load->model('TransactionModel');
            
					$dataToSave = array(
						'order_id' => $orderId,
						'amount' => $orderAmount,
						'product_id' => $productID,
						'payee_customer_name' => $this->session->userdata('first_name').' '.$this->session->userdata('last_name'),
						'payee_customer_email' => $this->session->userdata('email'),
						'cashfree_signature' => $signature,
						'date' => $txTime,
					);
					
					$transactionSaved = $this->TransactionModel->save($dataToSave);
		
					$saveCurrentProduct = $this->TransactionModel->saveCurrentProduct($productID);
					
					$reffererData = $this->AuthModel->fetch_customer_by_reff_id($customerData['parent_code']);

					if ($reffererData) {
						
						if ($reffererData['current_product']==$productID) {

							$updatePurchasedOnCustomer = $this->TransactionModel->update_purchased($customerData['id'],$productID);					

						}else {
							
							$updatePurchasedOnCustomer = $this->TransactionModel->update_purchased_different($customerData['id'],$productID);			

						}

					} else {

						$updatePurchasedOnCustomer = $this->TransactionModel->update_purchased($customerData['id'],$productID);	

					}

					$data['title'] = 'Thank you';

					$this->public_page_loader('thank_you',$data);
				}
			}

		}

		public function buy_now()		
		{

			if ($this->session->userdata('logged_in_as')!='customer') {
				
				redirect(site_url('customer-login'));
				
			}

			$gameProductId = $this->input->post('game-product');

			$this->load->model("GameProductsModel");

			$gameProductData = $this->GameProductsModel->fetch_by_id($gameProductId);

			$data["gameProductData"] = $gameProductData;
			$data["title"] = 'Buy a Game';

			$this->load->view("templates/site_header",$data);
			$this->load->view("site_pages/buy_now",$data);
			$this->load->view("templates/site_footer",$data);

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




			$data['title'] = 'Customer Login';
			$data['googleLoginUrl'] = $googleLoginUrl;
			$data['error'] = '';


			$this->load->view('templates/site_header', $data);			
			$this->load->view('site_pages/customer_login', $data);
			$this->load->view('templates/site_footer', $data);			
			

		}

		public function tnc(){
			$data['title'] = 'Terms and Conditions';
			
			$this->public_page_loader('tnc',$data);
		}

		public function my_account(){

			if ($this->session->userdata('logged_in_as')!='customer') {
				redirect(site_url('customer-login'));
			}

			$data['title'] = 'My Account';
			$data['error'] = $data['success'] = '';

			$this->load->model('RefferalModel');
			
			$this->load->model('AuthModel');
			
			$customerData = $this->AuthModel->fetch_customer_data_by_id($_SESSION['id']);

			$data['customerData'] = $customerData;
			$data['purchased'] = $customerData['purchased'];
			

			$data['reffered_customers'] = $this->RefferalModel->fetch_all_reffered();

			$this->public_page_loader('my_account',$data);

		}

		public function forgot_pwd(){
			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();

			$data['title'] = 'Forgot Password';
			$data['error'] = '';

			$this->public_page_loader('forgot_pwd',$data);


		}
	
	}
	
	/* End of file Controllername.php */
	