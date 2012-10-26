<?php
class Posts extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('posts_model');
	}

	public function create()
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Création d\'un nouveau post';
		
		$this->form_validation->set_rules('titlePost', 'titre', 'trim|required');
		$this->form_validation->set_rules('categoryPost', 'categorie', 'trim|required');
		$this->form_validation->set_rules('hashtagPost', 'hashtag', 'trim|required');
		$this->form_validation->set_rules('introPost', 'intro', 'trim|required');
		$this->form_validation->set_rules('contentPost', 'contenu', 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->_show_page('posts/create', $data);
		} else
		{
			$this->posts_model->create_post();
			
			$data['message'] = 'Post créé avec succès!';
			
			$this->_show_page('posts/success', $data);
		}
	}
	
	public function update($idPost)
		{
			// Check if the user is logged in
			$this->_check_if_logged();
			
			$data['title'] = 'Mise-à-jour d\'un post';
			
			$this->form_validation->set_rules('titlePost', 'titre', 'trim|required');
			$this->form_validation->set_rules('categoryPost', 'categorie', 'trim|required');
			$this->form_validation->set_rules('hashtagPost', 'hashtag', 'trim|required');
			$this->form_validation->set_rules('introPost', 'intro', 'trim|required');
			$this->form_validation->set_rules('contentPost', 'contenu', 'trim|required');
	
			if ($this->form_validation->run() === FALSE)
			{
				$data['post_info'] = $this->posts_model->post_info($idPost);
				
				$this->_show_page('posts/update', $data);
			} else
			{
				$this->posts_model->update_post($idPost);
				
				$data['message'] = 'Post updaté avec succès!';
				
				$this->_show_page('posts/success', $data);
			}
		}
	
	public function postlist($page=1)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Liste des posts';
		
		$data['postsList'] = $this->posts_model->posts_list($page);
		
		$base_url = site_url('posts/postlist/');
		$total_rows = $this->posts_model->get_total_posts();
		$data['pagination'] = $this->_get_pagination($base_url, $total_rows, 20);
		
		$this->_show_page('posts/list', $data);
	}
	
	public function delete($idPost)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$this->posts_model->delete_post($idPost);
		
		redirect(site_url('posts/postlist'), 'refresh');
	}
	
	public function publish($idPost,$publish)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		if($publish=='true')
			$this->posts_model->publish_post($idPost,true);
		else
			$this->posts_model->publish_post($idPost,false);
		
		redirect(site_url('posts/postlist'), 'refresh');
	}
	
	public function view($idPost,$slug)
	{
		$data['post_item'] = $this->posts_model->post_info($idPost);
	
		if (empty($data['post_item']))
		{
			show_404();
		}
	
		$this->posts_model->plus($idPost,'nbViews');
		$data['title'] = $data['post_item']['title'];
		
		// Construction of the images table
		$this->load->model('uploads_model');
		
		$imagesList = $this->uploads_model->displayed_images($idPost);

		// To know if posts have already been liked
		$postLiked = $this->input->cookie('posts-liked', TRUE);
		$idLiked = array();
		if($postLiked!==false)
			$idLiked = explode(",",$postLiked);
		$data['idLiked'] = $idLiked;
			
		$data['imagesList'] = $imagesList;
		
		$this->load->model('comments_model');
		$data['commentsList'] = $this->comments_model->post_comments($idPost);
		
	
		$this->_show_page('posts/view', $data);
	}
	
	public function like($idPost)
	{		
		$add_like = false;
		
		$postLiked = $this->input->cookie('posts-liked', TRUE);
		
		if($postLiked===false) {
			$postLiked = $idPost;
			$add_like = true;
		}
		else {
			$idLiked = explode(",",$postLiked);
			
			if(!in_array($idPost,$idLiked)){
				$add_like = true;
				$postLiked .= ",".$idPost;
			}
		}
		
		$cookie = array(
		    'name'   => 'posts-liked',
		    'value'  => $postLiked,
		    'expire' => '3000000'
		);
		$this->input->set_cookie($cookie); 
		
		if($add_like) {
			$this->posts_model->plus($idPost,'nbLikes');
			$output_string = "success";
		}
		else {
			$output_string = "fail";
		}
		
		echo json_encode($output_string);
	}
	
	public function flow($category='all',$page=1)
	{	
		// Pagination
		$base_url = site_url('posts/'.$category.'/');
		$total_rows = $this->posts_model->get_num_posts($category);
		$pagination = $this->_get_pagination($base_url, $total_rows, 4);
		
		// We get the posts from this category
		$list = $this->posts_model->get_flow($category,$page);
		
		$data['no_data_msg'] = 'Il n\'y a pas encore d\'articles dans cette catégorie.';
		$data['title'] = 'Actualité';
		$this->_display_posts($list,$pagination,$data);
	}
	
	public function liked($page=1)
	{	
		$postLiked = $this->input->cookie('posts-liked', TRUE);
		$tabLiked = explode(",",$postLiked);
		
		// Pagination
		$base_url = site_url('posts/liked/');
		$total_rows = $this->posts_model->get_num_liked($tabLiked);
		$pagination = $this->_get_pagination($base_url, $total_rows, 4);
		
		// We get the posts from this category
		$list = $this->posts_model->get_liked($tabLiked,$page);
		
		$data['no_data_msg'] = 'Vous pouvez retrouver dans cette catégorie tous les articles pour lesquels vous avez cliqué sur "I like :)".';
		$data['title'] = 'Actualité';
		$this->_display_posts($list,$pagination,$data);
	}
	
	public function search($keyword,$page=1)
	{
		$this->load->model('keywords_model');
		
		// Pagination
		$base_url = site_url('posts/search/'.$keyword.'/');
		$total_rows = $this->posts_model->get_num_search($keyword);
		$pagination = $this->_get_pagination($base_url, $total_rows, 4, 4);
		
		// We get the posts from this category
		$decode_keyword = urldecode($keyword);
		
		$db_keyword = $this->keywords_model->keyword_info($decode_keyword);
		if (empty($db_keyword))
			$this->keywords_model->create_keyword($decode_keyword);
		else {
			$this->keywords_model->plus($decode_keyword,'nbSearchs');
			$this->keywords_model->update_date($decode_keyword);
		}
			
		$list = $this->posts_model->search($decode_keyword,$page);
		
		$data['no_data_msg'] = 'Aucun résultat pour la recherche: '.$keyword;
		$data['title'] = 'Résultats de la recherche';
		$this->_display_posts($list,$pagination,$data);
	}
	
	public function _display_posts($postsList,$pagination,$data)
	{
		if (empty($postsList))
		{
			$data['title'] = 'Pas de résultats';
			$this->_show_page('posts/no_results', $data);
		}
		else
		{
			// Construction of the images table
			$this->load->model('uploads_model');
			foreach ($postsList as $post){
				$imagesList[$post['idPost']] = $this->uploads_model->displayed_images($post['idPost']);
			}

			// To know if posts have already been liked
			$postLiked = $this->input->cookie('posts-liked', TRUE);
			$idLiked = array();
			if($postLiked!==false)
				$idLiked = explode(",",$postLiked);
			$data['idLiked'] = $idLiked;
			
			$data['pagination'] = $pagination;
			$data['postsList'] = $postsList;
			$data['imagesList'] = $imagesList;
			
			$this->_show_page('posts/flow', $data);
		}
		
		
	}
	

	
}