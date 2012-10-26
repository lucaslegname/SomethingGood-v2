<?php

class Pages extends MY_Controller {

	public function view($page = 'home')
	{
		if ( ! file_exists('../application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$this->load->library('session');
			
		$title = str_replace('_',' ',$page);
		$data['title'] = ucfirst($title); // Capitalize the first letter
		
		$this->_show_page('pages/'.$page, $data);
	}
}