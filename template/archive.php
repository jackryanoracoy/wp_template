<?php
/**
 * The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WP_Template
 */

get_header();
?>

  <main id="main" class="main-section">

    <div class="site-container">
      <?php if ( have_posts() ) : ?>
      
      <section class="headline-section">
        <?php
        the_archive_title( '<h1 class="headline-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
      </section><!-- headline-section -->

      <?php

      while ( have_posts() ) :
      the_post();
      get_template_part( 'template-parts/content', get_post_type() );

      endwhile;

      the_posts_navigation();

      else :

      get_template_part( 'template-parts/content', 'none' );

      endif;
      ?>
    </div><!-- site-container -->

  </main><!-- main-section -->

<?php
get_sidebar();
get_footer();
