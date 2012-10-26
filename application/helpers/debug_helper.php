<?php 

function get_right_url($url)
{
	if(strpos($url, "http")!==false){
		$my_url_img =  $url;
	}
	else {
		$substr = substr($url,strpos($url, "upld"));
		$my_url_img = base_url().$substr; 
	}
	return $my_url_img;
}   
