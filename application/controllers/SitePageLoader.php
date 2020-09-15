<?php

	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class SitePageLoader extends CI_Controller {
	
		public function home()
		{
			$data['title'] = 'Tagline';
			
			$this->load->view('templates/site_header', $data);
			$this->load->view('site_pages/home', $data);
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
	
	}
	
	/* End of file Controllername.php */
	