<?php
/**
 * Magelang functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magelang
 */

if ( ! defined( 'MAGELANG_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'MAGELANG_VERSION', '0.1.0' );
}

if ( ! defined( 'MAGELANG_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `magelang_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'MAGELANG_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary prose-headings:text-primary'
	);
}

if ( ! function_exists( 'magelang_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magelang_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Magelang, use a find and replace
		 * to change 'magelang' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'magelang', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'magelang' ),
				'menu-2' => __( 'Footer Menu', 'magelang' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 64,
				'width'       => 64,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add other theme support
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

	}
endif;
add_action( 'after_setup_theme', 'magelang_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magelang_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'magelang' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'magelang' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer Widget', 'magelang'),
			'id'            => 'footerwidget-1',
			'description'   => esc_html__('Add widgets here to appear in your footer.', 'magelang'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'magelang_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function magelang_scripts() {
	wp_enqueue_style( 'magelang-style', get_stylesheet_uri(), array(), MAGELANG_VERSION );
	wp_enqueue_script( 'magelang-script', get_template_directory_uri() . '/js/script.min.js', array(), MAGELANG_VERSION, true );
	wp_enqueue_script( 'magelang-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), MAGELANG_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magelang_scripts' );

/**
 * Enqueue the block editor script.
 */
function magelang_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_script(
			'magelang-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			MAGELANG_VERSION,
			true
		);
		wp_add_inline_script( 'magelang-editor', "tailwindTypographyClasses = '" . esc_attr( MAGELANG_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'magelang_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function magelang_tinymce_add_class( $settings ) {
	$settings['body_class'] = MAGELANG_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'magelang_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

// Include the custom Tailwind navigation walker
require_once get_template_directory() . '/inc/tailwind-nav-walker.php';

// Image caption
function magelang_img_caption_shortcode_filter($output, $attr, $content) {
    if (isset($attr['caption'])) {
        $output = '<figure class="wp-caption">';
        $output .= do_shortcode($content);
        $output .= '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>';
        $output .= '</figure>';
    }
    return $output;
}
add_filter('img_caption_shortcode', 'magelang_img_caption_shortcode_filter', 10, 3);


/**
 * Get posts from loop.
 *
 * @param int $amount
 * @param mixed $callback
 * @return void
 */
function magelang_posts_from_loop( $amount, $callback ) {
	global $wp_query;

	$count = 0;

	while ( ( $count < $amount ) && ( $wp_query->current_post + 1 < $wp_query->post_count ) ) {
		$wp_query->the_post();

		$callback();

		$count++;
	}
}




