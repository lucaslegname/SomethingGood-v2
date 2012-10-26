<h2>Last posts</h2>
<h3>some stuffs to read...</h3>
<ul class="side-link">

<?php foreach ($last_posts as $lpost): ?>
    <li>
        <?php echo anchor('posts/'.$lpost['idPost'].'/'.$lpost['slug'], $lpost['title'], ''); ?>
	</li>
<?php endforeach ?>

</ul>