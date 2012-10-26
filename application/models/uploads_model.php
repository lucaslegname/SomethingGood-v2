<?php
class Uploads_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function create_image($urlImage)
	{	
		$data = array(
			'idPost' 			=> $this->input->post('idPost'),
			'titleImage' 		=> $this->input->post('title'),
			'url' 				=> $urlImage,
			'index' 			=> $this->input->post('indexImage'),
			'displayed' 		=> 1
		);
		
		return $this->db->insert('Images', $data);
	}
	
	public function update_image($idImage)
	{	
		$data = array(
			'titleImage' 		=> $this->input->post('title'),
			'index' 			=> $this->input->post('indexImage')
		);
		
		$this->db->where('idImage', $idImage);
		$this->db->update('Images', $data); 
	}
	
	public function image_info($idImage)
	{	
		$query = $this->db->get_where('Images', array('idImage' => $idImage));
		return $query->row_array();
	}
	
	public function displayed_images($idPost)
	{	
		$this->db->order_by("index", "ASC"); 
		$this->db->where('displayed', true); 
		$this->db->where('idPost', $idPost);
		
		$query = $this->db->get('Images');
		return $query->result_array();
	}
	
	public function images_list($idPost)
	{	
		$this->db->order_by("index", "ASC"); 
		$query = $this->db->get_where('Images', array('idPost' => $idPost));
		return $query->result_array();
	}
	
	public function delete_image($idImage)
	{	
		$this->db->delete('Images', array('idImage' => $idImage)); 
	}
	
	public function display_image($idImage,$display)
	{	
		$data = array(
			'displayed' 		=> $display
		);
		
		$this->db->where('idImage', $idImage);
		$this->db->update('Images', $data); 
	}
	
}