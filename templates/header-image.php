<?php
    // Check if this is a post or page, if it has a thumbnail, and if it's a big one
    if ( is_singular() && current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID ) &&
    	( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) 
    	&&$image[1] >= HEADER_IMAGE_WIDTH ) : ?>
        
        <div class="post-header-image">
        	<?php echo get_the_post_thumbnail( $post->ID ); ?>
        </div>
		
		<?php elseif ( get_header_image() ) : ?>
		<div class="header-image">
	        <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
        </div>
<?php endif; ?>