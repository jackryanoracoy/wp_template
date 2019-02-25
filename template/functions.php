<?php
/**
 * WP_Template functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package WP_Template
 */

if ( ! function_exists( 'template_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function template_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP_Template, use a find and replace
		 * to change 'template' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'template', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-0' => esc_html__( 'Icons', 'template' ),
      'menu-1' => esc_html__( 'Primary', 'template' ),
      'menu-2' => esc_html__( 'Secondary', 'template' ),
      'menu-3' => esc_html__( 'Tertiary', 'template' ),
      'menu-4' => esc_html__( 'Others', 'template' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'template_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 80,
			'width'       => 80,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'template_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function template_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'template_content_width', 640 );
}
add_action( 'after_setup_theme', 'template_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function template_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'template' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'template' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'template_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function template_scripts() {
	wp_enqueue_style( 'template-style', get_stylesheet_uri() );
  wp_enqueue_style( 'template-font-awesome', get_template_directory_uri() . '/common/font-awesome/css/fontawesome-all.min.css',array(), true );
  wp_enqueue_script( 'template-jquery', get_template_directory_uri() . '/common/js/jquery-3.3.1.min.js', array(), true );
  wp_enqueue_script( 'template-object-fit', get_template_directory_uri() . '/common/js/object-fit.min.js', array(), '20190101', true );
  wp_enqueue_script( 'template-auto-complete', get_template_directory_uri() . '/common/js/auto-complete.min.js', array(), '20190101', true );
  wp_enqueue_script( 'template-custom', get_template_directory_uri() . '/common/js/custom.min.js', array(), '20190101', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'template_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add active class on Navigation
 */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){
			$classes[] = 'active ';
	}
	return $classes;
}

/**
 * Filter the except length to 20 words.
 */
function wp_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'wp_custom_excerpt_length', 999 );

/**
 * Filter the "read more" excerpt string link to the post.
 */
function wp_excerpt_more( $more ) {
	if ( ! is_single() ) {
		$more = sprintf( '...&nbsp;<a class="read-more" href="%1$s">%2$s</a>',
			get_permalink( get_the_ID() ),
			__( 'Read More', 'template' )
		);
	}

	return $more;
}
add_filter( 'excerpt_more', 'wp_excerpt_more' );

/**
 * Hook App Icons and Favicons
 */
add_action('wp_head', function() {
  echo '<meta name="msapplication-TileImage" content="' . get_template_directory_uri() . '/app-icon/ms-icon-144x144.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="57x57" href="' . get_template_directory_uri() . '/app-icon/apple-icon-57x57.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="60x60" href="' . get_template_directory_uri() . '/app-icon/apple-icon-60x60.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="72x72" href="' . get_template_directory_uri() . '/app-icon/apple-icon-72x72.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="76x76" href="' . get_template_directory_uri() . '/app-icon/apple-icon-76x76.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="114x114" href="' . get_template_directory_uri() . '/app-icon/apple-icon-114x114.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="120x120" href="' . get_template_directory_uri() . '/app-icon/apple-icon-120x120.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="144x144" href="' . get_template_directory_uri() . '/app-icon/apple-icon-144x144.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="152x152" href="' . get_template_directory_uri() . '/app-icon/apple-icon-152x152.png' . '">' . "\n";
  echo '<link rel="apple-touch-icon" sizes="180x180" href="' . get_template_directory_uri() . '/app-icon/apple-icon-180x180.png' . '">' . "\n";
  echo '<link rel="icon" type="image/png" sizes="192x192"  href="' . get_template_directory_uri() . '/app-icon/android-icon-192x192.png' . '">' . "\n";
  echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_template_directory_uri() . '/app-icon/favicon-32x32.png' . '">' . "\n";
  echo '<link rel="icon" type="image/png" sizes="96x96" href="' . get_template_directory_uri() . '/app-icon/favicon-96x96.png' . '">' . "\n";
  echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_template_directory_uri() . '/app-icon/favicon-16x16.png' . '">' . "\n";
  echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/app-icon/favicon.ico' . '">' . "\n\n";
});

/**
 * Loads an alternate stylesheet, rather than the default style.css required by WordPress
 * This does not replace the requirement of including a style.css in your theme
 */
add_filter( 'stylesheet_uri', 'wp_load_alternate_stylesheet', 10, 2 );
function wp_load_alternate_stylesheet( $stylesheet_uri, $stylesheet_dir_uri ) {
	return trailingslashit( $stylesheet_dir_uri ) . 'style.min.css';
}

/**
 * Minify/Compress HTML Output
 */
class HTML_Compression {
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;
	protected $html;

	public function __construct($html) { 
		if (!empty($html)) { $this->parseHTML($html); }
	}

	public function __toString() { return $this->html; }
	protected function bottomComment($raw, $compressed) {
		$raw = strlen($raw);
		$compressed = strlen($compressed);
		$savings = ($raw-$compressed) / $raw * 100;
		$savings = round($savings, 2);
		return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
	}

	protected function minifyHTML($html) {
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		$html = '';
		
		foreach ($matches as $token) {
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
			$content = $token[0];

			if (is_null($tag)) {
				if ( !empty($token['script']) ) {
					$strip = $this->compress_js;
				}

				else if ( !empty($token['style']) ) {
					$strip = $this->compress_css;
				}

				else if ($content == '<!--wp-html-compression no compression-->') {
					$overriding = !$overriding; 
					continue;
				}

				else if ($this->remove_comments) {
					if (!$overriding && $raw_tag != 'textarea') { $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content); }
				}
			}

			else {
				if ($tag == 'pre' || $tag == 'textarea') {
					$raw_tag = $tag;
				}

				else if ($tag == '/pre' || $tag == '/textarea') {
					$raw_tag = false;
				}

				else {
					if ($raw_tag || $overriding) {
						$strip = false;
					}
					
					else {
						$strip = true; 
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content); 
						$content = str_replace(' />', '/>', $content);
					}
				}
			} 

			if ($strip) {
				$content = $this->removeWhiteSpace($content);
			}

			$html .= $content;
		} 
		return $html;
	}

	public function parseHTML($html) {
		$this->html = $this->minifyHTML($html);
		if ($this->info_comment) {
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}

	protected function removeWhiteSpace($str) {
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);
		while (stristr($str, '  ')) {
			$str = str_replace('  ', ' ', $str);
		}   
		return $str;
	}
}

function wp_html_compression_finish($html) {
	return new HTML_Compression($html);
}

function wp_html_compression_start() {
	ob_start('wp_html_compression_finish');
}

add_action('get_header', 'wp_html_compression_start');
