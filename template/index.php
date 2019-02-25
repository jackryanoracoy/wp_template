<?php
/**
 * The main template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WP_Template
 */

get_header();
?>

  <main id="main" class="main-section">

    <div class="site-container">
      <?php if ( have_posts() ) : if ( is_home() && ! is_front_page() ) : ?>

      <section class="headline-section">
        <h1 class="headline-title"><?php single_post_title(); ?></h1>
      </section><!-- headline-section -->

      <?php

      endif;

      while ( have_posts() ) : the_post(); 

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
