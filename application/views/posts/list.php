<p>
	<?php
		echo anchor('admin/admin_panel', 'Retour au panneau d\'administration', 'title="Retour"');
	?>
</p>

<table class="display-table">
	<tr>
		<th>Id</th>
		<th>Titre</th>
		<th>Catégorie</th>
		<th>Publié</th>
		<th></th>

	</tr>
<?php foreach ($postsList as $post): ?>

	<?php
		$id = $post['idPost'];
		$upd_link = 'posts/update/'.$post['idPost'];
		$del_link = 'posts/delete/'.$post['idPost'];
		$view_link = 'posts/'.$post['idPost'].'/'.$post['slug'];
		$illus_link = 'uploads/imagelist/'.$post['idPost'];
		
		$publish_text = 'Publier';
		$publish_url = 'posts/publish/'.$post['idPost'].'/true';
		if($post['published']==true) {
			$publish_text = 'Dépublier';
			$publish_url = 'posts/publish/'.$post['idPost'].'/false';
		}

	?>
    <tr>
    	<td><?php echo $id ?></td>
        <td class="limited-width"><?php echo $post['title'] ?></td>
        <td><?php echo $post['category'] ?></td>
        <td><?php echo $post['published'] ?></td>
        <td class="txt-right"><?php echo anchor($publish_url, $publish_text, ''); ?> |
        <?php echo anchor($view_link, 'Voir', ''); ?> |
        <?php echo anchor($illus_link, 'Images', ''); ?> |
        <?php echo anchor($upd_link, 'Mod.', ''); ?> |
        <?php echo anchor($del_link, 'Suppr.', 'class="confirm"'); ?></td>
	</tr>

<?php endforeach ?>
</table>

<?php echo $pagination; ?>