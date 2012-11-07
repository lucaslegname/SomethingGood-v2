
<?php 
	// To not rely on a default timezone
	date_default_timezone_set('Europe/Paris');
	
	// To recognize the first post
	$i=0;
?>


	<?php
		$url_post = site_url('posts/'.$post_item['idPost'].'/'.$post_item['slug']);
		
		// Sets the image table
		$postImages = $imagesList;
		
		$url_image = array(
		    0  => 'http://fondecran.biz/fondecran/kangourous/kangourou_17.jpg',
		    1  => 'http://fondecran.biz/fondecran/kangourous/kangourou_17.jpg',
		    2  => 'http://fondecran.biz/fondecran/kangourous/kangourou_17.jpg',
		);
		$title_image = array(
		    0  => '',
		    1  => '',
		    2  => '',
		);
		
		$size = 0;
		if(!empty($postImages)){
			$size = count($postImages);
				
			for ($ctr = 0; $ctr < $size; $ctr++) {
			    $url_image[$ctr] = get_right_url($postImages[$ctr]['url']);
			    $title_image[$ctr] = $postImages[$ctr]['titleImage'];
			}
		}
		
		// Sets the url for the like function
		$data_liked = '';
		if(in_array($post_item['idPost'],$idLiked)){
			$data_liked = 'data-liked="1"';
		}
		$url_like = site_url('posts/like').'/'.$post_item['idPost'];
	?>
	

<div class="view-article">
	<h2>
		<a href="<?php echo $url_post; ?>">
			<?php echo $post_item['title']; ?>
		</a>
	</h2>
	<div class="under-title">
		<?php echo ago(strtotime($post_item['dateNews'])); ?>  ⋅ 
		<?php echo $post_item['category']; ?> ⋅ 
		<?php echo ($post_item['nbViews']+1); ?> vues ⋅ 
		<span class="nb-likes"><?php echo $post_item['nbLikes']; ?></span> likes 
		<span class="like-link" <?php echo $data_liked; ?>>
			- <a data-url="<?php echo $url_like; ?>">I like! :)</a>
		</span>
	</div>
	
	<div class="intro">
		<?php echo $post_item['intro']; ?>
	</div>

	<div class="images-container">
		<div class="first-image-place main-article-image-border-1">
			<div class="first-image overflow-hidden">
				<a class="fancybox" rel="<?php echo $post_item['slug']; ?>" title="<?php echo $title_image[0]; ?>" href="<?php echo $url_image[0]; ?>">
					<img src="<?php echo $url_image[0]; ?>" alt="" />
				</a>
			</div>
		</div>
		
		<div class="second-image main-article-image-border-2">
			<div class="illus-image overflow-hidden">
				<a class="fancybox" rel="<?php echo $post_item['slug']; ?>" title="<?php echo $title_image[1]; ?>" href="<?php echo $url_image[1]; ?>">
					<img src="<?php echo $url_image[1]; ?>" alt="" />
				</a>
			</div>
		</div>
		
		<div class="third-image main-article-image-border-3">
			<div class="illus-image overflow-hidden">
				<a class="fancybox" rel="<?php echo $post_item['slug']; ?>" title="<?php echo $title_image[2]; ?>" href="<?php echo $url_image[2]; ?>">
					<img src="<?php echo $url_image[2]; ?>" alt="" />
				</a>
			</div>
		</div>
	</div>
	

	
	<div class="content">
		<?php echo $post_item['content']; ?>
	</div>
	
	<?php if($size>3): ?>
	<div class="img-gallery">
		<?php for ($i=3;$i<$size;$i++): ?>
			
			<div class="illus-image-news-border">
				<div class="illus-image-news overflow-hidden">
					<a class="fancybox" rel="<?php echo $post_item['slug']; ?>" title="<?php echo $title_image[$i]; ?>" href="<?php echo $url_image[$i]; ?>">
						<img src="<?php echo $url_image[$i]; ?>" alt="" />
					</a>
				</div>
			</div>
		
		<?php endfor ?>
	</div>
	<?php endif ?>
	
	<div class="comments-zone">
		<?php $this->load->view('comments/view.php'); ?>
		<?php $this->load->view('comments/add.php'); ?>
	</div>
</div>
