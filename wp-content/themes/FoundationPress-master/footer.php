</section>

<div class="section-in footer white-back">
	<div class="container">
		<div class="sixteen columns">
			<div class="footer-img">
				<img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>">
			</div>
		</div>
		<div class="sixteen columns">
			<div class="social-footer">
				<ul class="list-social-nav">
					<?php
					$type = 'link';
					$args = array(
						'post_type' => $type,
						'post_status' => 'publish',
						'orderby' => 'title'
					);
					$count = 1;
					$my_query = null;
					$my_query = new WP_Query($args);
					if ($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post();
						?>

						<li class="icon-soc-nav tipped" data-title="<?php the_title();?>" data-tipper-options='{"direction":"top","follow":"true"}'>

							<a href="<?php
							$myExcerpt = get_the_excerpt();
							$tags = array("<p>", "</p>");
							$myExcerpt = str_replace($tags, "", $myExcerpt);
							echo $myExcerpt;
							?>" class="fa fa-<?php the_title();?> fa-2x"> </a>
						</li>
						<?php $count++; endwhile; endif; wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
		<div class="sixteen columns">
			<div class="footer-copy-text">
				<p>© A Hack By JeR. All rights reserved. 2015</p>

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
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/classie.js"></script>


<script type="text/javascript">
	//Products

	jQuery(document).ready(function($){
		var visionTrigger = $('.cd-3d-trigger'),
			galleryItems = $('.no-touch #cd-gallery-items').children('li'),
			galleryNavigation = $('.cd-item-navigation a');

		//on mobile - start/end 3d vision clicking on the 3d-vision-trigger
		visionTrigger.on('click', function(){
			$this = $(this);
			if( $this.parent('li').hasClass('active') ) {
				$this.parent('li').removeClass('active');
				hideNavigation($this.parent('li').find('.cd-item-navigation'));
			} else {
				$this.parent('li').addClass('active');
				updateNavigation($this.parent('li').find('.cd-item-navigation'), $this.parent('li').find('.cd-item-wrapper'));
			}
		});

		//on desktop - update navigation visibility when hovering over the gallery images
		galleryItems.hover(
			//when mouse enters the element, show slider navigation
			function(){
				$this = $(this).children('.cd-item-wrapper');
				updateNavigation($this.siblings('nav').find('.cd-item-navigation').eq(0), $this);
			},
			//when mouse leaves the element, hide slider navigation
			function(){
				$this = $(this).children('.cd-item-wrapper');
				hideNavigation($this.siblings('nav').find('.cd-item-navigation').eq(0));
			}
		);

		//change image in the slider
		galleryNavigation.on('click', function(){
			var navigationAnchor = $(this);
			direction = navigationAnchor.text(),
				activeContainer = navigationAnchor.parents('nav').eq(0).siblings('.cd-item-wrapper');

			( direction=="Next") ? showNextSlide(activeContainer) : showPreviousSlide(activeContainer);
			updateNavigation(navigationAnchor.parents('.cd-item-navigation').eq(0), activeContainer);
		});
	});

	function showNextSlide(container) {
		var itemToHide = container.find('.cd-item-front'),
			itemToShow = container.find('.cd-item-middle'),
			itemMiddle = container.find('.cd-item-back'),
			itemToBack = container.find('.cd-item-out').eq(0);

		itemToHide.addClass('move-right').removeClass('cd-item-front').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			itemToHide.addClass('hidden');
		});
		itemToShow.addClass('cd-item-front').removeClass('cd-item-middle');
		itemMiddle.addClass('cd-item-middle').removeClass('cd-item-back');
		itemToBack.addClass('cd-item-back').removeClass('cd-item-out');
	}

	function showPreviousSlide(container) {
		var itemToMiddle = container.find('.cd-item-front'),
			itemToBack = container.find('.cd-item-middle'),
			itemToShow = container.find('.move-right').slice(-1),
			itemToOut = container.find('.cd-item-back');

		itemToShow.removeClass('hidden').addClass('cd-item-front');
		itemToMiddle.removeClass('cd-item-front').addClass('cd-item-middle');
		itemToBack.removeClass('cd-item-middle').addClass('cd-item-back');
		itemToOut.removeClass('cd-item-back').addClass('cd-item-out');

		//wait until itemToShow does'n have the 'hidden' class, then remove the move-right class
		//in this way, transition works also in the way back
		var stop = setInterval(checkClass, 100);

		function checkClass(){
			if( !itemToShow.hasClass('hidden') ) {
				itemToShow.removeClass('move-right');
				window.clearInterval(stop);
			}
		}
	}

	function updateNavigation(navigation, container) {
		var isNextActive = ( container.find('.cd-item-middle').length > 0 ) ? true : false,
			isPrevActive = 	( container.children('li').eq(0).hasClass('cd-item-front') ) ? false : true;
		(isNextActive) ? navigation.find('a').eq(1).addClass('visible') : navigation.find('a').eq(1).removeClass('visible');
		(isPrevActive) ? navigation.find('a').eq(0).addClass('visible') : navigation.find('a').eq(0).removeClass('visible');
	}

	function hideNavigation(navigation) {
		navigation.find('a').removeClass('visible');
	}
</script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/shop-custom.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ; ?>/js/about-custom.js"></script>
<?php wp_footer(); ?>
<?php do_action('foundationPress_before_closing_body'); ?>
</body>
</html>
