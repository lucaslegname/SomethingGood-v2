

<div class="add-comment-form">

<div class="comment-title">
	Ajouter un commentaire
</div>

<div class="comment-panel">
<form id="add_comment" method="post" action="">

<div class="com-left-pan">
	<table class="com-table">
		<tr>
			<td><label for="login_name">Nom: </label></td>
			<td class="box-right-cell"><input type="text" id="sender-name-com" name="sender-name-com" placeholder="John Doe" /></td>
		</tr>
		<tr>
			<td><label for="login_name">Adresse mail: </label></td>
			<td class="box-right-cell"><input type="text" id="sender-mail-com" name="sender-mail-com" placeholder="john.doe@gmail.com" /></td>
		</tr>
	</table>
	<div class="com-captcha-container">
		<div id="captcha-comment" data-url="<?php echo site_url('contact/create_captcha'); ?>">
		</div>
		<div>
			<input type="text" id="sender-captcha-com" name="sender-captcha-com" placeholder="Copiez la captcha" />
		</div>
	</div>	

</div>

<div class="com-right-pan">
	Votre message:<br />
	<textarea id="sender-message-com" name="message-com" class="com-textarea"></textarea>
</div>
	
</form>
</div>


<div id="send-btn-container">
	<div id="btn-send-comment" name="Envoyer" class="tagLink" data-url="<?php echo site_url('comments/add/'.$post_item['idPost']); ?>" name="Envoyer"></div>			
</div>

</div>