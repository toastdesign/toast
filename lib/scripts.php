<?php

function toast_scripts() {
  /* ------------------------------------------------------------------------ */
  /* Register Scripts */
  /* ------------------------------------------------------------------------ */
  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, false);
  wp_register_script('roots_plugins', get_template_directory_uri() . '/assets/js/plugins.js', false, null, true);
  wp_register_script('roots_main', get_template_directory_uri() . '/assets/js/main.js', false, null, true);
  wp_register_script('flexslider', get_template_directory_uri() . '/assets/js/flexslider.js', 'jquery', '2.0', true);
  
  /* ------------------------------------------------------------------------ */
  /* Enqueue Scripts */
  /* ------------------------------------------------------------------------ */
  wp_enqueue_script('jquery');
  wp_enqueue_script('modernizr');
  wp_enqueue_script('roots_plugins');
  wp_enqueue_script('roots_main');
  wp_enqueue_script('flexslider');

  /* ------------------------------------------------------------------------ */
  /* jQuery via de HTML5 Boilerplate methode. Deze blijt in de header ivm conflicten met plugins */
  /* ------------------------------------------------------------------------ */
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }
}
add_action('wp_enqueue_scripts', 'toast_scripts', 100);


function roots_jquery_local_fallback($src, $handle) {
  /* ------------------------------------------------------------------------ */
  /* http://wordpress.stackexchange.com/a/12450 */
  /* ------------------------------------------------------------------------ */
  static $add_jquery_fallback = false;
  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.9.1.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }
  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }
  return $src;
}

function toast_styles() {
  /* ------------------------------------------------------------------------ */
  /* Register Stylesheets */
  /* ------------------------------------------------------------------------ */
  wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '1', 'all' );
  wp_register_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1', 'all' );
  wp_register_style('app', get_template_directory_uri() . '/assets/css/app.css', array(), '1', 'all' );

  /* ------------------------------------------------------------------------ */
  /* Enqueue Stylesheets */
  /* ------------------------------------------------------------------------ */
  wp_enqueue_style( 'bootstrap' );
  wp_enqueue_style( 'responsive' ); 
  wp_enqueue_style( 'app' ); 
}
add_action( 'wp_enqueue_scripts', 'toast_styles', 1 ); 
