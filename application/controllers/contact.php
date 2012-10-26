<?php

class Contact extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function create_captcha()
	{
		// Captcha part
		$this->load->helper('string');
		$this->load->helper('captcha');
		$vals = array(
			'word'	 => random_string('alpha', 5),
		    'img_path'	 => './captcha/',
		    'img_url'	 => base_url().'/captcha/'
		    );
		$cap = create_captcha($vals);
		$cap_data = array(
		    'captcha_time'	=> $cap['time'],
		    'ip_address'	=> $this->input->ip_address(),
		    'word'	 => $cap['word']
		    );
		$query = $this->db->insert_string('captcha', $cap_data);
		$this->db->query($query);
		
		echo json_encode($cap['image']);
	}
	
	public function send_message()
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
			$this->load->library('email');
			
			$this->email->from($this->input->post('sender-mail'), $this->input->post('sender-name'));
			$this->email->to('lucas.legname@gmail.com');
			$this->email->subject('Something Good: Nouveau message de '.$this->input->post('sender-name'));
			$this->email->message($this->input->post('message'));
			
			$this->email->send();
			
			echo json_encode('success');
		}
	}
}