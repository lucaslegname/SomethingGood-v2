<?php 
	
	// To recognize the first post
	$i=0;
?>

<?php foreach ($postsList as $post): ?>

	<?php
		$url_post = site_url('posts/'.$post['idPost'].'/'.$post['slug']);
		
		// Sets the image table
		$postImages = $imagesList[$post['idPost']];
		
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
		
		if(!empty($postImages)){
			$size = 3;
			if(count($postImages)<3)
				$size = count($postImages);
				
			for ($ctr = 0; $ctr < $size; $ctr++) {
			    $url_image[$ctr] = get_right_url($postImages[$ctr]['url']);
			    $title_image[$ctr] = $postImages[$ctr]['titleImage'];
			}
		}
		
		// Sets the url for the like function
		$data_liked = '';
		if(in_array($post['idPost'],$idLiked)){
			$data_liked = 'data-liked="1"';
		}
		$url_like = site_url('posts/like').'/'.$post['idPost'];
	?>
	
<?php if ($i===0): ?>
<div class="main-article">
	<div class="images-container">
		<div class="first-image-place main-article-image-border-1">
			<div class="first-image overflow-hidden">
				<a class="fancybox" rel="<?php echo $post['slug']; ?>" title="<?php echo $title_image[0]; ?>" href="<?php echo $url_image[0]; ?>">
					<img src="<?php echo $url_image[0]; ?>" alt="" />
				</a>
			</div>
		</div>
		
		<div class="second-image main-article-image-border-2">
			<div class="illus-image overflow-hidden">
				<a class="fancybox" rel="<?php echo $post['slug']; ?>" title="<?php echo $title_image[1]; ?>" href="<?php echo $url_image[1]; ?>">
					<img src="<?php echo $url_image[1]; ?>" alt="" />
				</a>
			</div>
		</div>
		
		<div class="third-image main-article-image-border-3">
			<div class="illus-image overflow-hidden">
				<a class="fancybox" rel="<?php echo $post['slug']; ?>" title="<?php echo $title_image[2]; ?>" href="<?php echo $url_image[2]; ?>">
					<img src="<?php echo $url_image[2]; ?>" alt="" />
				</a>
			</div>
		</div>
	</div>
	<h2>
		<a href="<?php echo $url_post; ?>">
			<?php echo $post['title']; ?>
		</a>
	</h2>
	<div class="under-title">
		<?php echo ago(strtotime($post['dateNews'])); ?>  ⋅ 
		<?php echo $post['category']; ?> ⋅ 
		<?php echo $post['nbViews']; ?> vues ⋅ 
		<span class="nb-likes"><?php echo $post['nbLikes']; ?></span> likes 
		<span class="like-link" <?php echo $data_liked; ?>>
			- <a data-url="<?php echo $url_like; ?>">I like! :)</a>
		</span>
	</div>
	<div>
		<?php echo $post['intro']; ?>
	</div>
</div>

<?php endif ?>
	
<?php if ($i!==0): ?>
<div class="article">
	<div class="illus-image-border">
	<div class="illus-image overflow-hidden">
		<a class="fancybox" rel="<?php echo $post['slug']; ?>" title="<?php echo $title_image[0]; ?>" href="<?php echo $url_image[0]; ?>">
			<img src="<?php echo $url_image[0]; ?>" alt="" />
		</a>
	</div>
	</div>
	
	<h2>
		<a href="<?php echo $url_post; ?>">
			<?php echo $post['title']; ?>
		</a>
	</h2>
	
	<div class="under-title">
		<?php echo ago(strtotime($post['dateNews'])); ?>  ⋅ 
		<?php echo $post['category']; ?> ⋅ 
		<?php echo $post['nbViews']; ?> vues ⋅ 
		<span class="nb-likes"><?php echo $post['nbLikes']; ?></span> likes 
		<span class="like-link" <?php echo $data_liked; ?>>
			- <a data-url="<?php echo $url_like; ?>">I like! :)</a>
		</span>
	</div>
	
	<div>
		<?php echo character_limiter($post['intro'],525); ?>
	</div>

</div>
	
<?php endif ?>

<?php $i++; ?>
<?php endforeach ?>

<?php echo $pagination; ?>
