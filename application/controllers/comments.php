<?php

class Comments extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('comments_model');
	}
	
	public function add($idPost)
	{
		// First, delete old captchas
		$expiration = time()-7200; // Two hour limit
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);	
		
		// Then see if a captcha exists:
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($this->input->post('sender-captcha'), $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		
		if ($row->count == 0)
		{
		    echo json_encode('wrong_captcha');
		}
		else
		{
			$this->load->model('users_model');
			
			$color = '#4BB3B3';
			$islogged = $this->session->userdata('logged_in');
		
			if ($islogged){
				$idUser = $this->session->userdata('userId');
				$result = $this->users_model->user_info($idUser);
				$color = $result['defaultHTMLColor'];
			}
				
			$idComment = $this->comments_model->create_comment($idPost,$color);
			
			$cookie = array(
			    'name'   => 'sg_last_inserted_comment',
			    'value'  => $idComment,
			    'expire' => '86500',
			    'path'   => '/'
			);
			$this->input->set_cookie($cookie);
			
			echo json_encode($idComment);
		}
	}
	
	public function delete($idComment)
	{	
		$this->comments_model->delete_comment($idComment);
		
		echo json_encode('success');
	}
}