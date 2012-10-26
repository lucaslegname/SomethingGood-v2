<?php
class Posts_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function create_post()
	{	
		$this->load->helper('url');
		
		$slug = url_title($this->input->post('titlePost'), '_', TRUE);
		
		$data = array(
			'idUser' 			=> $this->session->userdata('userId'),
			'title' 			=> $this->input->post('titlePost'),
			'slug' 				=> $slug,
			'category' 			=> $this->input->post('categoryPost'),
			'hashtag' 			=> $this->input->post('hashtagPost'),
			'intro' 			=> $this->input->post('introPost'),
			'content' 			=> $this->input->post('contentPost'),
			'nbViews' 			=> 0,
			'nbLikes' 			=> 0,
			'published' 		=> 0
		);
		
		return $this->db->insert('Posts', $data);
	}
	
	public function update_post($idPost)
	{	
		$this->load->helper('url');
	
		$slug = url_title($this->input->post('titlePost'), '_', TRUE);
		
		$data = array(
			'title' 			=> $this->input->post('titlePost'),
			'slug' 				=> $slug,
			'category' 			=> $this->input->post('categoryPost'),
			'hashtag' 			=> $this->input->post('hashtagPost'),
			'intro' 			=> $this->input->post('introPost'),
			'content' 			=> $this->input->post('contentPost')
		);
		
		$this->db->where('idPost', $idPost);
		$this->db->update('Posts', $data); 
	}
	
	public function post_info($idPost)
	{	
		$query = $this->db->get_where('Posts', array('idPost' => $idPost));
		return $query->row_array();
	}
	
	public function posts_list($page)
	{	
		$nb_post_by_page = 20;
		$offset = ($page - 1) * $nb_post_by_page;
		
		$this->db->order_by("idPost", "DESC"); 
		$query = $this->db->get('Posts', $nb_post_by_page, $offset);
		return $query->result_array();
	}
	
	public function delete_post($idPost)
	{	
		$this->db->delete('Posts', array('idPost' => $idPost)); 
	}
	
	public function publish_post($idPost,$publish)
	{	
		$data = array(
			'published' 		=> $publish
		);
		
		$this->db->where('idPost', $idPost);
		$this->db->update('Posts', $data); 
	}
	
	public function five_last_posts()
	{	
		$this->db->select('idPost, title, slug');
		$this->db->order_by("idPost", "DESC"); 
		$query = $this->db->get_where('Posts', array('published' => true), 5, 0);
		
		return $query->result_array();
	}
	
	public function popular_posts()
	{	
		$this->db->select('idPost, title, slug');
		$this->db->order_by("nbViews", "DESC"); 
		$query = $this->db->get_where('Posts', array('published' => true), 4, 0);
		
		return $query->result_array();
	}
	
	public function get_flow($category,$page)
	{	
		$nb_post_by_page = 4;
		$offset = ($page - 1) * $nb_post_by_page;
		
		if($category!='all')
			$this->db->where('category', $category); 
		$this->db->where('published', true); 
		$this->db->order_by("dateNews", "DESC"); 
		$query = $this->db->get('Posts', $nb_post_by_page, $offset);
		
		return $query->result_array();
	}
	
	public function get_last_posts($nb_posts)
	{	
		$this->db->where('published', true); 
		$this->db->order_by("idPost", "DESC"); 
		$query = $this->db->get('Posts', $nb_posts, 0);
		
		return $query->result_array();
	}
	
	public function get_liked($postsLiked,$page)
	{	
		$nb_post_by_page = 4;
		$offset = ($page - 1) * $nb_post_by_page;
		
		$this->db->or_where_in('idPost', $postsLiked);
		$this->db->where('published', true); 
		$this->db->order_by("idPost", "DESC"); 
		$query = $this->db->get('Posts', $nb_post_by_page, $offset);
		
		return $query->result_array();
	}
	
	public function search($keyword,$page)
	{	
		$nb_post_by_page = 4;
		$offset = ($page - 1) * $nb_post_by_page;
		
		$this->db->like('title', $keyword); 
		$this->db->where('published', true); 
		$this->db->order_by("idPost", "DESC"); 
		$query = $this->db->get('Posts', $nb_post_by_page, $offset);
		
		return $query->result_array();
	}
	
	public function get_total_posts()
	{			
		return $this->db->count_all_results('Posts');
	}
	
	public function get_num_posts($category)
	{	
		if($category!='all')
			$this->db->where('category', $category); 
		$this->db->where('published', true); 
		
		return $this->db->count_all_results('Posts');
	}
	
	public function get_num_liked($postsLiked)
	{	
		$this->db->or_where_in('idPost', $postsLiked);
		$this->db->where('published', true); 
		
		return $this->db->count_all_results('Posts');
	}
	
	public function get_num_search($keyword)
	{	
		$this->db->like('title', $keyword); 
		$this->db->where('published', true); 
		
		return $this->db->count_all_results('Posts');
	}
	
	public function plus($idPost,$field)
	{	
		$this->db->where('idPost',$idPost)->set($field,$field.'+1',FALSE)->update('Posts');
	}
	

}