<p>
	<?php
		echo anchor('posts/postlist', 'Retour à la liste des posts', 'title="Retour"');
	?>
</p>

<h2><?php echo $titlePost; ?></h2>

<br />
<p>Your file was successfully uploaded!</p>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('uploads/illustrate/'.$idPost, 'Upload Another File!'); ?></p>
