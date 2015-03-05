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
			<div id="projects-grid">
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
				$count = 1;
				$my_query = null;
				$my_query = new WP_Query($args);
				if ($my_query->have_posts()): while($my_query->have_posts()): $my_query->the_post();
					?>
					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 500,500 ), false, '' );?>
					<div class="portfolio-box-1 branding">
						<div class="mask-1"></div>
						<img src="<?php echo $src[0]; ?>" alt="<?php the_title();?>">
						<h6><?php the_title();?></h6>
						<p><?php the_content();?></p>
					</div>
				<?php $count++; endwhile; endif; wp_reset_postdata(); ?>
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
