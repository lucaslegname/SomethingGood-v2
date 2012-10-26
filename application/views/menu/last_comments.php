<h2>Last comments</h2>
<h3>your turn to speak!</h3>
<ul class="side-link">

<?php foreach ($last_comments as $lcomment): ?>
    <li>
        <?php echo anchor('posts/'.$lcomment['idPost'].'/'.$lcomment['slug'], character_limiter($lcomment['autorName'].' - '.$lcomment['title'],30), ''); ?>
	</li>
<?php endforeach ?>

</ul>