<h2>Accès à la zone admin</h2>

<?php echo form_open('login') ?>

	<p>
	<table class="form-table">
		<tr>
			<td><label for="username">Login : </label></td>
			<td><?php echo form_input('username', ''); ?></td>
			<td><?php echo form_error('username'); ?></td>
		</tr>
		<tr>
			<td><label for="pass">Password : </label></td>
			<td><?php echo form_password('pass', ''); ?></td>
			<td><?php echo form_error('pass'); ?></td>
		</tr>
	</table>
	</p>
	<input type="submit" name="submit" value="Login" /> 
	
	<p class="error"><?php echo $message; ?></p>
	
</form>
