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
			$data['all_games'] = $this->GamesModel->fetch_all();

			$data['game'] = $this->GamesModel->fetch_game_by_slug($slug);
			$data['game_products'] = $this->GameProductsModel->fetch_all_for_game($data['game']['id']);

			$data['title'] = $data['game']['title'];

			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/game_details', $data);
			$this->load->view('templates/site_footer', $data);

		}

		public function thank_you(){


			

			$this->load->driver('cache');

			$sessiondata = $this->cache->file->get('sessiondata');

			$productID = $this->cache->file->get('checkout_product');


		

			$this->session->set_userdata( $sessiondata );

			
			$this->load->model('GamesModel');			

			$data['all_games'] = $this->GamesModel->fetch_all();

			$this->session->set_userdata( $sessiondata );

			$this->load->model('AuthModel');			

			$customerData = $this->AuthModel->fetch_customer_data_by_email($sessiondata['email']);

			
						
			$orderId = $_POST["orderId"];
			$orderAmount = $_POST["orderAmount"];
			$referenceId = $_POST["referenceId"];
			$txStatus = $_POST["txStatus"];
			$paymentMode = $_POST["paymentMode"];
			$txMsg = $_POST["txMsg"];
			$txTime = $_POST["txTime"];
			$signature = $_POST["signature"];
			$data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
			$hash_hmac = hash_hmac('sha256', $data, "acfee4a71bbf8d867cf458af2a2d6688980015fc", true);
			$computedSignature = base64_encode($hash_hmac);

			if (TRUE) {

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


				$this->load->view('templates/site_header', $data);
				$this->load->view('site_pages/thank_you', $data);
				$this->load->view('templates/site_footer', $data);

			}else {
				
				redirect(site_url());

			}

		}



		


		public function buy_now()
		
		{

			if ($this->session->userdata('logged_in_as')!='customer') {
				
				redirect(site_url('customer-login'));
				
			}




			$this->load->driver('cache');
			$this->cache->file->save('sessiondata', $_SESSION, 300);


			$this->load->model('GamesModel');			
			$data['all_games'] = $this->GamesModel->fetch_all();
			$this->load->model('GameProductsModel');			
			$gameProductId = $this->input->post('game-product');

			$gameProductData = $this->GameProductsModel->fetch_by_id($gameProductId);

			$this->cache->file->save('checkout_product', $gameProductId, 300);


			$data['title'] = "Buy ".$gameProductData['title']."now";
			$data['gameProductData'] = $gameProductData;

			$curl = curl_init();

			$secretKey = "acfee4a71bbf8d867cf458af2a2d6688980015fc";
			$appId = "33090190a25fd481164ee1c1c09033";

			// $testAppId = '10717636b552ee8cd7b6e73b671701';
			// $testAppSecret = '32b8d8ef1490337651b74b4d68be03f825035d6c';

			$orderId = rand(1000,9999);

			curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.cashfree.com/api/v1/order/create",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => array('appId' => ''.$appId.'','secretKey' => ''.$secretKey.'','orderId' => ''.$orderId.'','orderAmount' => '2','orderCurrency' => 'INR','orderNote' => 'Test Note','customerEmail' => ''.$this->session->userdata('email').'','customerName' => ''.$this->session->userdata('first_name').' '.$this->session->userdata('last_name').'','customerPhone' => ''.$this->session->userdata('mobile_number').'','returnUrl' => ''.site_url('thank-you').''),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			$decodedResponse = json_decode($response,TRUE);
			$data['paymentLink'] = $paymentUrl = $decodedResponse['paymentLink'];

			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/buy_now', $data);
			$this->load->view('templates/site_footer', $data);

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
	