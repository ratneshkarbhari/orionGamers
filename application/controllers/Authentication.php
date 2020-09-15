<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Authentication extends CI_Controller {
    
        public function admin_login_exe()
        {
            
            if ($this->session->userdata('logged_in_as')=='admin') {
            
                redirect(site_url('admin-dashboard'));

            }else {
            
                $entered_username = $this->input->post('admin-username');
                $entered_password = $this->input->post('admin-password');

                if ($entered_username!=''&&$entered_password!='') {

                    $this->load->model('AuthModel');

                    $adminData = $this->AuthModel->fetch_admin_data_by_username($entered_username);

                    if ($adminData) {
                        
                        $passwordCorrect = password_verify($entered_password,$adminData['password']);

                        if ($passwordCorrect) {
                            
                            
                            $array = array(
                                'first_name' => $adminData['first_name'],
                                'last_name' => $adminData['last_name'],
                                'username' => $adminData['username'],
                                'logged_in_as' => 'admin'
                            );
                            
                            $this->session->set_userdata( $array );

                            
                            redirect(site_url('admin-dashboard'));
                            

                        } else {
                        
                            $data['title'] = 'Admin Login';
                            $data['success'] = ''; 
                            $data['error'] = 'Please username is incorrect';
                        
                            $this->load->view('templates/site_header', $data);
                            $this->load->view('site_pages/admin_login', $data);
                            $this->load->view('templates/site_footer', $data);
                        
                        }
                        
                        
                    } else {
                        
                        $data['title'] = 'Admin Login';
                        $data['success'] = ''; 
                        $data['error'] = 'Please username is incorrect';
                    
                        $this->load->view('templates/site_header', $data);
                        $this->load->view('site_pages/admin_login', $data);
                        $this->load->view('templates/site_footer', $data);

                    }
                    
                } else {
                    
                    $data['title'] = 'Admin Login';
                    $data['success'] = ''; $data['error'] = 'Please enter both username and password';
                
                    $this->load->view('templates/site_header', $data);
                    $this->load->view('site_pages/admin_login', $data);
                    $this->load->view('templates/site_footer', $data);
                    
                }
                



            }

        }

        public function admin_logout(){
            if ($this->session->userdata('logged_in_as')!='admin') {
                
                redirect(site_url('admin-login'));
                
            } else {

                
                $this->session->sess_destroy();
                
                
                redirect(site_url('admin-login'));
                
                
            }
        }
    
    }
    
    /* End of file Authentication.php */
    