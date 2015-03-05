</section>

<div class="section-in footer white-back">
	<div class="container">
		<div class="sixteen columns">
			<div class="footer-img">
				<img src="images/logo.png" alt="">
			</div>
		</div>
		<div class="sixteen columns">
			<div class="social-footer">
				<ul class="list-social">
					<li class="icon-soc tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
						<a href="#">&#xf099;</a>
					</li>
					<li class="icon-soc tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
						<a href="#">&#xf09b;</a>
					</li>
					<li class="icon-soc tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
						<a href="#">&#xf0d5;</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="sixteen columns">
			<div class="footer-copy-text">
				<p>© We are Metis. All rights reserved. 2015</p>
				<p>Made by IG Design in Kraljevo, Serbia</p>
			</div>
		</div>
	</div>
</div>
<footer class="row">
	<?php do_action('foundationPress_before_footer'); ?>
	<?php dynamic_sidebar("footer-widgets"); ?>
	<?php do_action('foundationPress_after_footer'); ?>
	
</footer>
<a class="exit-off-canvas"></a>

	<?php do_action('foundationPress_layout_end'); ?>
	</div>
</div>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/royal_preloader.min.js"></script>
<script type="text/javascript">
	Royal_Preloader.config({
		mode           : 'progress',
		background     : '#ffffff',
		showProgress   : true,
		showPercentage : true
	});
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/scroll.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/menu.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/zoom.js"></script>
<!--<script type="text/javascript" src="--><?php //echo get_stylesheet_directory_uri() ; ?><!--/js/retina-1.1.0.min.js"></script>-->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/jquery.fs.tipper.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/masonry.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/isotope.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/portfolio-custom.js"></script>
<?php wp_footer(); ?>
<?php do_action('foundationPress_before_closing_body'); ?>
</body>
</html>
