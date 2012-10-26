<?php

class Uploads extends MY_Controller {
	
	private $base_ftp_root;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('uploads_model');
		
		$this->load->library('ftp');
		$this->load->library('upload');
	}
	
	function illustrate($idPost)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$ftp_dir = $this->config->item('upload_ftp_root');
		
		$data['title'] = 'Illustration d\'un post';
		$data['error'] = ' ';
		
		$this->load->model('posts_model');
		$post = $this->posts_model->post_info($idPost);
		
		$data['idPost'] = $idPost;
		$data['titlePost'] = $post['title'];
		
		//$this->load->view('uploads/upload_form', array('error' => ' ' ));
		$this->_show_page('uploads/upload_form', $data);
	}
	
	function do_upload($idPost)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$this->load->model('posts_model');
		$post = $this->posts_model->post_info($idPost);
		
		$data['titlePost'] = $post['title'];
		$data['idPost'] = $idPost;
		
		$this->_ftp_mkdir($post['slug']);
		
		$config['upload_path'] = './upld/'.$post['slug'].'/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1000';
		//$config['max_width']  = '2048';
		//$config['max_height']  = '1200';
		
		$this->upload->initialize($config);
		
		// the file field should be called 'userfile'
		if ( ! $this->upload->do_upload())
		{
			$data['title'] = 'Illustration d\'un post';
			$data['error'] = $this->upload->display_errors();
			
			$this->_show_page('uploads/upload_form', $data);
		}
		else
		{
			$data['title'] = 'Illustration uploadée';
			$up_data = $this->upload->data();
			$data['upload_data'] = $up_data;
						
			$this->load->model('uploads_model');
			$this->uploads_model->create_image($up_data['full_path']);

			//$this->load->view('uploads/success', $data);
			$this->_show_page('uploads/success', $data);
		}
	}
	
	function _ftp_mkdir($name)
	{
		$ftp_dir = $this->config->item('upload_ftp_root');
		
		$this->ftp->connect();
		$list = $this->ftp->list_files($ftp_dir);
		
		if (!in_array($name, $list)){
			// Creates a folder named "bar"
			$this->ftp->mkdir($ftp_dir.$name.'/', DIR_WRITE_MODE);
		}
		
		$this->ftp->close();
	}
	
	public function imagelist($idPost)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Liste des images';
		$data['idPost'] = $idPost;
		$data['imagesList'] = $this->uploads_model->images_list($idPost);
		
		$this->_show_page('uploads/list', $data);
	}
	
	public function delete($idImage)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$image = $this->uploads_model->image_info($idImage);
		
		//echo $image['url'];
		
		$loc = substr($image['url'], 20);
		
		$this->ftp->connect();
		$this->ftp->delete_file($loc);
		$this->ftp->close();
		
		$this->uploads_model->delete_image($idImage);
		
		redirect(site_url('uploads/imagelist/'.$image['idPost']), 'refresh');
	}
	
	public function update($idImage)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Mise-à-jour d\'une image';
		$data['idImage'] = $idImage;
		
		$this->form_validation->set_rules('indexImage', 'login', 'trim|required');
		
		$data['image_info'] = $this->uploads_model->image_info($idImage);

		if ($this->form_validation->run() === FALSE)
		{
			$this->_show_page('uploads/update', $data);
		} else
		{
			$this->uploads_model->update_image($idImage);
			
			$data['message'] = 'Citation updatée avec succès!';
			
			redirect(site_url('uploads/imagelist/'.$data['image_info']['idPost']), 'refresh');
		}
	}
	
	public function display($idImage,$display)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['image_info'] = $this->uploads_model->image_info($idImage);
		
		if($display=='true')
			$this->uploads_model->display_image($idImage,true);
		else
			$this->uploads_model->display_image($idImage,false);
		
		redirect(site_url('uploads/imagelist/'.$data['image_info']['idPost']), 'refresh');
	}
	
}
