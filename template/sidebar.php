<?php
/**
 * The sidebar containing the main widget area
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package WP_Template
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) { return; }
?>

  <aside id="aside" class="aside-section">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </aside><!-- aside-section -->
