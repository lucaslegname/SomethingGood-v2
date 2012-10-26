<?php

class RSSFeed extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('posts_model');
		$this->load->database();
		$this->load->helper('xml');  
	}
	
	function index()  
	{  
	    $data['feed_name'] = 'SomethingGood.fr'; // your website  
	    $data['encoding'] = 'utf-8'; // the encoding  
	       $data['feed_url'] = 'http://www.somethinggood.fr/rssfeed'; // the url to your feed  
	       $data['page_description'] = 'Something Good, culture numérique et plein d\'autres choses.'; // some description  
	       $data['page_language'] = 'fr'; // the language  
	       $data['creator_email'] = 'lucas.legname@gmail.com'; // your email  
	       $data['postsList'] = $this->posts_model->get_last_posts(10);    
	       header("Content-Type: application/rss+xml"); // important!  
	       
	       $this->load->view('rss/rssflow', $data); 
	} 
}