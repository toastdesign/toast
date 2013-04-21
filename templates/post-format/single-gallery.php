<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>

    <div class="post-gallery flexslider">
        <?php if ( $images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ))){ ?>
        <ul class="slides">
            <?php foreach( $images as $image ) :  ?>
                <li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'minti'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php echo wp_get_attachment_image($image->ID, $thumbnail_size); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php } ?>
    </div>
    
    <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    
</article>
<?php endwhile; ?>