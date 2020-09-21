<?php


    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class TransactionModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function update_purchased($id){
            $this->db->where('id', $id);
            $this->db->set('purchased','yes');
            return $this->db->update('customers');
        }

        public function save($data){
            return $this->db->insert('transactions',$data);
        }
        
    
    }
    
    /* End of file TransactionModel.php */
    