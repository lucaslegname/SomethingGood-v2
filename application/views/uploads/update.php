<p>
	<?php
		echo anchor('uploads/imagelist/'.$image_info['idPost'], 'Retour à la liste des posts', 'title="Retour"');
	?>
</p>

<?php echo form_open_multipart('uploads/update/'.$idImage);?>

<?php 
	// Part necessary to test on localhost
	if(strpos($image_info ['url'], "http")!==false){
		$url_img =  $image_info['url'];
	}
	else {
		$substr = substr($image_info['url'],strpos($image_info ['url'], "upld"));
		$url_img = base_url().$substr; 
	}
	
	// To define if the image has to be displayed or hidded
	$bclass = "redBorder";
	if($image_info['displayed']==true) {
		$bclass = "greenBorder";
	}
	
?>

<div class="illus-image-admin overflow-hidden <?php echo $bclass; ?>">
	<a class="fancybox" href="<?php echo $url_img; ?>" rel="images">
		<img alt="" src="<?php echo $url_img; ?>">
	</a>
</div>

<div id="uploadImageDiv">
	<table class="form-table">
		<tr>
			<td><label for="indexImage">Index : </label></td>
			<td><input type="text" name="indexImage" value="<?php echo $image_info['index']; ?>" id="indexImage" size="3" /></td>
		</tr>
		<tr>
			<td><label for="title">Titre : </label></td>
			<td><input type="text" name="title" id="title" size="25" value="<?php echo $image_info['titleImage']; ?>" /></td>
		</tr>
	</table>
</div>

<input type="submit" value="Update" />

</form>
