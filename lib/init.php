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
    add_image_size( 'aspect43half', 770, 289, true );  // Standard Blog Image
    add_image_size( 'aspect43small', 370, 278, true );  // Standard Blog Image
    add_image_size( 'aspect169', 770, 433, true );   // Standard Blog Image
  }

  // Add custom header support
  add_theme_support( 'custom-header', array(
    'default-image'         => get_template_directory_uri() . '/images/headers/default.jpg',
    'header-text'           => false,
    'default-text-color'    => '000',
    'width'                 => 1440,
    'height'                => 450,
    'random-default'        => false,
    'wp-head-callback'      => $wphead_cb,
    'admin-head-callback'   => $adminhead_cb,
    'admin-preview-callback'=> $adminpreview_cb
  ));

  // add custom background support 
  add_theme_support( 'custom-background', array(
    'default-color'          => '',
    'default-image'          => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
  ));

  // Add post formats (http://codex.wordpress.org/Post_Formats)
  add_theme_support('post-formats', array('quote','video','gallery'));

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
