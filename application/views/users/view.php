<h2><?php echo $user_item['userName']; ?> (<?php echo $user_item['firstName']; ?> <?php echo $user_item['lastName']; ?>)</h2>

<p>Profil Twitter: <a href="http://twitter.com/<?php echo $user_item['twitterProfile']; ?>" target="_blank"><?php echo $user_item['twitterProfile']; ?></a></p>

<?php echo $user_item['biography']; ?>