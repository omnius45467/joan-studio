<?php
/*
Template Name: Contact
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


                <div class="main-wrapper" id="scroll-link">

                    <div class="section-in white-back shadow-sec">
                        <div class="contact-min-wrapper">
                            <div class="contact-min-wrap float-left">
                                <p><span>&#xf1d8;</span> Email:</p>
                                <a href="#"><span>office@metis.com</span></a>
                            </div>
                            <div class="contact-min-wrap float-left background-grey">
                                <p><span>&#xf095;</span> Phone:</p>
                                <a href="#"><span>0120 (381) 234-294</span></a>
                            </div>
                        </div>
                        <div class="contact-min-wrapper">
                            <div class="contact-min-wrap float-right google-wrapper">
                                <div id="cd-google-map">
                                    <div id="google-container"></div>
                                    <div id="cd-zoom-in"></div>
                                    <div id="cd-zoom-out"></div>
                                </div>

                                <div class="tooltip contact-tooltip tooltip-east">
                                    <span class="tooltip-item"></span>
                                    <span class="tooltip-content">Get in touch!</span>
                                </div>

                            </div>
                            <div class="contact-min-wrap float-right background-grey">
                                <p><span>&#xf041;</span> Address:</p>
                                <a href="#"><span>86-90 Milutina, BG 11000</span></a>
                            </div>
                        </div>
                    </div>

            </article>
        <?php endwhile; // End the loop ?>

    </div>
</div>

<?php get_footer(); ?>
