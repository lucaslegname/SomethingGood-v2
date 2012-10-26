<?php

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}
	
	public function login()
	{	
		$data['title'] = 'Connexion à la zone admin';
		$data['message'] = '';
		
		$this->form_validation->set_rules('username', 'login', 'trim|required');
		$this->form_validation->set_rules('pass', 'password', 'trim|required|md5');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->_show_page('users/login', $data);
		} else
		{
			$result_query = $this->users_model->identify_user($this->input->post('username'),$this->input->post('pass'));
			
			if(!empty($result_query))
			{
				$newdata = array(
									'userId'	=> $result_query['idUser'],
				                   	'username'  => $result_query['userName'],
				                   	'email'     => $result_query['emailAddress'],
				                   	'writer'	=> $result_query['isWriter'],
				                   	'admin'		=> $result_query['isAdmin'],
				                   	'logged_in' => TRUE
				               );
				$this->session->set_userdata($newdata);
				
				$url = $this->session->userdata('initialURL');
				$this->session->unset_userdata('initialURL');
				if($url==null)
					$url = site_url('admin/admin_panel');
				
				redirect($url, 'refresh');
			} else
			{
				$data['message'] = 'Login ou mot de passe incorrect!';
				
				$this->_show_page('users/login', $data);
			}
			
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect(site_url(), 'refresh');
	}
	
	public function create()
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Création d\'un utilisateur';
		
		$this->form_validation->set_rules('username', 'login', 'trim|required');
		$this->form_validation->set_rules('pass', 'password', 'matches[repeat-pass]|min_length[5]|trim|required|md5');
		$this->form_validation->set_rules('repeat-pass', 'repeat password', 'trim|required|md5');
		$this->form_validation->set_rules('first-name', 'prénom', 'trim|required');
		$this->form_validation->set_rules('last-name', 'nom', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|valid_email|required');
		$this->form_validation->set_rules('HTML-color', 'couleur', 'trim|required');
		$this->form_validation->set_rules('twitter-profile', 'profil twitter', 'trim|required');
		$this->form_validation->set_rules('bio', 'biographie', 'trim|required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->_show_page('users/create', $data);
		} else
		{
			$this->users_model->create_user();
			
			$data['message'] = 'Utilisateur créé avec succès!';
			
			$this->_show_page('users/success', $data);
		}
	}
	
	public function update($idUser)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Mise-à-jour d\'un utilisateur';
		
		$this->form_validation->set_rules('username', 'login', 'trim|required');
		$this->form_validation->set_rules('pass', 'password', 'matches[repeat-pass]|min_length[5]|trim|md5');
		$this->form_validation->set_rules('repeat-pass', 'repeat password', 'trim|md5');
		$this->form_validation->set_rules('first-name', 'prénom', 'trim|required');
		$this->form_validation->set_rules('last-name', 'nom', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|valid_email|required');
		$this->form_validation->set_rules('HTML-color', 'couleur', 'trim|required');
		$this->form_validation->set_rules('twitter-profile', 'profil twitter', 'trim|required');
		$this->form_validation->set_rules('bio', 'biographie', 'trim|required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$data['user_info'] = $this->users_model->user_info($idUser);
			
			$this->_show_page('users/update', $data);
		} else
		{
			$this->users_model->update_user($idUser);
			
			$data['message'] = 'Utilisateur updaté avec succès!';
			
			$this->_show_page('users/success', $data);
		}
	}
	
	public function userlist()
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$data['title'] = 'Liste des utilisateurs';
		
		$data['usersList'] = $this->users_model->users_list();
		
		$this->_show_page('users/list', $data);
	}
	
	public function delete($idUser)
	{
		// Check if the user is logged in
		$this->_check_if_logged();
		
		$this->users_model->delete_user($idUser);
		
		redirect(site_url('users/userlist'), 'refresh');
	}
	
	public function view($idUser)
	{
		$data['user_item'] = $this->users_model->user_info($idUser);
	
		if (empty($data['user_item']))
		{
			show_404();
		}
	
		$data['title'] = $data['user_item']['userName'];
	
		$this->_show_page('users/view', $data);
	}
	
}