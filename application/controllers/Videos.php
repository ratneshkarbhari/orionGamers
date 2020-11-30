<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Videos extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('logged_in_as')!='admin') {
                
                redirect(site_url('admin-login'));
                
            }
        }
        

        public function add()
        {

            $config['upload_path'] = './assets/images/yt_video_thumbs';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('videothumb')){
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }else{
                $data = array('upload_data' => $this->upload->data());
                $featured_image_name = $data['upload_data']['file_name'];
            }    
            
            $link = $this->input->post('link');
            
            $this->load->model('YtModel');
            
            $added = $this->YtModel->add_video($link,$featured_image_name);
            
            redirect(site_url('manage-youtube-videos'));
            

        }
    
    }
    
    /* End of file Videos.php */
    