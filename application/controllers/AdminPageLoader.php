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
    