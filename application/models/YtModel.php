<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class YtModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function fetch_all(){
            return $this->db->get('yt_videos')->result_array();
        }
    
        public function add_video($link,$thumb){
            $data = array('link'=>$link,'thumb'=>$thumb);
            return $this->db->insert('yt_videos',$data);
        }
        
    }
    
    /* End of file YtModel.php */
    