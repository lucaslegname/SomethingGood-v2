<p>
	<?php
		echo anchor('posts/postlist', 'Retour à la liste des posts', 'title="Retour"');
	?>
</p>

<?php foreach ($imagesList as $image): ?>

	<?php 		
		// To define if the image has to be displayed or hidded
		$publish_text = 'Afficher';
		$publish_url = 'uploads/display/'.$image['idImage'].'/true';
		$bclass = "redBorder";
		if($image['displayed']==true) {
			$publish_text = 'Cacher';
			$publish_url = 'uploads/display/'.$image['idImage'].'/false';
			$bclass = "greenBorder";
		}
	?>

<table class="display-img-table">
<tr><td class="width250">
    	<div class="illus-image-admin overflow-hidden <?php echo $bclass; ?>">
	    	<a class="fancybox" href="<?php echo get_right_url($image['url']); ?>" rel="images">
	    		<img alt="" src="<?php echo get_right_url($image['url']); ?>">
	    	</a>
    	</div>
</td><td>
	<p>
    	<b>Index:</b> <?php echo $image['index'] ?><br />
		<b>Titre:</b> <?php echo $image['titleImage'] ?><br />
	</p>
	<p>
		<?php echo anchor($publish_url, $publish_text, ''); ?> | <?php echo anchor('uploads/update/'.$image['idImage'], 'Modifier', ''); ?> | <?php echo anchor('uploads/delete/'.$image['idImage'], 'Supprimer', ''); ?>
	</p>
</td></tr>
</table>

		<p></p>

<?php endforeach ?>


<p>
<?php
	$illus_link = 'uploads/illustrate/'.$idPost;
	echo anchor($illus_link, 'Ajouter une image', '');
?>
</p>

