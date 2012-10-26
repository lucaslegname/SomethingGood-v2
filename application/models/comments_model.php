<?php
class Comments_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function create_comment($idPost,$color)
	{	
		$data = array(
			'idPost' 				=> $idPost,
			'autorName' 			=> $this->input->post('sender-name'),
			'autorEMailAddress' 	=> $this->input->post('sender-mail'),
			'contentComment' 		=> $this->input->post('message'),
			'htmlColor' 			=> $color
		);
		
		$this->db->insert('Comments', $data);
		
		return $this->db->insert_id();
	}
	
	public function comment_info($idComment)
	{	
		$query = $this->db->get_where('Comments', array('idComment' => $idComment));
		return $query->row_array();
	}
	
	public function comments_list()
	{	
		$this->db->order_by("idComment", "DESC"); 
		$query = $this->db->get('Comments');
		return $query->result_array();
	}
	
	public function post_comments($idPost)
	{	
		$this->db->order_by("idComment", "ASC"); 
		$query = $this->db->get_where('Comments', array('idPost' => $idPost));
		return $query->result_array();
	}
	
	public function delete_comment($idComment)
	{	
		$this->db->delete('Comments', array('idComment' => $idComment)); 
	}
	
	public function five_last_comments()
	{	
		$this->db->select('Comments.idPost, Comments.autorName, Posts.title, Posts.slug');
		$this->db->order_by("Comments.dateComment", "DESC"); 
		$this->db->from('Comments');
		$this->db->join('Posts', 'Comments.idPost = Posts.idPost');
		$this->db->limit(5);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
}