<div id="footer-last-searchs">
	<h2>Last searchs</h2>
	<ul>

		<?php foreach ($last_keywords as $lkeyword): ?>
		    <li>
		        <?php echo anchor('posts/search/'.rawurlencode($lkeyword['keyword']), character_limiter($lkeyword['keyword'],12), ''); ?>
			</li>
		<?php endforeach ?>
		
	</ul>
</div>