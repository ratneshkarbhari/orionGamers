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
    