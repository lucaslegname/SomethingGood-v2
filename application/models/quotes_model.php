<?php
class Quotes_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function create_quote()
	{	
		$data = array(
			'autor' 			=> $this->input->post('autor'),
			'content' 			=> $this->input->post('quoteContent')
		);
		
		return $this->db->insert('Quotes', $data);
	}
	
	public function update_quote($idQuote)
	{	
		$data = array(
			'autor' 			=> $this->input->post('autor'),
			'content' 			=> $this->input->post('quoteContent')
		);
		
		$this->db->where('idQuote', $idQuote);
		$this->db->update('Quotes', $data); 
	}
	
	public function quote_info($idQuote)
	{	
		$query = $this->db->get_where('Quotes', array('idQuote' => $idQuote));
		return $query->row_array();
	}
	
	public function quotes_list()
	{	
		$this->db->order_by("idQuote", "DESC"); 
		$query = $this->db->get('Quotes');
		return $query->result_array();
	}
	
	public function delete_quote($idQuote)
	{	
		$this->db->delete('Quotes', array('idQuote' => $idQuote)); 
	}
	
	public function random_quote()
	{	
		$this->db->select('content, autor');
		$this->db->order_by("idQuote", "random"); 
		$query = $this->db->get('Quotes');
		
		return $query->row_array();
	}
	
}