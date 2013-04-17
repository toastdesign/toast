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
    add_image_size( 'aspect43', 770, 578, true );    // Standard Blog Image
    add_image_size( 'aspect43/2', 770, 289, true );    // Standard Blog Image
    add_image_size( 'aspect169', 770, 433, true );    // Standard Blog Image
  }

  // Add custom header support
  add_theme_support( 'custom-header', array(
    // Header image default
    'default-image'         => get_template_directory_uri() . '/images/headers/default.jpg',
    // Header text display default
    'header-text'           => false,
    // Header text color default
    'default-text-color'    => '000',
    // Header image width (in pixels)
    'width'                 => 1440,
    // Header image height (in pixels)
    'height'                => 450,
    // Header image random rotation default
    'random-default'        => false,
    // Template header style callback
    'wp-head-callback'      => $wphead_cb,
    // Admin header style callback
    'admin-head-callback'   => $adminhead_cb,
    // Admin preview style callback
    'admin-preview-callback'=> $adminpreview_cb
  ) );

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
