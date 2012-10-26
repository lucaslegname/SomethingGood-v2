<p>
	<?php
		echo anchor('users/userlist', 'Retour à la liste des utilisateurs', 'title="Retour"');
	?>
</p>

<h2>Mise-à-jour d'un utilisateur</h2>

<?php echo form_open('users/update/'.$user_info['idUser']) ?>

	<p>
	<table class="form-table">
		<tr>
			<td><label for="username">Login : </label></td>
			<td>
			<?php 
				$data = array(
				              'name'        => 'username',
				              'id'          => 'username',
				              'value'       => set_value('username',$user_info['userName']),
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
				              'value'       => set_value('first-name',$user_info['firstName']),
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
				              'value'       => set_value('last-name',$user_info['lastName']),
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
				              'value'       => set_value('email',$user_info['emailAddress']),
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
				              'value'       => set_value('HTML-color',$user_info['defaultHTMLColor']),
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
				              'value'       => set_value('twitter-profile',$user_info['twitterProfile']),
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
				if (isset($user_info['isWriter']) && $user_info['isWriter']!=0)
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
			if (isset($user_info['isAdmin']) && $user_info['isAdmin']!=0)
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
		<tr>
			<td>Active?</td>
			<td>
			<?php 
			$checked = false;
			if (isset($user_info['active']) && $user_info['active']!=0)
				$checked = true;
				
			$data = array(
			    'name'        => 'active',
			    'id'          => 'active',
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
		              'value'       => set_value('bio',$user_info['biography']),
		              'rows'   		=> '15',
		              'class'   	=> 'inputArea'
		            );
		
		echo form_textarea($data);
	?><br />
	<?php echo form_error('bio'); ?>
	</p>
	
	</p>
	
	<input type="submit" name="submit" value="Mettre à jour" /> 
	
</form>

<?php $this->load->view('tinymce/tinymce_full'); ?>