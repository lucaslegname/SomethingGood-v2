<p>
	<?php
		echo anchor('admin/admin_panel', 'Retour au panneau d\'administration', 'title="Retour"');
	?>
</p>

<h2>Création d'un nouvel utilisateur</h2>

<?php echo form_open('users/create') ?>

	<p>
	<table class="form-table">
		<tr>
			<td><label for="username">Login : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'username',
				              'id'          => 'username',
				              'value'       => set_value('username'),
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('username'); ?></td>
		</tr>
		<tr>
			<td><label for="pass">Password : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'pass',
				              'id'          => 'pass',
				              'value'       => '',
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_password($data);
			?>
			</td>
			<td><?php echo form_error('pass'); ?></td>
		</tr>
		<tr>
			<td><label for="repeat-pass">Password (repeat) : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'repeat-pass',
				              'id'          => 'repeat-pass',
				              'value'       => '',
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_password($data);
			?>
			</td>
			<td><?php echo form_error('repeat-pass'); ?></td>
		</tr>

		<tr>
			<td><label for="first-name">Prénom : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'first-name',
				              'id'          => 'first-name',
				              'value'       => set_value('first-name'),
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('first-name'); ?></td>
		</tr>
		<tr>
			<td><label for="last-name">Nom : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'last-name',
				              'id'          => 'last-name',
				              'value'       => set_value('last-name'),
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('last-name'); ?></td>
		</tr>
		<tr>
			<td><label for="email">Adresse email : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'email',
				              'id'          => 'email',
				              'value'       => set_value('email'),
				              'maxlength'   => '100',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('email'); ?></td>
		</tr>
		<tr>
			<td><label for="HTML-color">Couleur : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'HTML-color',
				              'id'          => 'HTML-color',
				              'value'       => set_value('HTML-color'),
				              'maxlength'   => '7',
				              'size'        => '7'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('HTML-color'); ?></td>
		</tr>
		<tr>
			<td><label for="twitter-profile">Profil twitter : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'twitter-profile',
				              'id'          => 'twitter-profile',
				              'value'       => set_value('twitter-profile'),
				              'maxlength'   => '30',
				              'size'        => '25'
				            );
				
				echo form_input($data);
			?>
			</td>
			<td><?php echo form_error('twitter-profile'); ?></td>
		</tr>
		<tr>
			<td>Writer?</td>
			<td>
			<?php 
				$checked = false;
				if (isset($_POST['writer']))
					$checked = true;
					
				$data = array(
				    'name'        => 'writer',
				    'id'          => 'writer',
				    'value'		  => '1',
				    'checked'     => $checked
				    );
				echo form_checkbox($data); 
			?>
			</td>
		</tr>
		<tr>
			<td>Admin?</td>
			<td>
			<?php 
			$checked = false;
			if (isset($_POST['admin']))
				$checked = true;
				
			$data = array(
			    'name'        => 'admin',
			    'id'          => 'admin',
			    'value'		  => '1',
			    'checked'     => $checked
			    );
			
			echo form_checkbox($data); 
			?>
			</td>
		</tr>
	</table>
	<p>
	Biographie : <br /><br />
	<?php 
		$data = array(
		              'name'        => 'bio',
		              'id'          => 'bio',
		              'value'       => set_value('bio'),
		              'rows'   		=> '15',
		              'class'   	=> 'inputArea'
		            );
		
		echo form_textarea($data);
	?><br />
	<?php echo form_error('bio'); ?>
	</p>
	
	</p>
	
	<input type="submit" name="submit" value="Créer utilisateur" /> 
	
</form>


<?php $this->load->view('tinymce/tinymce_full'); ?>