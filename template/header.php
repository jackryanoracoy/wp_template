<?php
/**
 * The header
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package WP_Template
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="format-detection" content="telephone=no">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">

<meta name="mobile-web-app-capable" content="yes">
<meta name="theme-color" content="#009688">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<meta name="msapplication-TileColor" content="#009688">

<link rel="manifest" href="<?php echo get_parent_theme_file_uri( 'manifest.json' )?>">

<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class('background-grey-200'); ?>>

  <section class="header-section">

    <header class="site-header">
      <a class="menu-btn" href="javascript:void(0)">
        <span class="menu-box"><span class="menu-inner"></span></span>
      </a> <!-- menu-btn -->
      
      <a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <?php 
        
        the_custom_logo(); 
        if ( is_front_page() && is_home() ) : 

        ?>

        <h1 class="brand-name"><?php bloginfo( 'name' ); ?></h1>

        <?php else : ?>

        <p class="brand-name"><?php bloginfo( 'name' ); ?></p>
        
        <?php endif;

        $template_description = get_bloginfo( 'description', 'display' );
        
        if ( $template_description || is_customize_preview() ) :

        ?>

        <p class="brand-description"><?php echo $template_description; ?></p>
        
        <?php endif; ?>

      </a><!-- site-branding -->
    </header><!-- site-header -->

    <div class="site-search desktop">
      <?php get_search_form() ?>
    </div><!-- site-search -->

    <nav class="site-social desktop" role="navigation">
      <?php

			wp_nav_menu( array(
        'theme_location' => 'menu-0',
        'menu_class'     => 'social-nav',
      ) );

      ?>
    </nav><!-- site-navigation -->
  </section><!-- header-section -->

  <nav class="nav-section" role="navigation">
    <?php

    wp_nav_menu( array(
      'theme_location' => 'menu-1',
      'menu_class'     => 'main-nav',
    ) );
    
    wp_nav_menu( array(
      'theme_location' => 'menu-2',
      'menu_class'     => 'main-nav mobile',
    ) );

    wp_nav_menu( array(
      'theme_location' => 'menu-3',
      'menu_class'     => 'main-nav',
    ) );
    
    ?>
  </nav><!-- site-navigation -->
