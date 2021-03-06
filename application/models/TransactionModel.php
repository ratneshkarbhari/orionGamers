<?php


    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class TransactionModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function saveCurrentProduct($pid){
            $this->db->where('id', $_SESSION['id']);
            $this->db->set('current_product',$pid);
            return $this->db->update('customers');
        }

        public function updateGpayCreditREquestStatus($custId,$googlePlayEmail){
            $this->db->where('id', $custId);
            $this->db->set('google_play_email_id',$googlePlayEmail);
            $this->db->set('gpay_credit_claim_status','requested');
            return $this->db->update('customers');
        }

        public function create_gplay_credit_req($custId,$googlePlayEmail){
            
            $obj = array(
                'email' => $googlePlayEmail,
                'customer_id' => $custId 
            );
            return $this->db->insert('gpay_credit_requests',$obj);
        }

        public function update_purchased($id,$pid){
            $this->db->where('id', $id);
            $this->db->set('current_product',$pid);
            $this->db->set('purchased','yes');
            return $this->db->update('customers');
        }

        public function update_purchased_different($id,$pid){
            $this->db->where('id', $id);
            $this->db->set('current_product',$pid);
            $this->db->set('purchased','different');
            return $this->db->update('customers');
        }

        public function fetch_all_google_play_credit_requests(){
            $this->db->order_by('id', 'desc');
            
            return $this->db->get('gpay_credit_requests')->result_array();
        }

        public function make_independent($parentCode){
            $this->db->where('parent_code', $parentCode);
            $this->db->set('parent_code',"independent");
            return $this->db->update('customers');
        }

        public function mark_gplay_claim_settled($custId){
            $this->db->where('id', $custId);
            $this->db->set('gpay_credit_claim_status','settled');
            return $this->db->update('customers');
        }

        public function fetch_transaction_details_by_id($id){
            return $this->db->get_where('transactions',array('id'=>$id))->row_array();
        }

        public function fetch_all(){
            return $this->db->get('transactions')->result_array();
        }

        public function save($data){
            return $this->db->insert('transactions',$data);
        }
        
    
    }
    
    /* End of file TransactionModel.php */
    