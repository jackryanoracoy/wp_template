<?php
/**
 * The template for displaying comments
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WP_Template
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) { return; }
?>

      <section class="section">
        <?php if ( have_comments() ) : ?>

        <h2 class="comments-title">

        <?php

        $template_comment_count = get_comments_number();

        if ( '1' === $template_comment_count ) {
          printf(
          esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'template' ),
          '<span>' . get_the_title() . '</span>'
          );
        } else {
          printf( esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $template_comment_count, 'comments title', 'template' ) ),
          number_format_i18n( $template_comment_count ),
          '<span>' . get_the_title() . '</span>'
          );
        }

        ?>
        
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">

        <?php wp_list_comments( array(
          'style'      => 'ol',
          'short_ping' => true,
        ) );

        ?>

        </ol>

        <?php

        the_comments_navigation();

        if ( ! comments_open() ) :

        ?>

        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'template' ); ?></p>
        
        <?php
        
        endif;

        endif;

        comment_form();
        ?>
      </section>
