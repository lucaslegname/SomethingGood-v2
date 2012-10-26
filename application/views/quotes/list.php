<p>
	<?php
		echo anchor('admin/admin_panel', 'Retour au panneau d\'administration', 'title="Retour"');
	?>
</p>

<table class="display-table">
	<tr>
		<th>Id</th>
		<th>Citation</th>
		<th>Autor</th>
		<th></th>
	</tr>
<?php foreach ($quotesList as $quote): ?>

	<?php
		$id = $quote['idQuote'];
		$upd_link = 'quotes/update/'.$quote['idQuote'];
		$del_link = 'quotes/delete/'.$quote['idQuote'];
	?>
    <tr>
    	<td><?php echo $id ?></td>
        <td class="limited-width"><?php echo $quote['content'] ?></td>
        <td><?php echo $quote['autor'] ?></td>
        <td class="txt-right"><?php echo anchor($upd_link, 'Mod.', 'title="Modifier"'); ?> |
        <?php echo anchor($del_link, 'Suppr.', 'title="Supprimer" class="confirm"'); ?></td>
	</tr>

<?php endforeach ?>
</table>