<?php
/**
 * Template part for displaying a message that posts cannot be found
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WP_Template
 */

?>

      <section class="section no-results not-found">

        <h1 class="headline"><?php esc_html_e( 'Nothing Found', 'template' ); ?></h1>

        <div class="page-content">
          <?php

          if ( is_home() && current_user_can( 'publish_posts' ) ) :

          printf( '<p>' . wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'template' ),
          array( 'a' => array( 'href' => array(), ), ) ) . '</p>', esc_url( admin_url( 'post-new.php' ) ) );

          elseif ( is_search() ) :

          ?>

          <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'template' ); ?></p>
          
          <?php else : ?>

          <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'template' ); ?></p>
          
          <?php endif; ?>
        </div><!-- .page-content -->
      </section><!-- .no-results -->
