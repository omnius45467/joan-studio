<?php get_header();?>
<div id="contenidos">

     <?php if (have_posts()) :?>
         <?php while (have_posts()) : the_post(); ?>

               <!-- Thumbnail & Title -->
              <div class="entry-header">
              <?php if(has_post_thumbnail()) :?>
                   <div id="post-imagen">
                        <?php the_post_thumbnail('full', array('class' => 'articulo-img-thumbnail')); ?>
                   </div>
                   <div class="post-title-image"> 
                        <h2 class="p-name"><?php the_title(); ?></h2>
                        <div class="post-edit">
                             <?php echo edit_post_link('<i class="fa fa-pencil-square-o"></i>' . __("Edit this", "blackcolors")); ?>
                        </div>
                   </div>
              <?php else: ?>
                   <div class="post-title">
                       <h2 class="p-name"><?php the_title(); ?></h2>
                        <div class="post-edit">
                        <?php echo edit_post_link('<i class="fa fa-pencil-square-o"></i>' . __("Edit this", "blackcolors")); ?>
                        </div>
                   </div>
              <?php endif; ?>
              </div>

              <?php wp_link_pages(); ?>

              <div class="entry-content e-content">
                   <?php the_content(); ?>
              </div>

          </article>

         <?php endwhile; ?>
     <?php endif; ?>
</div>

    
<?php get_footer(); ?>

