<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        // To not rely on a default timezone
        date_default_timezone_set('Europe/Paris');
    }

    public function _check_if_logged()
    {   
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != true)
        {
        	$newdata = array(
        						'initialURL'  => current_url()
        	               );
        	$this->session->set_userdata($newdata);
            redirect(site_url('login'), 'refresh');
        }
    }
    
    public function _has_right($right_name){
    	return $this->session->userdata($right_name);
    }
    
    public function _show_page($url, $data){
    
    	// Get the quotes
    	$this->load->model('quotes_model');
    	$data['quote'] = $this->quotes_model->random_quote();
    	
    	// Get Last keywords
    	$this->load->model('keywords_model');
    	$data['last_keywords'] = $this->keywords_model->four_last_keywords();
    	
    	// Get Last and Popular posts
    	$this->load->model('posts_model');
    	$this->load->model('comments_model');
    	$data['last_posts'] = $this->posts_model->five_last_posts();
    	$data['last_comments'] = $this->comments_model->five_last_comments();
    	$data['popular_posts'] = $this->posts_model->popular_posts();
    	
    	// Load view
    	$this->load->view('templates/header', $data);	
    	$this->load->view($url, $data);
    	$this->load->view('templates/menu', $data);
    	$this->load->view('templates/footer', $data);
    }
    
    public function _get_pagination($base_url, $total_rows, $itm_by_page, $uri_pos=3)
    {
    	$this->load->library('pagination');
    	
    	$configPagination['base_url'] = $base_url;
    	$configPagination['total_rows'] = $total_rows;
    	$configPagination['per_page'] = $itm_by_page;
    	
    	$configPagination['use_page_numbers'] = TRUE;
    	$configPagination['num_links'] = 2;
    	$configPagination['first_url'] = '1';
    	
    	$configPagination['uri_segment'] = $uri_pos;
    	
    	$configPagination['first_link'] = '';
    	$configPagination['last_link'] = '';
    	
    	$configPagination['full_tag_open'] = '<div class="pagination">';
    	$configPagination['full_tag_close'] = '</div>';
    	
    	$configPagination['next_link'] = 'Posts précédents';
    	$configPagination['next_tag_open'] = '<div class="pagin-next">';
    	$configPagination['next_tag_close'] = '</div>';
    	
    	$configPagination['prev_link'] = 'Posts suivants';
    	$configPagination['prev_tag_open'] = '<div class="pagin-prev">';
    	$configPagination['prev_tag_close'] = '</div>';
    	
    	$this->pagination->initialize($configPagination); 
    	
    	return $this->pagination->create_links();
    }
}