<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

function remove_parent_functions() {
    remove_action( 'understrap_site_info', 'understrap_add_site_info' );
    add_action( 'understrap_site_info', 'understrap_add_site_child_info' );
}
add_action( 'init', 'remove_parent_functions', 15 );

function understrap_add_site_child_info() {
    $the_theme = wp_get_theme();

    $site_info = sprintf(
        '<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s %4$s',
        esc_url( __( 'https://wordpress.org/', 'magelang' ) ),
        sprintf(
            /* translators: WordPress */
            esc_html__( 'Proudly powered by %s', 'magelang' ),
            'WordPress'
        ),
        sprintf( // WPCS: XSS ok.
            /* translators: 1: Theme name, 2: Theme author */
            esc_html__( 'Theme: %1$s by %2$s.', 'magelang' ),
            $the_theme->get( 'Name' ),
            '<a href="' . esc_url( __( 'https://arifsetiawan.com', 'understrap' ) ) . '">ariffsetiawan</a>'
        ),
        sprintf( // WPCS: XSS ok.
            /* translators: Theme version */
            esc_html__( 'v%1$s', 'magelang' ),
            $the_theme->get( 'Version' )
        )
    );

    echo apply_filters( 'understrap_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
