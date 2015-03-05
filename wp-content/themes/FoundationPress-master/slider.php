
<section class="container" role="document">
    <section class="cd-section">
        <div class="cd-block">
            <div class="portfolio-top">

                <div id="owl-top" class="owl-carousel owl-theme">


                    <?php
                    $type = 'slider';
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
                        <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 500,500 ), false, '' );?>

                        <div class="item top-image-1" style="background-image:url('<?php echo $src[0]; ?>');">

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