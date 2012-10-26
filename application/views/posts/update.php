<p>
	<?php
		echo anchor('posts/postlist', 'Retour à la liste des posts', 'title="Retour"');
	?>
</p>

<h2>Mise-à-jour d'un post</h2>

<?php echo form_open('posts/update/'.$post_info['idPost']) ?>

	<p>
	<table class="form-table">
		<tr>
			<td><label for="titlePost">Titre : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'titlePost',
				              'id'          => 'titlePost',
				              'value'       => set_value('titlePost',$post_info['title']),
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
				              'value'       => set_value('categoryPost',$post_info['category']),
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
				              'value'       => set_value('hashtagPost',$post_info['hashtag']),
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
		              'value'       => set_value('introPost',$post_info['intro']),
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
		              'value'       => set_value('contentPost',$post_info['content']),
		              'rows'   		=> '30',
		              'class'   	=> 'inputArea'
		            );
		
		echo form_textarea($data);
	?><br />
	<?php echo form_error('contentPost'); ?>
	</p>
	

	
	<input type="submit" name="submit" value="Mettre à jour post" /> 
	
</form>



<?php $this->load->view('tinymce/tinymce_full'); ?>

