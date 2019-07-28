<?php
/**
 * Dockerpress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dockerpress
 */

if ( ! function_exists( 'dockerpress_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dockerpress_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'dockerpress', get_template_directory() . '/languages' );
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
    
		// This theme uses wp_nav_menu() in one location, add menu to Manage Location in WP admin > Apperance > Menus
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'dockerpress' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'dockerpress' ),
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
		add_theme_support( 'custom-background', apply_filters( 'dockerpress_custom_background_args', array(
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'dockerpress_setup' );

/**
 * Enqueue scripts and styles.
 */
function dockerpress_scripts() {
  // Enqueue the main Stylesheet.
	$buble = wp_get_theme();
	wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/css/style.f2ce87a487dee769c5fb.css', array(), $buble->get( 'Version' ), 'all' );
  
  // Deregister the jquery version bundled with WordPress.
  wp_deregister_script( 'jquery' );
  
	// Deregister the jquery-migrate version bundled with WordPress.
  // wp_deregister_script( 'jquery-migrate' );
  
	// Enqueue Buble scripts
	wp_enqueue_script( 'bundle-js', get_template_directory_uri() . '/assets/js/bundle.b692301009c67db6a55b.js', array(), $buble->get( 'Version' ), 'all' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dockerpress_scripts' );

/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'dockerpress_posted_on' ) ) :
	function dockerpress_posted_on() {
		$time_string = '<time class="entry__date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry__date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on: %s', 'post date', 'dockerpress' ),
			'<a class="archive__link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted__on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'dockerpress_posted_by' ) ) :
	function dockerpress_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'dockerpress' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

// Load mailhog config for local development with Docker
require_once get_template_directory() . '/mailhog.php';