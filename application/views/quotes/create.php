<p>
	<?php
		echo anchor('admin/admin_panel', 'Retour au panneau d\'administration', 'title="Retour"');
	?>
</p>

<h2>Création d'une nouvelle citation</h2>

<?php echo form_open('quotes/create') ?>

	<p>
	<table class="form-table">
		<tr>
			<td><label for="autor">Auteur : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'autor',
				              'id'          => 'autor',
				              'value'       => set_value('autor'),
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('autor'); ?></td>
		</tr>
		<tr>
			<td><label for="quoteContent">Citation : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'quoteContent',
				              'id'          => 'quoteContent',
				              'value'       => set_value('quoteContent'),
				              'cols'   		=> '35',
				              'rows'		=> '3'
				            );
				
				echo form_textarea($data);
			?>
			</td>
			<td><?php echo form_error('quoteContent'); ?></td>
		</tr>
	</table>
	</p>
	

	
	<input type="submit" name="submit" value="Créer citation" /> 
	
</form>