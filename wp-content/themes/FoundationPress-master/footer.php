</section>
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
