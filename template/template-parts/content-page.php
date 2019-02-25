<?php
/**
 * Template part for displaying page content in page.php
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WP_Template
 */

?>

      <section id="post-<?php the_ID(); ?>" <?php post_class('section'); ?>>
        <?php 

        the_title( '<h1 class="entry-title">', '</h1>' ); 
        template_post_thumbnail();

        ?>

        <div class="entry-content">

        <?php

        the_content();

        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'template' ),
          'after'  => '</div>',
        ) );

        ?>

        </div>

        <?php if ( get_edit_post_link() ) :

        edit_post_link(
          sprintf( wp_kses( __( 'Edit <span class="screen-reader-text">%s</span>', 'template' ),
          array( 'span' => array( 'class' => array(), ), ) ),
          get_the_title() ), '<span class="edit-link">', '</span>'
        );

        endif;
        ?>
      </section><!-- #post-<?php the_ID(); ?> -->
