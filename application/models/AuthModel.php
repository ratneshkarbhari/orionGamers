<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AuthModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function create_customer($newCustomerObj){
            $this->db->insert('customers',$newCustomerObj);
            return $this->db->insert_id();
            
        }

        public function update_customer($obj){
            $this->db->where('id', $_SESSION['id']);
            return $this->db->update('customers',$obj);
        }
    
        public function fetch_admin_data_by_username($username){
            return $this->db->get_where('admins',array('username'=>$username))->row_array();
        }

        public function fetch_customer_data_by_email($email){
            return $this->db->get_where('customers',array('email'=>$email))->row_array();
        }
    
    }
    
    /* End of file AuthModel.php */
    