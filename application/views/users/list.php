<p>
	<?php
		echo anchor('admin/admin_panel', 'Retour au panneau d\'administration', 'title="Retour"');
	?>
</p>

<table class="display-table">
	<tr>
		<th>Id</th>
		<th>Username</th>
		<th>Email</th>
		<th>Writer?</th>
		<th>Admin?</th>
		<th>Active?</th>
		<th></th>
	</tr>
<?php foreach ($usersList as $user): ?>

	<?php
		$id = $user['idUser'];
		$upd_link = 'users/update/'.$user['idUser'];
		$del_link = 'users/delete/'.$user['idUser'];
		$view_link = 'users/view/'.$user['idUser'];
	?>
    <tr>
    	<td><?php echo $id ?></td>
        <td><?php echo $user['userName'] ?></td>
        <td class="limited-width"><?php echo $user['emailAddress'] ?></td>
        <td><?php echo $user['isWriter'] ?></td>
        <td><?php echo $user['isAdmin'] ?></td>
        <td><?php echo $user['active'] ?></td>
        <td class="txt-right"><?php echo anchor($view_link, 'Voir', 'title="Voir"'); ?> | <?php echo anchor($upd_link, 'Mod.', 'title="Modifier"'); ?> |
        <?php echo anchor($del_link, 'Suppr.', 'title="Supprimer" class="confirm"'); ?></td>
	</tr>

<?php endforeach ?>
</table>