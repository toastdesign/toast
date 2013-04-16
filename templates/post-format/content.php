<article <?php post_class(); ?>>
    
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('blog-medium'); ?></a>
        </div>
    <?php } ?> 
    
    <header>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php get_template_part('templates/entry-meta'); ?>
    </header>
    
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    
    <footer>
    <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
    
</article>
