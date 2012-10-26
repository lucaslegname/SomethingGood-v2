<?php
class Keywords_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function create_keyword($keyword)
	{	
		$data = array(
			'keyword' 			=> $keyword,
			'nbSearchs' 		=> 1
		);
		
		return $this->db->insert('Keywords', $data);
	}
	
	public function update_date($keyword)
	{	
		$this->db->set('dateLastSearch', 'NOW()', FALSE);
		$this->db->where('keyword', $keyword);
		$this->db->update('Keywords'); 
	}
	
	public function plus($keyword,$field)
	{	
		$this->db->where('keyword',$keyword)->set($field,$field.'+1',FALSE)->update('Keywords');
	}
	
	public function keyword_info($keyword)
	{	
		$query = $this->db->get_where('Keywords', array('keyword' => $keyword));
		return $query->row_array();
	}
	
	public function four_last_keywords()
	{	
		$this->db->select('keyword');
		$this->db->order_by("dateLastSearch", "DESC"); 
		$query = $this->db->get('Keywords', 4, 0);
		
		return $query->result_array();
	}
}