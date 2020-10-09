<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AuthModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function fetch_customer_data_by_id($id){
            $this->db->where('id', $id);
            return $this->db->get('customers')->row_array();
        }

        public function fetch_customer_by_reff_id($reff_id){
            $this->db->where('reff_code', $reff_id);
            return $this->db->get('customers')->row_array();
            
        }

        public function save_otp($email,$otp){
            return $this->db->insert('otps',array('otp'=>$otp,'email'=>$email));
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
    