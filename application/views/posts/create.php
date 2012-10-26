<p>
	<?php
		echo anchor('admin/admin_panel', 'Retour au panneau d\'administration', 'title="Retour"');
	?>
</p>

<h2>Création d'un nouveau post</h2>

<?php echo form_open('posts/create') ?>

	<p>
	<table class="form-table">
		<tr>
			<td><label for="titlePost">Titre : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'titlePost',
				              'id'          => 'titlePost',
				              'value'       => set_value('titlePost'),
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('titlePost'); ?></td>
		</tr>
		<tr>
			<td><label for="categoryPost">Catégorie : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'categoryPost',
				              'id'          => 'categoryPost',
				              'value'       => set_value('categoryPost'),
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('categoryPost'); ?></td>
		</tr>
		<tr>
			<td><label for="hashtagPost">Hashtag : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'hashtagPost',
				              'id'          => 'hashtagPost',
				              'value'       => set_value('hashtagPost'),
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('hashtagPost'); ?></td>
		</tr>
	</table>
	</p>
	<p>
	Intro : <br /><br />
	<?php 
		$data = array(
		              'name'        => 'introPost',
		              'id'          => 'introPost',
		              'value'       => set_value('introPost'),
		              'rows'   		=> '15',
		              'class'   	=> 'inputArea'
		            );
		
		echo form_textarea($data);
	?><br />
	<?php echo form_error('introPost'); ?>
	</p>
	<p>
	Contenu : <br /><br />
	<?php 
		$data = array(
		              'name'        => 'contentPost',
		              'id'          => 'contentPost',
		              'value'       => set_value('contentPost'),
		              'rows'   		=> '30',
		              'class'   	=> 'inputArea'
		            );
		
		echo form_textarea($data);
	?><br />
	<?php echo form_error('contentPost'); ?>
	</p>
	

	
	<input type="submit" name="submit" value="Créer post" /> 
	
</form>



<?php $this->load->view('tinymce/tinymce_full'); ?>

