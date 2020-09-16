<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class GameProductsModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->table = $this->table;
        }
        
        public function fetch_all(){
         
            $this->db->ordaer_by('id', 'desc');
            return $this->db->get($this->table)->result_array();
            
        }

        public function fetch_game_by_id($gameId){

            return $this->db->get_where($this->table,array('id'=>$gameId))->row_array();

        }

        public function delete($gameId){


            $this->db->where('id', $gameId);            
            return $this->db->delete($this->table);

        }
        
        public function create($obj){
            
            return $this->db->insert($this->table,$obj);

        }
    
    }
    
    /* End of file GamesModel.php */
    