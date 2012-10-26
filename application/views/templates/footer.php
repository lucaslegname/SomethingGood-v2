<div id="link-tag">Test</div>

<?php $this->load->view('footer/contact_form.php'); ?>

<div class="not-displayed">
	<a id="sg-video-link" class="fancybox-media" href="http://www.youtube.com/watch?v=wlIqHZDfYXI"></a>
	<a id="raptorize-btn" data-url="<?php echo base_url(); ?>" href="#"></a>
</div>

<div id="footer" class="structure">
	<div id="footer-citation">
		<span style="font-style:italic;">"<?php echo $quote['content']; ?>"</span> - <?php echo $quote['autor']; ?>
	</div>
	<div id="footer-credits">
		Something Good, site développé par <?php echo anchor('users/view/10', 'Lucas Legname', ''); ?>
		<br />
		Version 2.0 - Reproduction interdite sans l'accord de l'auteur.
	</div>

	<?php $this->load->view('footer/about_list.php'); ?>

	<?php $this->load->view('footer/last_searchs.php'); ?>

	<?php $this->load->view('footer/popular_posts.php'); ?>
	
	<div id="footer-rss" class="tagLink" name="Flux RSS"><a class="divLink" href="<?php echo site_url('rss'); ?>" target="_blank"></a></div>
	<div id="footer-contact" class="tagLink" name="Feedback"><a class="divLink" href="#contact_form"></a></div>
	<div id="footer-arrow-up" class="tagLink" name="Remonter"></div>
</div>

</body>

<!-- Intégration du Javascript -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ."scripts/jquery.color.js" ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."scripts/jquery.mousewheel-3.0.6.pack.js" ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."scripts/jquery.fancybox.js" ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."scripts/jquery.raptorize.1.0.js" ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."scripts/jquery.fancybox-media.js" ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."scripts/script-search-bar.js" ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."scripts/design.js" ?>" type="text/javascript"></script>
<script src="<?php echo base_url() ."scripts/ajax-fcts.js" ?>" type="text/javascript"></script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25736722-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</html>