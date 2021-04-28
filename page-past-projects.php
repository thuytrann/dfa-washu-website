<?php get_header(); ?>
<?php   
    echo nl2br("\n"); 
    echo nl2br("\n");
?>
<section class="section-blog">
    <h2>Past Projects</h2>
    <div class="fp-all-posts">
        <?php 
   // the query
$args = array(
    'post_type' => 'project',
    'posts_per_page' => 3
);
   $project_query = new WP_Query($args); 
        ?>

        <?php if ( $project_query->have_posts() ) : ?>
        <?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
        <div class="fp-blog">
            <img class="fp-blog-img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
            <h3><?php the_title(); ?></h3>
            <a class="btn-readmore"><?php the_content(); ?></a>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <p><?php __('No News'); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
