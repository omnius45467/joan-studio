<?php
/*
Template Name: Full Width
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">

	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
				$type = 'art';
				$args = array(
					'post_type' => $type,
					'post_status' => 'publish',
					'orderby' => 'title',
					"title" => 'SERVICE TITLE',
					"text" => 'SERVICE DETAILS',
					"image" => 'SERVICE IMAGE',
					"url" => 'SERVICE BUTTON URL'

				);

				$my_query = null;
				$my_query = new WP_Query($args);
				if ($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post();
					?>
					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 500,500 ), false, '' );?>
					<div class="col-md-4">
						<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 service-text" style="background-image:url('<?php echo $src[0]; ?>');color:#333; margin-top:20px;">
							<h1 class="service-title" style="text-shadow:1px 1px 2px #333;"><span><?php the_title();?></span></h1>

							<?php the_content();?>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
</div>

<?php get_footer(); ?>
