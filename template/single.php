<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package WP_Template
 */

get_header();
?>

  <main id="main" class="main-section">

    <div class="site-container">
      <?php

      while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', get_post_type() );

      the_post_navigation();

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) : comments_template();
      
      endif;

      endwhile;
      ?>
    </div><!-- site-container -->

  </main><!-- main-section -->

<?php
get_sidebar();
get_footer();
