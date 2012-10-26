<div class="not-displayed">
	<form id="contact_form" class="box" method="post" action="">
		<div class="box-contact-form">
		<table class="box-table">
			<tr>
				<td><label for="login_name">Nom: </label></td>
				<td class="box-right-cell"><input type="text" id="sender-name" name="sender-name" placeholder="John Doe" /></td>
			</tr>
			<tr>
				<td><label for="login_name">Adresse mail: </label></td>
				<td class="box-right-cell"><input type="text" id="sender-mail" name="sender-mail" placeholder="john.doe@gmail.com" /></td>
			</tr>
		</table>
		<p>
			Votre message:<br />
			<textarea id="sender-message" name="message" class="box-textarea"></textarea>
		</p>
		
		
		<div id="captcha-contact" data-url="<?php echo site_url('contact/create_captcha'); ?>">
		</div>
		<div>
			<input type="text" id="sender-captcha" name="sender-captcha" placeholder="Copiez la captcha" />
			<span class="redtext captchaError">Captcha erronée!</span>
		</div>
		
		<div id="send-btn-container">
			<div id="btn-send-message" name="Envoyer" class="tagLink" data-url="<?php echo site_url('contact/send_message'); ?>" name="Envoyer"></div>
			<div id="loading-msg">Message envoyé!</div>
			<div id="loading-icon" name="Loading"></div>
			
		</div>
		</div>
	</form>
</div>