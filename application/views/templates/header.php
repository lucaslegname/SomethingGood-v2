<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<?php $this->load->helper('url'); ?>

<link rel="stylesheet" href="<?php echo base_url() ."css/reset.css" ?>" media="screen, projection, handheld" />

<link href='http://fonts.googleapis.com/css?family=Marko+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Judson:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php echo base_url() ."css/style-search-bar.css" ?>" media="screen, projection, handheld" />
<link rel="stylesheet" href="<?php echo base_url() ."css/jquery.fancybox.css" ?>" media="screen, projection, handheld" />
<link rel="stylesheet" href="<?php echo base_url() ."css/design-style.css" ?>" media="screen, projection, handheld" />
<link rel="stylesheet" href="<?php echo base_url() ."css/news-style.css" ?>" media="screen, projection, handheld" />
<link rel="stylesheet" href="<?php echo base_url() ."css/twitter.css" ?>" media="screen, projection, handheld" />
<link rel="stylesheet" href="<?php echo base_url() ."css/fonts.css" ?>" media="screen, projection, handheld" />

<title>Something Good - <?php echo $title ?></title>
</head>
<body class="no-touch">
	
<div id="main">
	<div id="header">
		<div id="icons-container">
			<?php echo anchor('posts/news/1', 'news', ''); ?> | 
			<?php echo anchor('posts/dossiers/1', 'dossiers', ''); ?> | 
			<?php echo anchor('posts/galeries/1', 'galeries', ''); ?> | 
			<?php echo anchor('posts/playlists/1', 'playlists', ''); ?> | 
			<?php echo anchor('posts/liked/1', 'liked', 'id="liked-link"'); ?>
		</div>
		<div id="search-container">
			<div id="search-button"></div>
		</div>
	</div>
	<div id="logo-background"><div id="header-title"><a class="divLink" href="<?php echo site_url() ?>"><span id="title-begin">Something</span> <span id="title-end">Good</span></a></div></div>
	
	<div id="under-header"></div>
	
	<div id="search-text">rechercher</div>
	
	<div id="top-menu" class="top-ban"></div>
	
	<div id="arrow-up"></div>
		
		
		<div id="middle-container">

			<div id="content" class="structure">