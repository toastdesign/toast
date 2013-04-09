<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
  ));

  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
  
  if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'standard', 700, 300, true );             // Standard Blog Image
    add_image_size( 'blog-medium', 320, 210, true );          // Medium Blog Image
    add_image_size( 'twelve-columns', 1170, 550, true );      // Full width no sidebar
    add_image_size( 'nine-columns', 870, 475, true );         // Full width and sidebar
    add_image_size( 'six-columns', 570, 300, true );          // Six columns of full width
    add_image_size( 'three-columns', 270, 200, true );        // One fourth of full width
    add_image_size( 'two-columns', 170, 125, true );          // One sixt of full width
    add_image_size( 'mini', 60, 60, true );                   // used for widget thumbnail
  }

  // Add post formats (http://codex.wordpress.org/Post_Formats)
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

// Backwards compatibility for older than PHP 5.3.0
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

// Define helper constants
$get_theme_name = explode('/themes/', get_template_directory());

define('WP_BASE',                   wp_base_dir());
define('THEME_NAME',                next($get_theme_name));
define('RELATIVE_PLUGIN_PATH',      str_replace(site_url() . '/', '', plugins_url()));
define('FULL_RELATIVE_PLUGIN_PATH', WP_BASE . '/' . RELATIVE_PLUGIN_PATH);
define('RELATIVE_CONTENT_PATH',     str_replace(site_url() . '/', '', content_url()));
define('THEME_PATH',                RELATIVE_CONTENT_PATH . '/themes/' . THEME_NAME);
