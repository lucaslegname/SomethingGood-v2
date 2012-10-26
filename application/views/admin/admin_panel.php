<h2>Zone admin</h2>

<p>
	Bienvenue <?php echo $username; ?>! :)
</p>


<p>
	Que voulez-vous faire?
	<ul>
		<li><?php echo anchor('users/create', 'Créer un nouvel utilisateur', 'title="Créer utilisateur"'); ?></li>
		<li><?php echo anchor('users/userlist', 'Liste des utilisateurs', 'title="Liste des utilisateurs"'); ?></li>
	</ul>
	
	<ul>
		<li><?php echo anchor('posts/create', 'Créer un nouvel article', 'title="Créer article"'); ?></li>
		<li><?php echo anchor('posts/postlist', 'Liste des articles', 'title="Liste des articles"'); ?></li>
	</ul>
	
	<ul>
		<li><?php echo anchor('quotes/create', 'Créer une nouvelle citation', 'title="Créer citation"'); ?></li>
		<li><?php echo anchor('quotes/quotelist', 'Liste des citations', 'title="Liste des citations"'); ?></li>
	</ul>
	
	<ul>
		<li><?php echo anchor('users/logout', 'Se déconnecter', 'title="Se déconnecter"'); ?></li>
	</ul>
</p>