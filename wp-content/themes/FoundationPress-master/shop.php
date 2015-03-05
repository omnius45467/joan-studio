<?php
/*
Template Name: Shop
*/
get_header(); ?>

<div class="row">
    <div  role="main">

        <?php /* Start loop */ ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                <header>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <footer>
                    <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
                    <p><?php the_tags(); ?></p>
                </footer>

            </article>
        <?php endwhile; // End the loop ?>


        <main class="sixteen columns cd-main-content">

            <section class="cd-section">
                <div class="cd-block">
                    <div class="shop-top background-shop">

                        <div class="hero-top">
                            <div class="container">
                                <div class="sixteen columns">
                                    <div class="hero-text shop-white-text">
                                        <h5>brand new collection</h5>
                                        <div class="hero-subtext-2">warm winter sweater.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#scroll-link" class="scroll scroll-down-arrow-shop"></a>

                    </div>
                </div>
            </section>

            <div class="main-wrapper" id="scroll-link">

                <div class="section-in padding-top white-back shadow-sec">
                    <div class="container">
                        <div class="eight columns">
                            <a href="product.html">
                                <div class="shop-item-top">
                                    <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/2.jpg" alt="Preview image">
                                    <h4>-20% discount</h4>
                                    <p>Nam pulvinar vitae neque fringilla augue at<br>maximus vestibulum et porttitor.</p>
                                </div>
                            </a>
                        </div>
                        <div class="eight columns">
                            <a href="product.html">
                                <div class="shop-item-top">
                                    <img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/3.jpg" alt="Preview image">
                                    <h4>winter shoes</h4>
                                    <p>Nam pulvinar vitae neque fringilla augue at<br>maximus vestibulum et porttitor.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="section-in padding-bottom white-back">

                    <ul id="cd-gallery-items" class="cd-container-shop">
                        <li>
                            <ul class="cd-item-wrapper">
                                <li class="cd-item-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod1-1.jpg" alt="Preview image"></li>
                                <li class="cd-item-middle"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod1-2.jpg" alt="Preview image"></li>
                                <li class="cd-item-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod1-3.jpg" alt="Preview image"></li>
                                <li class="cd-item-out"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod1-4.jpg" alt="Preview image"></li>
                                <!-- <li class="cd-item-out">...</li> -->
                            </ul> <!-- cd-item-wrapper -->

                            <div class="cd-item-info">
                                <b><a href="product.html">Product Name</a></b>
                                <em>$9.99</em>
                            </div> <!-- cd-item-info -->

                            <nav>
                                <ul class="cd-item-navigation">
                                    <li><a class="cd-img-replace" href="#0">Prev</a></li>
                                    <li><a class="cd-img-replace" href="#0">Next</a></li>
                                </ul>
                            </nav>

                            <a class="cd-3d-trigger cd-img-replace" href="#0">Open</a>
                        </li>

                        <li>
                            <ul class="cd-item-wrapper">
                                <li class="cd-item-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod2-1.jpg" alt="Preview image"></li>
                                <li class="cd-item-middle"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod2-2.jpg" alt="Preview image"></li>
                                <li class="cd-item-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod2-3.jpg" alt="Preview image"></li>
                            </ul> <!-- cd-item-wrapper -->

                            <div class="cd-item-info">
                                <b><a href="product.html">Product Name</a></b>
                                <em> $9.99</em>
                            </div> <!-- cd-item-info -->

                            <nav>
                                <ul class="cd-item-navigation">
                                    <li><a class="cd-img-replace" href="#0">Prev</a></li>
                                    <li><a class="cd-img-replace" href="#0">Next</a></li>
                                </ul>
                            </nav>

                            <a class="cd-3d-trigger cd-img-replace" href="#0">Open</a>
                        </li>

                        <li>
                            <ul class="cd-item-wrapper">
                                <li class="cd-item-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod3-1.jpg" alt="Preview image"></li>
                                <li class="cd-item-middle"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod3-2.jpg" alt="Preview image"></li>
                                <li class="cd-item-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod3-3.jpg" alt="Preview image"></li>
                            </ul> <!-- cd-item-wrapper -->

                            <div class="cd-item-info">
                                <b><a href="product.html">Product Name</a></b>
                                <em>$9.99</em>
                            </div> <!-- cd-item-info -->

                            <nav>
                                <ul class="cd-item-navigation">
                                    <li><a class="cd-img-replace" href="#0">Prev</a></li>
                                    <li><a class="cd-img-replace" href="#0">Next</a></li>
                                </ul>
                            </nav>

                            <a class="cd-3d-trigger cd-img-replace" href="#0">Open</a>
                        </li>

                        <li>
                            <ul class="cd-item-wrapper">
                                <li class="cd-item-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod4-1.jpg" alt="Preview image"></li>
                                <li class="cd-item-middle"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod4-2.jpg" alt="Preview image"></li>
                                <li class="cd-item-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod4-3.jpg" alt="Preview image"></li>
                            </ul> <!-- cd-item-wrapper -->

                            <div class="cd-item-info">
                                <b><a href="product.html">Product Name</a></b>
                                <em>$9.99</em>
                            </div> <!-- cd-item-info -->

                            <nav>
                                <ul class="cd-item-navigation">
                                    <li><a class="cd-img-replace" href="#0">Prev</a></li>
                                    <li><a class="cd-img-replace" href="#0">Next</a></li>
                                </ul>
                            </nav>

                            <a class="cd-3d-trigger cd-img-replace" href="#0">Open</a>
                        </li>

                        <li>
                            <ul class="cd-item-wrapper">
                                <li class="cd-item-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod5-1.jpg" alt="Preview image"></li>
                                <li class="cd-item-middle"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod5-2.jpg" alt="Preview image"></li>
                                <li class="cd-item-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod5-3.jpg" alt="Preview image"></li>
                            </ul> <!-- cd-item-wrapper -->

                            <div class="cd-item-info">
                                <b><a href="product.html">Product Name</a></b>
                                <em>$9.99</em>
                            </div> <!-- cd-item-info -->

                            <nav>
                                <ul class="cd-item-navigation">
                                    <li><a class="cd-img-replace" href="#0">Prev</a></li>
                                    <li><a class="cd-img-replace" href="#0">Next</a></li>
                                </ul>
                            </nav>

                            <a class="cd-3d-trigger cd-img-replace" href="#0">Open</a>
                        </li>

                        <li>
                            <ul class="cd-item-wrapper">
                                <li class="cd-item-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod6-1.jpg" alt="Preview image"></li>
                                <li class="cd-item-middle"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod6-2.jpg" alt="Preview image"></li>
                                <li class="cd-item-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod6-3.jpg" alt="Preview image"></li>
                            </ul> <!-- cd-item-wrapper -->

                            <div class="cd-item-info">
                                <b><a href="product.html">Product Name</a></b>
                                <em>$9.99</em>
                            </div> <!-- cd-item-info -->

                            <nav>
                                <ul class="cd-item-navigation">
                                    <li><a class="cd-img-replace" href="#0">Prev</a></li>
                                    <li><a class="cd-img-replace" href="#0">Next</a></li>
                                </ul>
                            </nav>

                            <a class="cd-3d-trigger cd-img-replace" href="#0">Open</a>
                        </li>

                        <li>
                            <ul class="cd-item-wrapper">
                                <li class="cd-item-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod7-1.jpg" alt="Preview image"></li>
                                <li class="cd-item-middle"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod7-2.jpg" alt="Preview image"></li>
                                <li class="cd-item-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod7-3.jpg" alt="Preview image"></li>
                            </ul> <!-- cd-item-wrapper -->

                            <div class="cd-item-info">
                                <b><a href="product.html">Product Name</a></b>
                                <em>$9.99</em>
                            </div> <!-- cd-item-info -->

                            <nav>
                                <ul class="cd-item-navigation">
                                    <li><a class="cd-img-replace" href="#0">Prev</a></li>
                                    <li><a class="cd-img-replace" href="#0">Next</a></li>
                                </ul>
                            </nav>

                            <a class="cd-3d-trigger cd-img-replace" href="#0">Open</a>
                        </li>

                        <li>
                            <ul class="cd-item-wrapper">
                                <li class="cd-item-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod8-1.jpg" alt="Preview image"></li>
                                <li class="cd-item-middle"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod8-2.jpg" alt="Preview image"></li>
                                <li class="cd-item-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/shop/prod8-3.jpg" alt="Preview image"></li>
                            </ul> <!-- cd-item-wrapper -->

                            <div class="cd-item-info">
                                <b><a href="product.html">Product Name</a></b>
                                <em>$9.99</em>
                            </div> <!-- cd-item-info -->

                            <nav>
                                <ul class="cd-item-navigation">
                                    <li><a class="cd-img-replace" href="#0">Prev</a></li>
                                    <li><a class="cd-img-replace" href="#0">Next</a></li>
                                </ul>
                            </nav>

                            <a class="cd-3d-trigger cd-img-replace" href="#0">Open</a>
                        </li>
                    </ul>

                </div>

                <div class="section-in white-back">
                    <div class="container">
                        <div class="sixteen columns remove-top remove-bottom">
                            <div class="footer-line"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="dummy-fixed">
                <svg class="checkout__icon" width="30px" height="30px" viewBox="0 0 35 35">
                    <path d="M33.623,8.004c-0.185-0.268-0.486-0.434-0.812-0.447L12.573,6.685c-0.581-0.025-1.066,0.423-1.091,1.001 c-0.025,0.578,0.423,1.065,1.001,1.091L31.35,9.589l-3.709,11.575H11.131L8.149,4.924c-0.065-0.355-0.31-0.652-0.646-0.785 L2.618,2.22C2.079,2.01,1.472,2.274,1.26,2.812s0.053,1.146 0.591,1.357l4.343,1.706L9.23,22.4c0.092,0.497,0.524,0.857,1.03,0.857 h0.504l-1.15,3.193c-0.096,0.268-0.057,0.565,0.108,0.798c0.163,0.232,0.429,0.37,0.713,0.37h0.807 c-0.5,0.556-0.807,1.288-0.807,2.093c0,1.732,1.409,3.141,3.14,3.141c1.732,0,3.141-1.408,3.141-3.141c0-0.805-0.307-1.537-0.807-2.093h6.847c-0.5,0.556-0.806,1.288-0.806,2.093c0,1.732,1.407,3.141,3.14,3.141 c1.731,0,3.14-1.408,3.14-3.141c0-0.805-0.307-1.537-0.806-2.093h0.98c0.482,0,0.872-0.391,0.872-0.872s-0.39-0.873-0.872-0.873 H11.675l0.942-2.617h15.786c0.455,0,0.857-0.294,0.996-0.727l4.362-13.608C33.862,8.612,33.811,8.272,33.623,8.004z M13.574,31.108c-0.769,0-1.395-0.626-1.395-1.396s0.626-1.396,1.395-1.396c0.77,0,1.396,0.626,1.396,1.396S14.344,31.108,13.574,31.108z M25.089,31.108c-0.771,0-1.396 0.626-1.396-1.396s0.626-1.396,1.396-1.396c0.77,0,1.396,0.626,1.396,1.396 S25.858,31.108,25.089,31.108z"/>
                </svg>
                <div class="checkout">
                    <a class="checkout__button" href="#"><!-- Fallback location -->
							<span class="checkout__text">
								<span class="checkout__text-inner checkout__initial-text">checkout</span>
								<span class="checkout__text-inner checkout__final-text">$40.70 <i class="fa fa-fw fa-shopping-cart">&#xf07a;</i></span>
							</span>
                    </a>
                    <div class="checkout__order">
                        <div class="checkout__order-inner">
                            <table class="checkout__summary">
                                <thead>
                                <tr><th>Item</th><th>QTY</th><th>Price</th><th>&nbsp;</th></tr>
                                </thead>
                                <tbody>
                                <tr><td>Imitations <span>Mark Lanegan</span></td><td>1</td><td>$12.90</td><td><button class="checkout__action"><i class="icon fa fa-trash">&#xf014;</i></button></td></tr>
                                <tr><td>Out Of Exile <span>Audioslave</span></td><td>1</td><td>$15.90</td><td><button class="checkout__action"><i class="icon fa fa-trash">&#xf014;</i></button></td></tr>
                                <tr><td>Cure For Pain <span>Morphine</span></td><td>1</td><td>$11.90</td><td><button class="checkout__action"><i class="icon fa fa-trash">&#xf014;</i></button></td></tr>
                                </tbody>
                            </table><!-- /checkout__summary -->
                            <button class="checkout__close checkout__cancel"><i class="icon">&#xf00d;</i></button>
                        </div><!-- /checkout__order-inner -->
                    </div><!-- /checkout__order -->
                </div><!-- /checkout -->
                <div class="checkout__count">3</div>
            </div>

        </main>
        

    </div>
</div>


<?php get_footer(); ?>
