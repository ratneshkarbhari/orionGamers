<?php


    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class RefferalModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function fetch_all_reffered(){
            $reffCode = $_SESSION['reff_code'];
            return $this->db->get_where('customers',array('parent_code'=>$reffCode))->result_array();
        }
        
    
    }
    
    /* End of file RefferalModel.php */
    