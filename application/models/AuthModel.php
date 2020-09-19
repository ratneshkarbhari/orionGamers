<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AuthModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
    
        public function fetch_admin_data_by_username($username){
            return $this->db->get_where('admins',array('username'=>$username))->row_array();
        }
    
    }
    
    /* End of file AuthModel.php */
    