<?php
/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package WP_Template
 */

get_header();
?>

  <main id="main" class="main-section">

    <div class="site-container">

      <section class="section error-404 not-found">
        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'template' ); ?></h1>
        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'template' ); ?></p>
      </section>

    </div><!-- site-container -->

  </main><!-- main-section -->

<?php
get_sidebar();
get_footer();
