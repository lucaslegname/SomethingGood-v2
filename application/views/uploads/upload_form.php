<p>
	<?php
		echo anchor('posts/postlist', 'Retour à la liste des posts', 'title="Retour"');
	?>
</p>

<h2>Illustration: <?php echo $titlePost; ?></h2>

<div class="error"><p><?php echo $error; ?></p></div>

<?php echo form_open_multipart('uploads/do_upload/'.$idPost);?>

<input type="hidden" name="idPost" value="<?php echo $idPost; ?>" />

<div id="uploadImageDiv">
	<table class="form-table">
		<tr>
			<td><label for="indexImage">Index : </label></td>
			<td><input type="text" name="indexImage" value="1" id="indexImage" size="3" /></td>
		</tr>
		<tr>
			<td><label for="userfile">Fichier : </label></td>
			<td><input type="file" name="userfile" size="20" /></td>
		</tr>
		<tr>
			<td><label for="title">Titre : </label></td>
			<td><input type="text" name="title" value="" id="title" size="25" /></td>
		</tr>
	</table>
</div>

<br /><br />

<input type="submit" value="Upload file" />

</form>
