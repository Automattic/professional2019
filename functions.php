<?php
/**
 * Professional (Twenty Nineteen) functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Professional_2019
 */

if ( ! function_exists( 'professional2019_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function professional2019_setup() {
	/*
	 * Probably not necessary
	 */
}
endif; // professional2019_setup
add_action( 'after_setup_theme', 'professional2019_setup' );

function professional2019_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Open Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$crimson_text = esc_html_x( 'on', 'Crimson Text font: on or off', 'professional2019' );

	if ( 'off' !== $crimson_text ) {
		$font_families = array();

		if ( 'off' !== $crimson_text ) {
			$font_families[] = 'Crimson Text:400,600,700,400italic,600italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function professional2019_scripts() {

	/**
	 * Styles
	 */
	wp_enqueue_style( 'professional2019-fonts', professional2019_fonts_url(), array(), null );

}
add_action( 'wp_enqueue_scripts', 'professional2019_scripts' );

/**
 * Enqueue supplemental block editor scripts.
 */
function professional2019_block_editor_scripts() {

	/**
	 * Block Editor Scripts
	 */
	wp_enqueue_script( 'professional2019-block-editor-filters', get_theme_file_uri( '/js/block-editor-filters.js' ), array(), '1.0', true );
}
add_action( 'enqueue_block_editor_assets', 'professional2019_block_editor_scripts' );

/**
 * Load Jetpack compatibility file.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';

