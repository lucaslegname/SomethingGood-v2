<div id="footer-third">
	<h2>Popular posts</h2>
	<ul>

		<?php foreach ($popular_posts as $ppost): ?>
		    <li>
		        <?php echo anchor('posts/'.$ppost['idPost'].'/'.$ppost['slug'], $ppost['title'], ''); ?>
			</li>
		<?php endforeach ?>
		
	</ul>
</div>