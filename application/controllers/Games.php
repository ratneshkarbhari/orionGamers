<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Games extends CI_Controller {


        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('logged_in_as')!='admin') {
                
                redirect(site_url('admin-login'));
                
            }
        }
        
    
        public function add_new()
        {

            $this->load->model('GamesModel');
            
            
            $config['upload_path'] = './assets/images/game_featured_images';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('featured_image')){
                $error = array('error' => $this->upload->display_errors());
            }else{
                $data = array('upload_data' => $this->upload->data());
                $featured_image_name = $data['upload_data']['file_name'];
            }    

            $sliderImages = $_FILES['slider_images'];

            $configMultiple['upload_path'] = './assets/images/game_slider_images';
            $configMultiple['allowed_types'] = 'gif|jpg|png|jpeg';
            $configMultiple['encrypt_name'] = TRUE;

            $sliderImageNames = array();
            
            $sliderImagesCount = count($sliderImages['name']);

            for ($i=0; $i < $sliderImagesCount; $i++) { 

                $_FILES['slider_image']['name'] = $sliderImages['name'][$i];
                $_FILES['slider_image']['tmp_name'] = $sliderImages['tmp_name'][$i];
                $_FILES['slider_image']['error'] = $sliderImages['error'][$i];
                $_FILES['slider_image']['size'] = $sliderImages['size'][$i];
                $_FILES['slider_image']['type'] = $sliderImages['type'][$i];



                $this->upload->initialize($configMultiple);

                if ( ! $this->upload->do_upload('slider_image')){
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $sliderImageName = $data['upload_data']['file_name'];
                }    



                $sliderImageNames[] = $sliderImageName;               

            }

            $sliderImageNamesJson = json_encode($sliderImageNames);

            $objectToCreate = array(
                'title' => $this->input->post('title'),
                'slug' => url_title($this->input->post('slug')),
                'description' => $this->input->post('description'),
                'featured_image' => $featured_image_name,
                'banner_images' => $sliderImageNamesJson
            );

            $gameCreated = $this->GamesModel->create($objectToCreate);

            if ($gameCreated) {
            
                $data['title'] = 'Add New Game';
                $data['success'] = 'Game Added Successfully'; 
                $data['error'] = '';

                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/add_new_game', $data);
                $this->load->view('templates/admin_footer', $data);
            
            } else {

                $data['title'] = 'Add New Game';
                $data['success'] = ''; 
                $data['error'] = 'Game addition failed';

                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/add_new_game', $data);
                $this->load->view('templates/admin_footer', $data);
                
            }
            

        }

        public function delete()
        {
            $this->load->model('GamesModel');
            $gameId = $this->input->post('game-id');
            $gameData = $this->GamesModel->fetch_game_by_id($gameId);
            $gameDeleted = $this->GamesModel->delete($gameId);
            if ($gameDeleted) {
                $featuredImgLink = './assets/images/game_featured_images/'.$gameData['featured_image'];
                if(is_file($featuredImgLink)){
                    unlink($featuredImgLink);
                }
                $sliderImagesJson = $gameData['banner_images'];
                $sliderImageNames = json_decode($sliderImagesJson,TRUE);
                foreach($sliderImageNames as $sliderImageName){
                    $sliderImageLink = './assets/images/game_slider_images/'.$sliderImageName;
                    if(is_file($sliderImageLink)){
                        unlink($sliderImageLink);
                    }
                }
                $data['title'] = 'All Games';
                $data['games'] = $this->GamesModel->fetch_all();
                $data['success'] = 'Game Deleted successfully'; $data['error'] = '';

                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/all_games', $data);
                $this->load->view('templates/admin_footer', $data);
            } else {
                $data['title'] = 'All Games';
                $data['games'] = $this->GamesModel->fetch_all();
                $data['success'] = ''; $data['error'] = 'Game couldnt be deleted';

                $this->load->view('templates/admin_header', $data);
                $this->load->view('admin_pages/all_games', $data);
                $this->load->view('templates/admin_footer', $data);
            }
        }
    
    }
    
    /* End of file Games.php */
    