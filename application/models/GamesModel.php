<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class GamesModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function fetch_all(){
         
            $this->db->order_by('id', 'desc');
            return $this->db->get('games')->result_array();
            
        }

        public function update_game_slider_images($gameId,$slider_images_json){
            $this->db->set('banner_images', $slider_images_json);
            $this->db->where('id', $gameId);
            return $this->db->update('games'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
        }

        public function fetch_game_by_slug($gameSlug)
        {
            return $this->db->get_where('games',array('slug'=>$gameSlug))->row_array();
        }

        public function fetch_game_by_id($gameId){

            return $this->db->get_where('games',array('id'=>$gameId))->row_array();

        }

        public function delete($gameId){


            $this->db->where('id', $gameId);            
            return $this->db->delete('games');

        }
        
        public function create($obj){
            
            return $this->db->insert('games',$obj);

        }
    
    }
    
    /* End of file GamesModel.php */
    