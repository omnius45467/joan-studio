<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php if ( is_category() ) {
			echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_tag() ) {
			echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title(''); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		}  elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} elseif ( is_single() ) {
			wp_title('');
		} else {
			echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
		} ?></title>
		
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/foundation.css" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/base.css"/>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/skeleton.css"/>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/layout.css"/>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/retina.css"/>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/owl.carousel.css"/>

		<link rel="icon" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-precomposed.png">

		<?php wp_head(); ?>
	</head>
	<body class="royal_preloader" c<?php body_class(); ?>>
	<?php do_action('foundationPress_after_body'); ?>
	
	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">
	
	<?php do_action('foundationPress_layout_start'); ?>

		<nav>
			<div class="cd-primary-nav">
				<ul class="cd-scndr-nav">
					<li class="cd-label"><a href="index.html" class="curent-nav-color"><?php bloginfo( 'name' ); ?></a>
						<ul>
							<li><a href="index.html" class="curent-nav-color">featured slider</a></li>
							<li><a href="index1.html">featured image</a></li>
							<li><a href="index2.html">featured html video</a></li>
							<li><a href="index3.html">featured youtube video</a></li>
							<li><a href="index4.html">no-spaced thirds</a></li>
							<li><a href="index5.html">classic grid</a></li>
							<li><a href="index6.html">lightbox gallery</a></li>
							<li><a href="index7.html">3d Curtain effect</a></li>
						</ul>
					</li>

					<li class="cd-label"><a href="about.html">About us</a></li>

					<li class="cd-label"><a href="blog.html">Blog</a>

						<ul>
							<li><a href="blog.html">blog page</a></li>
							<li><a href="post.html">single post</a></li>
						</ul>

					</li>

					<li class="cd-label"><a href="shop.html">shop</a>

						<ul>
							<li><a href="shop.html">shop page</a></li>
							<li><a href="product.html">product page</a></li>
						</ul>

					</li>

					<li class="cd-label"><a href="contact.html">Contact</a>
						<ul>
							<li><a href="contact.html">default</a></li>
							<li><a href="contact1.html">minimal</a></li>
						</ul>
					</li>

					<li class="cd-label"><a href="shortcodes.html">Features</a>
						<ul>
							<li><a href="shortcodes.html">shortcodes</a></li>
							<li><a href="footers.html">footers</a></li>
							<li><a href="404.html">404 page</a></li>
							<li><a href="500.html">500 page</a></li>
							<li><a href="comingsoon.html">coming soon</a></li>
						</ul>
					</li>
				</ul>

				<div class="social-nav">
					<ul class="list-social-nav">
						<li class="icon-soc-nav tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf099;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf09b;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf0d5;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="YouTube"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf16a;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="Vimeo"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf194;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="Tumblr"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf174;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="facebook"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf230;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="Skype"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf17e;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="soundcloud"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf1be;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="pinterest"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf231;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="linkedin"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf08c;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="lastfm"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf202;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="dropbox"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf16b;</a>
						</li>
						<li class="icon-soc-nav tipped" data-title="behance"  data-tipper-options='{"direction":"top","follow":"true"}'>
							<a href="#">&#xf1b4;</a>
						</li>
					</ul>
				</div>

			</div>
		</nav>

	<?php get_template_part('parts/off-canvas-menu'); ?>

	<?php get_template_part('parts/top-bar'); ?>

<section class="container" role="document">
	<section class="cd-section">
		<div class="cd-block">
			<div class="portfolio-top">

				<div id="owl-top" class="owl-carousel owl-theme">

					<?php the_content(); ?>
					<?php
					$type = 'slider';
					$args = array(
						'post_type' => $type,
						'post_status' => 'publish',
						'orderby' => 'title',
						"title" => 'SERVICE TITLE',
						"text" => 'SERVICE DETAILS',
						"image" => 'SERVICE IMAGE',
						"url" => 'SERVICE BUTTON URL'

					);
					$count = 1;
					$my_query = null;
					$my_query = new WP_Query($args);
					if ($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post();
						?>
						<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 500,500 ), false, '' );?>
						
					<div class="item top-image-1" style="background:url('<?php echo $src[0]; ?>');">

						<div class="hero-top">
							<div class="container">
								<div class="sixteen columns">
									<div class="hero-text right">
										<h5><?php the_title();?></h5>
										<div class="hero-subtext-2 right"><?php the_content();?></div>
									</div>
								</div>
							</div>
						</div>

					</div>
						<?php $count++; endwhile; endif; wp_reset_postdata(); ?>

					

				</div>

				<a href="#scroll-link" class="scroll scroll-down-arrow"></a>

			</div>
		</div>
	</section>
	<?php do_action('foundationPress_after_header'); ?>