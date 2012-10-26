<?php

class Instagram extends MY_Controller {

	public function get_last_picture()
	{
		echo json_encode($this->_get_instagram());
	}
	
	public function _get_instagram($user_id=185215311,$count=5,$width=180,$height=180){
	
	    $url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?access_token=13137.f59def8.1a759775695548999504c219ce7b2ecf&count='.$count;
	
	    // Also Perhaps you should cache the results as the instagram API is slow
	    $cache = './cache/'.sha1($url).'.json';
	    if(file_exists($cache) && filemtime($cache) > time() - 60*60){
	        // If a cache file exists, and it is newer than 1 hour, use it
	        $jsonData = json_decode(file_get_contents($cache));
	    } else {
	        $jsonData = json_decode((file_get_contents($url)));
	        file_put_contents($cache,json_encode($jsonData));
	    }
	
		$rdm = rand(0,4);
		$ctr = 0;
	    //$result = '<div id="instagram">'.PHP_EOL;
	    $result = '';
	    foreach ($jsonData->data as $key=>$value) {
	    	if($ctr==$rdm){
	        	$result .= "\t".'<a class="fancybox" data-fancybox-group="gallery-instagram" 
	                            title="'.htmlentities($value->caption->text).'"href="'.$value->images->standard_resolution->url.'">
	                          <div class="insta-pic-border"><img class="insta-pic" src="'.$value->images->low_resolution->url.'" alt="'.$value->caption->text.'" width="'.$width.'" height="'.$height.'" /></div>
	                          </a>'.PHP_EOL;
	         }
	         else {
	         	$result .= "\t".'<div class="not-displayed"><a class="fancybox" data-fancybox-group="gallery-instagram" 
	         	                title="'.htmlentities($value->caption->text).'"href="'.$value->images->standard_resolution->url.'">
	         	              </a></div>'.PHP_EOL;
	         }
	         $ctr++;
	    }
	    //$result .= '</div>'.PHP_EOL;
	    return $result;
	}
	
}