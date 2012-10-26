<p>
	<?php
		echo anchor('quotes/quotelist', 'Retour à la liste des citations', 'title="Retour"');
	?>
</p>

<h2>Mise-à-jour d'une citation</h2>

<?php echo form_open('quotes/update/'.$quote_info['idQuote']) ?>

	<p>
	<table class="form-table">
		<tr>
			<td><label for="autor">Auteur : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'autor',
				              'id'          => 'autor',
				              'value'       => set_value('autor',$quote_info['autor']),
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
				              'value'       => set_value('quoteContent',$quote_info['content']),
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
	

	
	<input type="submit" name="submit" value="Mettre à jour citation" /> 
	
</form>