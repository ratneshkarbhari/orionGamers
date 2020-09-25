<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class GameProducts extends CI_Controller {


        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('logged_in_as')!='admin') {
                
                redirect(site_url('admin-login'));
                
            }
            $this->load->model('GameProductsModel');

        }
        
    
        public function add_new()
        {

            
            
            $config['upload_path'] = './assets/images/game_product_featured_images';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('featured_image')){
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }else{
                $data = array('upload_data' => $this->upload->data());
                $featured_image_name = $data['upload_data']['file_name'];
            }    

            
            $objectToCreate = array(
                'title' => $this->input->post('title'),
                'slug' => url_title($this->input->post('slug')),
                'parent_game' => $this->input->post('game-id'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('product-price'),
                'sale_price' => $this->input->post('product-sale-price'),
                'featured_image' => $featured_image_name,
            );

            $gameProductCreated = $this->GameProductsModel->create($objectToCreate);

            if ($gameProductCreated) {
            
                $data['title'] = 'Add New game Product';
                $data['success'] = 'Game Product added successfully'; $data['error'] = '';
                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/add_new_game_product', $data);
                $this->load->view('templates/admin_footer', $data);
            
            } else {

                $data['title'] = 'Add New Game product';
                $data['success'] = ''; 
                $data['error'] = 'Game product addition failed';

                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/add_new_game_product', $data);
                $this->load->view('templates/admin_footer', $data);
                
            }
            

        }

        public function delete()
        {
            $gameId = $this->input->post('game-product-id');
            $gameData = $this->GameProductsModel->fetch_by_id($gameId);
            $gameDeleted = $this->GameProductsModel->delete($gameId);
            if ($gameDeleted) {
                $featuredImgLink = './assets/images/game_product_featured_images/'.$gameData['featured_image'];
                if(is_file($featuredImgLink)){
                    unlink($featuredImgLink);
                }
                
                $data['title'] = 'All GameProducts';
                $data['GameProducts'] = $this->GameProductsModel->fetch_all();
                $data['success'] = 'Game Deleted successfully'; $data['error'] = '';

                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/all_game_products', $data);
                $this->load->view('templates/admin_footer', $data);
            } else {
                $data['title'] = 'All GameProducts';
                $data['GameProducts'] = $this->GameProductsModel->fetch_all();
                $data['success'] = ''; $data['error'] = 'Game couldnt be deleted';

                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/all_game_products', $data);
                $this->load->view('templates/admin_footer', $data);
            }
        }

        public function update(){

            // Getting old game data
            $gameProductId = $this->input->post('game-product-id');
            $oldGameProductData = $this->GameProductsModel->fetch_by_id($gameProductId);
        
            // updating featured image if set
            $config['upload_path'] = './assets/images/game_product_featured_images';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('featured_image')){
                $error = array('error' => $this->upload->display_errors());
                $featured_image_name = $oldGameProductData['featured_image'];
            }else{
                $data = array('upload_data' => $this->upload->data());
                $featured_image_name = $data['upload_data']['file_name'];
                unlink('./assets/images/game_product_featured_images/'.$oldGameProductData['featured_image']);
            }

            $objectToCreate = array(
                'title' => $this->input->post('title'),
                'slug' => url_title($this->input->post('slug')),
                'parent_game' => $this->input->post('game-id'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('product-price'),
                'sale_price' => $this->input->post('product-sale-price'),
                'featured_image' => $featured_image_name,
            );

            $gameProductUpdated = $this->GameProductsModel->update($oldGameProductData['id'],$objectToCreate);

            if ($gameProductUpdated) {
                
                $data['title'] = 'Edit game Product';
                $this->load->model('GamesModel');
                $this->load->model('GameProductsModel');
                $data['all_games'] = $this->GamesModel->fetch_all();
                $data['gameProduct'] = $this->GameProductsModel->fetch_by_id($oldGameProductData['id']);
                $data['success'] = 'game product updated'; $data['error'] = '';
                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/edit_game_product', $data);
                $this->load->view('templates/admin_footer', $data);

            } else {
                $data['title'] = 'Edit game Product';
                $this->load->model('GamesModel');
                $this->load->model('GameProductsModel');
                $data['all_games'] = $this->GamesModel->fetch_all();
                $data['gameProduct'] = $this->GameProductsModel->fetch_by_id($oldGameProductData['id']);
                $data['success'] = ''; $data['error'] = 'Game Product not updated';
                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/edit_game_product', $data);
                $this->load->view('templates/admin_footer', $data);
            }
                    
        }

        
        
    }
    
    /* End of file GameProducts.php */
    