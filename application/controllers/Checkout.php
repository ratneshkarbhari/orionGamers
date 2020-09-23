<?php


    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Checkout extends CI_Controller {
    
        public function save_transaction()
        {

            $this->load->model('TransactionModel');
            
            $dataToSave = $_POST;
            
            $transactionSaved = $this->TransactionModel->save($dataToSave);

            if ($transactionSaved) {

                $updatePurchasedOnCustomer = $this->TransactionModel->update_purchased($_SESSION['id']);

                exit('success');
            }else{
                exit('fail');
            }

        }
    
    }
    
    /* End of file Checkout.php */
    