<div class="view-comments-zone">

<?php $i=1; ?>
<?php foreach ($commentsList as $comment): ?>

	<?php
		$last_comment_id = $this->input->cookie('sg_last_inserted_comment', TRUE);
		$link_delete = '';
		if($this->session->userdata('logged_in') || $last_comment_id==$comment['idComment'])
			$link_delete = '<a class="com-delete-btn" data-url="'.site_url('comments/delete/'.$comment['idComment']).'">Supprimer</a> - ';
	?>
	
	<div class="comment-wrapper">
		<div class="comment-top-wrapper">
			<div class="comment-title"><?php echo $i.'. <a style="color:'.$comment['htmlColor'].'" href="mailto:'.$comment['autorEMailAddress'].'">'.$comment['autorName'].'</a>'; ?></div>
			<div class="comment-date">
				<?php echo $link_delete.ago(strtotime($comment['dateComment'])).'…'; ?>
			</div>
		</div>
		<div class="comment-content">
			<?php echo $comment['contentComment']; ?>
		</div>
	</div>
	
	<?php $i++; ?>
<?php endforeach ?>

</div>

<input type="hidden" id="idNextComment" value="<?php echo $i; ?>" />

<div id="comment-blueprint" class="not-displayed">
	
	<div class="comment-wrapper">
		<div class="comment-top-wrapper">
			<div class="comment-title"></div>
			<div class="comment-date"><?php echo '<a class="com-delete-btn" data-url="'.site_url('comments/delete/').'">Supprimer</a> - '; ?></div>
		</div>
		<div class="comment-content"></div>
	</div>
	
</div>