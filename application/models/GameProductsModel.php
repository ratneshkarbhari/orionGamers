<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class GameProductsModel extends CI_Model {
    
        private $table = 'game_products';

        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function update($gameProdId,$newData){
            $this->db->where('id', $gameProdId);
            return $this->db->update($this->table, $newData);
        }



        public function fetch_all(){
         
            $this->db->order_by('id', 'desc');
            return $this->db->get($this->table)->result_array();
            
        }

        public function fetch_by_id($gameId){

            return $this->db->get_where($this->table,array('id'=>$gameId))->row_array();

        }
        public function fetch_game_by_slug($gameslug){

            return $this->db->get_where($this->table,array('slug'=>$gameslug))->row_array();

        }

        public function delete($gameId){


            $this->db->where('id', $gameId);            
            return $this->db->delete($this->table);

        }

        public function fetch_all_for_game($id){
            return $this->db->get_where('game_products',array('parent_game'=>$id))->result_array();
        }
        
        public function create($obj){
            
            return $this->db->insert($this->table,$obj);

        }
    
    }
    
    /* End of file GamesModel.php */
    