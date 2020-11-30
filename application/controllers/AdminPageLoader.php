<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AdminPageLoader extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('logged_in_as')!='admin') {
                
                redirect(site_url('admin-login'));
                
            }
        }

        public function manage_yt_videos(){

            $this->load->model('YtModel');
            

            $data['title'] = 'All Videos';
            $data['videos'] = $this->YtModel->fetch_all();
            $data['success'] = $data['error'] = '';

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/manage_yt_videos', $data);
            $this->load->view('templates/admin_footer', $data);


        }

        public function see_all_transactions(){

            $this->load->model('TransactionModel');

            $data['title'] = 'All Transactions';
            $data['all_transactions'] = $this->TransactionModel->fetch_all();
            $data['success'] = $data['error'] = '';

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/all_transactions', $data);
            $this->load->view('templates/admin_footer', $data);

        }

        public function all_google_play_credit_request(){

            $data['title'] = 'All Google Play Credit Requests';
            $this->load->model('TransactionModel');
            $this->load->model('AuthModel');
            $data['google_play_credit_requests'] = $this->TransactionModel->fetch_all_google_play_credit_requests();

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/all_google_play_credit_requests', $data);
            $this->load->view('templates/admin_footer', $data);

        }

        public function transaction_details($id){

            $this->load->model('TransactionModel');
            $this->load->model('GameProductsModel');
            $this->load->model('AuthModel');
            $data ['transaction'] = $transaction = $this->TransactionModel->fetch_transaction_details_by_id($id);
            $data['customer'] = $this->AuthModel->fetch_customer_data_by_email($transaction['payee_customer_email']);
            $data['product'] = $this->GameProductsModel->fetch_by_id($transaction['product_id']);
            $data['title'] = 'Details for transaction id: '.$id;

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/transaction_details', $data);
            $this->load->view('templates/admin_footer', $data);

        }

        public function edit_game_product($slug){
            $data['title'] = 'Edit game Product';
            $this->load->model('GamesModel');
            $this->load->model('GameProductsModel');
            $data['all_games'] = $this->GamesModel->fetch_all();
            $data['gameProduct'] = $this->GameProductsModel->fetch_game_by_slug($slug);
            $data['success'] = $data['error'] = '';

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/edit_game_product', $data);
            $this->load->view('templates/admin_footer', $data);
        }
        
        public function add_new_game_product(){
            $data['title'] = 'Add New game Product';
            $this->load->model('GamesModel');
            $data['all_games'] = $this->GamesModel->fetch_all();
            $data['success'] = $data['error'] = '';
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/add_new_game_product', $data);
            $this->load->view('templates/admin_footer', $data);
        }

        public function dashboard()
        {
            $data['title'] = 'Admin Dashboard';
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/dashboard', $data);
            $this->load->view('templates/admin_footer', $data);
        }

        public function all_games()
        {
            $this->load->model('GamesModel');
            $data['title'] = 'All Games';
            $data['games'] = $this->GamesModel->fetch_all();
            $data['success'] = $data['error'] = '';

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/all_games', $data);
            $this->load->view('templates/admin_footer', $data);
        }

        public function edit_game($slug){
            $this->load->model('GamesModel');
            $data['title'] = 'Edit Game';
            $data['game'] = $this->GamesModel->fetch_game_by_slug($slug);
            $data['success'] = $data['error'] = '';

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/edit_game', $data);
            $this->load->view('templates/admin_footer', $data);
        }

        public function all_game_products()
        {
            $this->load->model('GameProductsModel');
            $data['title'] = 'All Game Products';
            $data['game_products'] = $this->GameProductsModel->fetch_all();
            $data['success'] = $data['error'] = '';

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/all_game_products', $data);
            $this->load->view('templates/admin_footer', $data);
        }
        
        public function add_new_game(){
            $data['title'] = 'Add New Game';
            $data['success'] = $data['error'] = '';

            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin_pages/add_new_game', $data);
            $this->load->view('templates/admin_footer', $data);
        }

    }
    
    /* End of file AdminPageLoader.php */
    