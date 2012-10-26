<?php

class Quotes extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('quotes_model');
	}
	
	public function create()
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Création d\'une citation';
		
		$this->form_validation->set_rules('autor', 'auteur', 'trim|required');
		$this->form_validation->set_rules('quoteContent', 'citation', 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->_show_page('quotes/create', $data);
		} else
		{
			$this->quotes_model->create_quote();
			
			$data['message'] = 'Citation créée avec succès!';
			
			$this->_show_page('quotes/success', $data);
		}
	}
	
		public function update($idQuote)
		{
			// Check if the user is logged in
			$this->_check_if_logged();
			
			$data['title'] = 'Mise-à-jour d\'une citation';
			
			$this->form_validation->set_rules('autor', 'auteur', 'trim|required');
			$this->form_validation->set_rules('quoteContent', 'citation', 'trim|required');
	
			if ($this->form_validation->run() === FALSE)
			{
				$data['quote_info'] = $this->quotes_model->quote_info($idQuote);
				
				$this->_show_page('quotes/update', $data);
			} else
			{
				$this->quotes_model->update_quote($idQuote);
				
				$data['message'] = 'Citation updatée avec succès!';
				
				$this->_show_page('quotes/success', $data);
			}
		}
	
	public function quotelist()
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Liste des citations';
		
		$data['quotesList'] = $this->quotes_model->quotes_list();
		
		$this->_show_page('quotes/list', $data);
	}
	
	public function delete($idQuote)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$this->quotes_model->delete_quote($idQuote);
		
		redirect(site_url('quotes/quotelist'), 'refresh');
	}
	
}
