<?php

/*-----------------------------------------------------------------------------------*/
/*  Alert
/*-----------------------------------------------------------------------------------*/
function toast_alert( $atts, $content = null) {

extract( shortcode_atts( array(
      'type'  => 'warning',
      'close' => 'true'
      ), $atts ) );
      
      if($close == 'false') {
      $var1 = '';
    }
    else{
      $var1 = '<span class="close" href="#">x</span>';
    }
      
      return '<div class="alert-message ' . $type . '">' . do_shortcode($content) . '' . $var1 . '</div>';
}

/*-----------------------------------------------------------------------------------*/
/* Media */
/*-----------------------------------------------------------------------------------*/

function toast_video($atts) {
  extract(shortcode_atts(array(
    'type'  => '',
    'id'  => '',
    'width'   => false,
    'height'  => false,
    'autoplay'  => ''
  ), $atts));
  
  if ($height && !$width) $width = intval($height * 16 / 9);
  if (!$height && $width) $height = intval($width * 9 / 16);
  if (!$height && !$width){
    $height = 315;
    $width = 560;
  }
  
  $autoplay = ($autoplay == 'yes' ? '1' : false);
    
  if($type == "vimeo") $return = "<div class='video-embed'><iframe src='http://player.vimeo.com/video/$id?autoplay=$autoplay&amp;title=0&amp;byline=0&amp;portrait=0' width='$width' height='$height' class='iframe'></iframe></div>";
  
  else if($type == "youtube") $return = "<div class='video-embed'><iframe src='http://www.youtube.com/embed/$id?HD=1;rel=0;showinfo=0' width='$width' height='$height' class='iframe'></iframe></div>";
  
  else if($type == "dailymotion") $return ="<div class='video-embed'><iframe src='http://www.dailymotion.com/embed/video/$id?width=$width&amp;autoPlay={$autoplay}&foreground=%23FFFFFF&highlight=%23CCCCCC&background=%23000000&logo=0&hideInfos=1' width='$width' height='$height' class='iframe'></iframe></div>";
    
  if (!empty($id)){
    return $return;
  }
}

/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

function toast_separator( $atts, $content = null){
  extract(shortcode_atts(array(
        'headline'      => 'h3',
        'title' => 'Title'
    ), $atts));
   
  return '<'.$headline.' class="sep_title"><span>'.$title.'</span></'.$headline.'>';
}

/*-----------------------------------------------------------------------------------*/
/* Toggle */
/*-----------------------------------------------------------------------------------*/

function toast_toggle( $atts, $content = null){
  extract(shortcode_atts(array(
        'title' => '',
        'icon' => '',
        'open' => "false"
    ), $atts));

  if($icon == '') {
      $return = "";
    }
    else{
      $return = "<i class='icon-".$icon."'></i>";
    }
    
    if($open == "true") {
      $return2 = "active";
    }
    else{
      $return2 = '';
    }
   
   return '<div class="toggle"><div class="toggle-title '.$return2.'">'.$return.''.$title.'<span></span></div><div class="toggle-inner"><p>'. do_shortcode($content) . '</p></div></div>';
}

/*-----------------------------------------------------------------------------------*/
/* Responsive Visibility 
/*-----------------------------------------------------------------------------------*/

function toast_responsivevisibility( $atts, $content = null) {

extract( shortcode_atts( array(
      'show' => 'desktop'
      ), $atts ) );
      return '<div class="visibility-' . $show . '">' . do_shortcode($content) . '</div>';
}

/*-----------------------------------------------------------------------------------*/
/* Responsive Images 
/*-----------------------------------------------------------------------------------*/

function toast_responsive( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
  
  return '<span class="responsive">' . do_shortcode($content) . '</span>';
}


/* ----------------------------------------------------- */
/* Pre Process Shortcodes */
/* ----------------------------------------------------- */
function pre_process_shortcode($content) {
    global $shortcode_tags;
 
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    remove_all_shortcodes();

    add_shortcode('alert', 'toast_alert');
    add_shortcode('video', 'toast_video');
    add_shortcode('separator', 'toast_separator');
    add_shortcode('toggle', 'toast_toggle');
    add_shortcode('visibility', 'toast_responsivevisibility');

    // Do the shortcode (only the one above is registered)
    $content = do_shortcode($content);
 
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
 
    return $content;
}

add_filter('the_content', 'pre_process_shortcode', 7);

// Allow Shortcodes in Widgets
add_filter('widget_text', 'pre_process_shortcode', 7);


/*-----------------------------------------------------------------------------------*/
/* Add TinyMCE Buttons to Editor */
/*-----------------------------------------------------------------------------------*/
add_action('init', 'add_button');

function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_3', 'register_button_3'); 
   }  
}

// Define Position of TinyMCE Icons
function register_button_3($buttons) {  
   array_push($buttons, "alert", "video", "separatorheadline", "toggle", "visibility");  
   return $buttons;  
}

function add_plugin($plugin_array) {
  $plugin_array['alert'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';  
  $plugin_array['video'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
  $plugin_array['toggle'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
  $plugin_array['visibility'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
  $plugin_array['separatorheadline'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
  return $plugin_array;
}   




