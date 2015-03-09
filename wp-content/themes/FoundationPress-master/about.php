<?php
/*
Template Name: About
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
                <section class="cd-section">
                    <div class="cd-block">
                        <div class="about-top">

                            <div class="tooltip tooltip-west">
                                <span class="tooltip-item"></span>
                                <span class="tooltip-content">Staying home for the weekend again? Seriously?</span>
                            </div>
                            <div class="tooltip tooltip-east">
                                <span class="tooltip-item"></span>
                                <span class="tooltip-content">Life is really short, you know? Get out there!</span>
                            </div>
                            <div class="tooltip tooltip-east">
                                <span class="tooltip-item"></span>
                                <span class="tooltip-content">Get some fresh air and ride a slick bike.</span>
                            </div>

                            <div class="hero-top">
                                <div class="container">
                                    <div class="sixteen columns">
                                        <div class="hero-text">
                                            <h2>About Us</h2>
                                            <div class="hero-subtext">We craft <span>beautiful</span> digital solutions.</div>
                                        </div>
                                    </div>
                                    <div class="sixteen columns">
                                        <a href="#scroll-link" class="scroll scroll-down"></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <div class="main-wrapper" id="scroll-link">

                    <div class="section-in padding-top-bottom white-back shadow-sec">
                        <div class="container">
                            <div class="nine columns">
                                <div class="section-big-header-text">
                                    <h3>Original ideas into digital work<span>.</span></h3>
                                    <div class="line-big-header"></div>
                                    <p>We believe in coming up with original ideas and turning them into digital work that is both innovative and measurable.</p>
                                </div>
                            </div>
                            <div class="seven columns">
                                <p class="text-bottom-margin">We carry a passion for performance marketing and have a knack for untangling even the toughest of knots.</p>
                                <p class="text-bottom-margin">We are relentless in moving boundaries and carry out this spirited attitude into digital solutions.</p>
                                <p>Taking on thought-provoking projects that challenge us creatively and make us go the extra mile is what we consider a way of life.</p>
                            </div>
                        </div>
                    </div>

                    <div class="section-in padding-bottom white-back">
                        <div class="container">
                            <div class="one-third column">
                                <div class="team-wrap">
                                    <div class="img-team-wrap">
                                        <div class="team-mask">
                                            <div class="quote">" Recognizing the need is the primary condition for design. "</div>
                                            <div class="social-team">
                                                <ul class="list-social-team">
                                                    <li class="icon-soc-team tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf099;</a>
                                                    </li>
                                                    <li class="icon-soc-team tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf09b;</a>
                                                    </li>
                                                    <li class="icon-soc-team tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf0d5;</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/team1.jpg" alt="">
                                    </div>
                                    <h6>Alex Andrews</h6>
                                    <div class="job-position">FOUNDER</div>
                                </div>
                            </div>
                            <div class="one-third column">
                                <div class="team-wrap">
                                    <div class="img-team-wrap">
                                        <div class="team-mask">
                                            <div class="quote">" Good design doesn't date. Bad design does. "</div>
                                            <div class="social-team">
                                                <ul class="list-social-team">
                                                    <li class="icon-soc-team tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf099;</a>
                                                    </li>
                                                    <li class="icon-soc-team tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf09b;</a>
                                                    </li>
                                                    <li class="icon-soc-team tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf0d5;</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/team2.jpg" alt="">
                                    </div>
                                    <h6>Kara Kulis</h6>
                                    <div class="job-position">ART DIRECTOR</div>
                                </div>
                            </div>
                            <div class="one-third column">
                                <div class="team-wrap">
                                    <div class="img-team-wrap">
                                        <div class="team-mask">
                                            <div class="quote">" It's important to do things with a kind of personality. "</div>
                                            <div class="social-team">
                                                <ul class="list-social-team">
                                                    <li class="icon-soc-team tipped" data-title="twitter"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf099;</a>
                                                    </li>
                                                    <li class="icon-soc-team tipped" data-title="github"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf09b;</a>
                                                    </li>
                                                    <li class="icon-soc-team tipped" data-title="google +"  data-tipper-options='{"direction":"top","follow":"true"}'>
                                                        <a href="#">&#xf0d5;</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/team3.jpg" alt="">
                                    </div>
                                    <h6>Frank Furius</h6>
                                    <div class="job-position">DEVELOPMENT</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-in padding-top-bottom">

                        <div class="parallax-about"></div>

                        <div class="container">
                            <div class="sixteen columns">
                                <div id="owl-quotes" class="owl-carousel owl-theme">

                                    <div class="item">
                                        <div class="quote-about">
                                            <div class="quote-text"><span>"</span> It is only after years of preparation that the young artist should touch color - not color used descriptively, that is, but as a means of personal expression. <span>"</span></div>
                                            <h6>Henri Matisse</h6>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="quote-about">
                                            <div class="quote-text"><span>"</span> Design is a funny word. Some people think design means how it looks. But of course, if you dig deeper, it's really how it works. <span>"</span></div>
                                            <h6>Steve Jobs</h6>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="quote-about">
                                            <div class="quote-text"><span>"</span> What is design? It's where you stand with a foot in two worlds - the world of technology and the world of people and human purposes - and you try to bring the two together. <span>"</span></div>
                                            <h6>Mitchell Kapor</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-in padding-top-bottom white-back">
                        <div class="container">
                            <div class="sixteen columns">
                                <div class="section-header-text">
                                    <h5>Born into creativity<span>.</span></h5>
                                    <p>Our Passion For Perfection.</p>
                                    <div class="line-header"></div>
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="services-list">
                                    <div class="icons">&#xe030;</div>
                                    <h6>BRANDING</h6>
                                    <p>Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor. Praesent sed nisi eleifend.</p>
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="services-list">
                                    <div class="icons">&#xe00c;</div>
                                    <h6>WEB DESIGN</h6>
                                    <p>Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor. Praesent sed nisi eleifend.</p>
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="services-list">
                                    <div class="icons">&#xe02b;</div>
                                    <h6>DEVELOPMENT</h6>
                                    <p>Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor. Praesent sed nisi eleifend.</p>
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="services-list">
                                    <div class="icons">&#xe026;</div>
                                    <h6>SUPPORT</h6>
                                    <p>Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor. Praesent sed nisi eleifend.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-in padding-bottom white-back">
                        <div class="container">
                            <div class="four columns">
                                <div class="logos">
                                    <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/logos/1.png" alt="">
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="logos">
                                    <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/logos/2.png" alt="">
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="logos">
                                    <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/logos/3.png" alt="">
                                </div>
                            </div>
                            <div class="four columns">
                                <div class="logos">
                                    <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/logos/4.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="sixteen columns remove-top remove-bottom">
                            <div class="footer-line"></div>
                        </div>
                    </div>
                    <div id="projects-grid">


                    <?php
                    $type = 'art';
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
                        <div class="portfolio-box-1 branding">
                            <div class="mask-1"></div>
                            <img src="<?php echo $src[0]; ?>" alt="<?php the_title();?>">
                            <h6><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h6>
                            <p><?php the_content();?></p>

                        </div>
                        <?php $count++; endwhile; endif; wp_reset_postdata(); ?>
                </div>
                <footer>
                    <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
                    <p><?php the_tags(); ?></p>
                </footer>

            </article>
        <?php endwhile; // End the loop ?>


    </div>
</div>

<?php get_footer(); ?>
