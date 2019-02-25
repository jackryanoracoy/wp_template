<?php
/**
 * Template part for displaying results in search pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package WP_Template
 */

?>

      <section id="post-<?php the_ID(); ?>" <?php post_class('section'); ?>>
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>

        <div class="entry-meta">
        <?php template_posted_on(); template_posted_by(); ?>
        </div>

        <?php endif; ?>

        <?php template_post_thumbnail(); ?>

        <div class="entry-summary">
        <?php the_excerpt(); ?>
        </div>

        <div class="entry-footer">
        <?php template_entry_footer(); ?>
        </div>
      </section><!-- #post-<?php the_ID(); ?> -->
