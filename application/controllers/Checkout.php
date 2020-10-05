<?php


    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Checkout extends CI_Controller {
    
        public function save_transaction()
        {



        }
        
        public function mark_gplay_claim_settled(){

            $customerID = $this->input->post('customer-id');

            $this->load->model('TransactionModel');
            $settled = $this->TransactionModel->mark_gplay_claim_settled($customerID);

            
            redirect(site_url('all-google-play-credit-request'));
            

        }

        public function create_google_play_credit_request(){
            $customerID = $_SESSION['id'];
            $googlePlayEmail = $this->input->post('google-play-email');
            $this->load->model('TransactionModel');
            $this->load->model('AuthModel');
            $customerData = $this->AuthModel->fetch_customer_data_by_id($customerID);
            $createdRequest = $this->TransactionModel->create_gplay_credit_req($customerID,$googlePlayEmail);
            $createdRequestx = $this->TransactionModel->make_independent($customerData['reff_code']);
            $done = $this->TransactionModel->updateGpayCreditREquestStatus($customerID,$googlePlayEmail);
            redirect(site_url('my-account'));
        }
    
    }
    
    /* End of file Checkout.php */
    