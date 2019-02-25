<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Template
 */

?>

  <footer class="footer-section">
    <div class="site-container">
      <section class="footer">
        <h3 class="footer-branding">&copy; <? echo date('Y');?> <?php bloginfo( 'name' ); ?> - All Rights Reserved</h3>
        <p class="footer-info">Developed by <a href="https://jackryanoracoy.github.io">Jack Ryan Oracoy</a></p>
      </section>
    </div>
  </footer><!-- site_footer -->

<?php wp_footer(); ?>

<!-- No Script -->
<noscript>Please enable JavaScript and revisit (reload) this page.</noscript>
</body>
</html>
