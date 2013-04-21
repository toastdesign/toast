<article <?php post_class(); ?>>
    
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail('aspect43half', array('class' =>  'thumbnail')); ?></a>
        </div>
    <?php } ?> 
    
    <header>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header>

    <div class="entry-meta">
        <?php get_template_part ('templates/entry-meta'); ?>
    </div>
    
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    
    <footer>
        <?php get_template_part ('templates/tags'); ?>
    </footer>
    
</article>
