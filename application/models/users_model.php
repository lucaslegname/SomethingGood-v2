<?php
class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function identify_user($login,$password)
	{
		$query = $this->db->get_where('Users', array('userName' => $login, 'password' => $password));
		return $query->row_array();
	}
	
	public function create_user()
	{	
		$data = array(
			'userName' 			=> $this->input->post('username'),
			'password' 			=> $this->input->post('pass'),
			'firstName'		 	=> $this->input->post('first-name'),
			'lastName' 			=> $this->input->post('last-name'),
			'emailAddress' 		=> $this->input->post('email'),
			'defaultHTMLColor' 	=> $this->input->post('HTML-color'),
			'twitterProfile' 	=> $this->input->post('twitter-profile'),
			'biography' 		=> $this->input->post('bio'),
			'isWriter' 			=> $this->input->post('writer'),
			'isAdmin' 			=> $this->input->post('admin'),
			'active' 			=> 1
		);
		
		return $this->db->insert('Users', $data);
	}
	
	public function update_user($idUser)
	{	
		$data = array(
			'userName' 			=> $this->input->post('username'),
			'firstName'		 	=> $this->input->post('first-name'),
			'lastName' 			=> $this->input->post('last-name'),
			'emailAddress' 		=> $this->input->post('email'),
			'defaultHTMLColor' 	=> $this->input->post('HTML-color'),
			'twitterProfile' 	=> $this->input->post('twitter-profile'),
			'biography' 		=> $this->input->post('bio'),
			'isWriter' 			=> $this->input->post('writer'),
			'isAdmin' 			=> $this->input->post('admin'),
			'active' 			=> $this->input->post('active')
		);
		
		if($this->input->post('pass')!='')
			$data['password'] = $this->input->post('pass');
		
		$this->db->where('idUser', $idUser);
		$this->db->update('Users', $data); 
	}
	
	public function user_info($idUser)
	{	
		$query = $this->db->get_where('Users', array('idUser' => $idUser));
		return $query->row_array();
	}
	
	public function users_list()
	{	
		$this->db->order_by("idUser", "DESC"); 
		$query = $this->db->get('Users');
		return $query->result_array();
	}
	
	public function delete_user($idUser)
	{	
		$this->db->delete('Users', array('idUser' => $idUser)); 
	}
	
	public function get_color($idUser)
	{	
		$this->db->select('defaultHTMLColor');
		$query = $this->db->get_where('Users', array('idUser' => $idUser));
		
		return $query->row_array();
	}
	
}