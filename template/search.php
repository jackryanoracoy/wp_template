<?php
/**
 * The template for displaying search results pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package WP_Template
 */

get_header();
?>

  <main id="main" class="main-section">

    <div class="site-container">
      <?php if ( have_posts() ) : ?>

      <section class="headline-section">
        <h1 class="headline-title"><?php printf( esc_html__( 'Search Results for: %s', 'template' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
      </section>

      <?php
      while ( have_posts() ) :
      the_post();
      get_template_part( 'template-parts/content', 'search' );

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
