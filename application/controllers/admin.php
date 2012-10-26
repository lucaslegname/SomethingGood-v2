<?php

class Admin extends MY_Controller {

	public function view($page = 'admin_panel')
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Panneau d\'administration'; // Capitalize the first letter
		
		$this->load->library('session');
		$data['userId'] = $this->session->userdata('userId');
		$data['username'] = $this->session->userdata('username');
		
		//if($this->_has_right('admin'))
		//	$data['username'] = "admn!!";
			
		$this->_show_page('admin/'.$page, $data);
	}
}