<article <?php post_class(); ?>>
    
    <div class="post-video">
        <?php echo get_post_meta($post->ID, '_format_video_embed', true); ?>
    </div> 
    
    <header>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header>
    
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    
    <footer>
        <?php get_template_part ('templates/tags'); ?>
    </footer>
    
</article>
