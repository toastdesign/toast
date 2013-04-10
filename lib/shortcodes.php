<?php
/*-----------------------------------------------------------------------------------*/
/*	Alert
/*-----------------------------------------------------------------------------------*/
function toast_alert( $atts, $content = null) {

extract( shortcode_atts( array(
      'type' 	=> 'warning',
      'close'	=> 'true'
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
/*	Br-Tag
/*-----------------------------------------------------------------------------------*/
function toast_br() {
   return '<br />';
}

/*-----------------------------------------------------------------------------------*/
/* Buttons 
/*-----------------------------------------------------------------------------------*/
function toast_buttons( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
        'size'    	=> 'medium',
		'target'    => '_self',
		'lightbox'  => false, 
		'color'     => 'white',
		'icon'		=> ''
    ), $atts));
    
    if($lightbox == true) {
    	$return = "prettyPhoto ";
    }
    else{
    	$return = " ";
    }
    if($icon == '') {
    	$return2 = "";
    }
    else{
    	$return2 = "<i class='icon-".$icon."'></i>";
    }

	$out = "<a href=\"" .$link. "\" target=\"" .$target. "\" class=\"".$return."button ".$color." ".$size."\" rel=\"slides[buttonlightbox]\">". $return2 . "". do_shortcode($content). "</a>";
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/* Callouts & Teaser 
/*-----------------------------------------------------------------------------------*/

function toast_teaser( $atts, $content = null) {
extract( shortcode_atts( array(
      'img' => ''
      ), $atts ) );
      
      if($img == '') {
    	$return = "";
      } else{
    	$return = "<div class='teaser-img'><img src='".$img."' /></div>";
      }
      
      return '<div class="teaser">' .$return. '' . do_shortcode($content) . '</div>';
}

/*-----------------------------------------------------------------------------------*/

function toast_teaserbox( $atts, $content = null) {
extract( shortcode_atts( array(
      'title' => '',
      'button' => '',
      'buttonsize' => 'normal',
      'buttoncolor' => 'alternative-1',
      'link' => '',
      'target'  => '_self'
      ), $atts ) );
      return '<div class="teaserbox"><div class="border"><h2 class="highlight">' .$title. '</h2>' . do_shortcode($content) . '<br /><a class="button ' .$buttonsize. ' ' .$buttoncolor. '" href="' .$link. '" target="' .$target. '">' .$button. '</a></div></div>';
}

/*-----------------------------------------------------------------------------------*/

function toast_callout( $atts, $content = null) {
extract( shortcode_atts( array(
      'title' => '',
      'button' => '',
      'buttonsize' => 'normal',
      'buttoncolor' => 'alternative-1',
      'link' => '',
      'target'  => '_self',
      'buttonmargin' => '0px'
      ), $atts ) );
      return '<div class="callout"><div class="border clearfix"><div class="callout-content">
      				<h2 class="highlight">' .$title. '</h2>' . do_shortcode($content) . '
      			</div><div class="callout-button" style="margin:' .$buttonmargin. ';">
      				<a class="button ' .$buttonsize. ' ' .$buttoncolor. '" href="' .$link. '" target="' .$target. '">' .$button. '</a>
      			</div></div></div>';
}

function toast_box( $atts, $content = null) {
extract( shortcode_atts( array(
      'style' => '1'
      ), $atts ) );
      return '<div class="description clearfix style-' .$style. '">' . do_shortcode($content) . '</div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Google Font
/*-----------------------------------------------------------------------------------*/

function toast_googlefont( $atts, $content = null) {
extract( shortcode_atts( array(
      	'font' => 'Swanky and Moo Moo',
      	'size' => '42px',
      	'margin' => '0px'
      ), $atts ) );
      
      $google = preg_replace("/ /","+",$font);
      
      return '<link href="http://fonts.googleapis.com/css?family='.$google.'" rel="stylesheet" type="text/css">
      			<div class="googlefont" style="font-family:\'' .$font. '\', serif !important; font-size:' .$size. ' !important; margin: ' .$margin. ' !important;">' . do_shortcode($content) . '</div>';
}

/*-----------------------------------------------------------------------------------*/
/*	HR Dividers
/*-----------------------------------------------------------------------------------*/
function toast_hr( $atts, $content = null) {
extract( shortcode_atts( array(
      'style' => '1',
      'margin' => ''
      ), $atts ) );
      
    if($margin == '') {
    	$return = "";
    } else{
    	$return = "style='margin:".$margin." !important;'";
    }
      
    return '<div class="hr hr' .$style. '" ' .$return. '></div>';  
}


/*-----------------------------------------------------------------------------------*/
/*	Tagline
/*-----------------------------------------------------------------------------------*/
function toast_tagline( $atts, $content = null) {
extract( shortcode_atts( array(
      'style' => '1',
      'margin' => ''
      ), $atts ) );
      
    return '<div class="tagline">' . do_shortcode($content) . '</div>';  
}

/*-----------------------------------------------------------------------------------*/
/*	Gap Dividers
/*-----------------------------------------------------------------------------------*/

function toast_gap( $atts, $content = null) {

extract( shortcode_atts( array(
      'height' 	=> '10'
      ), $atts ) );
      
      if($height == '') {
		  $return = '';
	  }
	  else{
		  $return = 'style="height: '.$height.'px;"';
	  }
      
      return '<div class="gap" ' . $return . '></div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Clear-Tag
/*-----------------------------------------------------------------------------------*/
function toast_clear() {  
    return '<div class="clear"></div>';  
}

/*-----------------------------------------------------------------------------------*/
/* Dropcap */
/*-----------------------------------------------------------------------------------*/
function toast_dropcap($atts, $content = null) {
    extract(shortcode_atts(array(
        'style'      => ''
    ), $atts));
    
    if($style == '') {
    	$return = "";
    }
    else{
    	$return = "dropcap-".$style;
    }
    
	$out = "<span class='dropcap ". $return ."'>" .$content. "</span>";
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/* Media */
/*-----------------------------------------------------------------------------------*/

function toast_video($atts) {
	extract(shortcode_atts(array(
		'type' 	=> '',
		'id' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
		'autoplay' 	=> ''
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
/*	Lists
/*-----------------------------------------------------------------------------------*/

function toast_list( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '<ul class="styled-list">'. do_shortcode($content) . '</ul>';
    return $out;
}

/*-----------------------------------------------------------------------------------*/

function toast_item( $atts, $content = null ) {
	extract(shortcode_atts(array(
       	'icon'      => 'ok'
    ), $atts));
	$out = '<li><i class="icon-'.$icon.'"></i>'. do_shortcode($content) . '</li>';
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Block & Pullquotes
/*-----------------------------------------------------------------------------------*/
function toast_blockquote( $atts, $content = null) {
extract( shortcode_atts( array(), $atts ) );
      
	return '<blockquote><p>' . do_shortcode($content) . '</p></blockquote>';
}

/*-----------------------------------------------------------------------------------*/

function toast_pullquote( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'align'      => 'left'
    ), $atts));
	
    return '<span class="pullquote align-'.$align.'">' . do_shortcode($content) . '</span>';
}

/*-----------------------------------------------------------------------------------*/
/* Responsive Images 
/*-----------------------------------------------------------------------------------*/

function toast_responsive( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	
	return '<span class="responsive">' . do_shortcode($content) . '</span>';
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
/* Social Icons 
/*-----------------------------------------------------------------------------------*/

function toast_social( $atts, $content = null) {

extract( shortcode_atts( array(
      'icon' 	=> 'twitter',
      'url'		=> '#',
      'target' 	=> '_blank'
      ), $atts ) );
      
      $capital = ucfirst($icon);
      
      return '<div class="social-icon social-' . $icon . '"><a href="' . $url . '" title="' . $capital . '" target="' . $target . '">' . $capital . '</a></div>';
}

/*-----------------------------------------------------------------------------------*/
/* Testimonial
/*-----------------------------------------------------------------------------------*/

function toast_testimonial( $atts, $content = null) {
extract( shortcode_atts( array(
      'author' => ''
      ), $atts ) );
      return '<div class="testimonial">' . do_shortcode($content) . '</div><div class="testimonial-author">' .$author. '</div>';
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
/* Tooltip */
/*-----------------------------------------------------------------------------------*/

function toast_tooltip( $atts, $content = null)
{
	extract(shortcode_atts(array(
        'text' => ''
    ), $atts));
   
   return '<span class="tooltips"><a href="#" rel="tooltip" title="'.$text.'">'. do_shortcode($content) . '</a></span>';
}

/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

function toast_separator( $atts, $content = null){
	extract(shortcode_atts(array(
       	'headline'      => 'h3',
       	'title' => 'Title'
    ), $atts));
   
	return '<'.$headline.' class="title"><span>'.$title.'</span></'.$headline.'>';
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
  add_shortcode('button', 'toast_buttons');
  
  add_shortcode('teaserbox', 'toast_teaserbox');
  add_shortcode('teaser', 'toast_teaser');
  add_shortcode('callout', 'toast_callout');
  add_shortcode('box', 'toast_box');
  
  add_shortcode('googlefont', 'toast_googlefont');
  
  add_shortcode('br', 'toast_br');
  add_shortcode('clear', 'toast_clear');
  add_shortcode('gap', 'toast_gap');
  add_shortcode('hr', 'toast_hr');
	
	add_shortcode('dropcap', 'toast_dropcap');
	
	add_shortcode('video', 'toast_video');
	
	add_shortcode( 'gal', 'toast_gallery' );
	
	add_shortcode('list', 'toast_list');
	add_shortcode('list_item', 'toast_item');
	
	add_shortcode('blockquote', 'toast_blockquote');
	add_shortcode('pullquote', 'toast_pullquote');
	
	add_shortcode('responsive', 'toast_responsive');
	add_shortcode('visibility', 'toast_responsivevisibility');
	
	add_shortcode('social', 'toast_social');
	
	add_shortcode('custom_table', 'toast_table');
	
	add_shortcode('testimonial', 'toast_testimonial');
	
	add_shortcode('toggle', 'toast_toggle');
	
	add_shortcode('tooltip', 'toast_tooltip');
	add_shortcode('highlight', 'toast_highlight');
	add_shortcode('separator', 'toast_separator');
	
	add_shortcode('tagline', 'toast_tagline');
 
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
     add_filter('mce_buttons_4', 'register_button_4');  
   }  
}  

// Define Position of TinyMCE Icons
function register_button_3($buttons) {  
   array_push($buttons, "alert", "button", "divider", "dropcap", "video", "gap", "clear", "projects", "blog", "bloglist", "testimonial");  
   return $buttons;  
} 
function register_button_4($buttons) {  
   array_push($buttons, "pullquote", "responsiveimage", "visibility", "socialmedia", "table", "tabs", "toggle", "tooltip", "list", "separatorheadline", "googlefont", "teaser", "teaserbox", "callout", "box");  
   return $buttons;  
}  

function add_plugin($plugin_array) {  
   $plugin_array['alert'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['button'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['divider'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['dropcap'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['video'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['gap'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['clear'] = get_template_directory_uri().'/assets/tinymce/tinymce.js'; 
   $plugin_array['pullquote'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['responsiveimage'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['socialmedia'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['table'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['tabs'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['toggle'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['tooltip'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['separatorheadline'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['googlefont'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['teaser'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['teaserbox'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['callout'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['box'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['projects'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['blog'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['bloglist'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   $plugin_array['testimonial'] = get_template_directory_uri().'/assets/tinymce/tinymce.js';
   
   return $plugin_array;  
}  

?>