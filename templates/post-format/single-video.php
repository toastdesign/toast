<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>

	<div class="post-video">
		<?php echo get_post_meta($post->ID, '_format_video_embed', true); ?>
	</div>
    
    <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    
</article>
<?php endwhile; ?>