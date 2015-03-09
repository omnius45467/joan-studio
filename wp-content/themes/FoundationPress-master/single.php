<?php get_header(); ?>

<div class="row">
	<div class="eleven columns" role="main">

	<?php do_action('foundationPress_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<?php do_action('foundationPress_post_before_entry_content'); ?>
			<div class="entry-content">


				<main class="cd-main-content">

					<div class="main-wrapper">

						<div class="section-in white-back padding-top">

							<div class="row">
							
								<div class="small-12 large-8 columns">
									<div class="content-post">
<!--										<div id="owl-post" class="owl-carousel owl-theme">-->
											<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 500,500 ), false, '' );?>
											<img src="<?php echo $src[0]; ?>" alt="<?php the_title();?>">
<!--										</div>-->
										<div class="time-autor">DEC 13, 2014 <span>AUTOR: JOHN DOE</span></div>
										<h5><?php the_title(); ?></h5>
										<?php the_content(); ?>
									</div>
									<div class="large-12 columns">
										<?php do_action('foundationPress_page_before_comments'); ?>
										<?php comments_template(); ?>
										<?php do_action('foundationPress_page_after_comments'); ?>
									</div>
									<?php get_template_part('sidebar'); ?>
									
								</div>



							</div>

						</div>

<!--						<div class="section-in white-back padding-top-bottom">-->
<!--							<div class="container">-->
<!--								<div class="sixteen columns">-->
<!--									<nav role="navigation">-->
<!--										<ul class="cd-pagination animated-buttons custom-icons">-->
<!--											<li class="button-pag"><a href="#0"><i>PREV</i></a></li>-->
<!--											<li><a href="#0">1</a></li>-->
<!--											<li><a href="#0">2</a></li>-->
<!--											<li><a class="current" href="#0">3</a></li>-->
<!--											<li><a href="#0">4</a></li>-->
<!--											<li><span>...</span></li>-->
<!--											<li><a href="#0">20</a></li>-->
<!--											<li class="button-pag"><a href="#0"><i>NEXT</i></a></li>-->
<!--										</ul>-->
<!--									</nav>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->

						<div class="section-in white-back">
							<div class="container">
								<div class="sixteen columns remove-top remove-bottom">
									<div class="footer-line"></div>
								</div>
							</div>
						</div>
					</div>
				</main>
				
			</div>
			
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
<!--				<p>--><?php //the_tags(); ?><!--</p>-->
			</footer>
		
		</article>
	<?php endwhile;?>

	<?php do_action('foundationPress_after_content'); ?>

	</div>

</div>



		<?php get_footer(); ?>