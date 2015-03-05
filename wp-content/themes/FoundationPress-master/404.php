<?php get_header(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<main class="cd-main-content">

				<div class="main-wrapper">

					<div class="section-in white-back padding-top-bottom">

						<div class="container">
							<div class="sixteen columns">
								<div class="error-page">
									<h2>404</h2>
									<p>The page you are looking for could not be found!</p>
								</div>
							</div>
						</div>

					</div>

					<div class="section-in white-back">
						<div class="container">
							<div class="sixteen columns remove-top remove-bottom">
								<div class="footer-line"></div>
							</div>
						</div>
					</div>

				</div>

			</main>

		</article>

<?php get_footer(); ?>
