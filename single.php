<?php get_header(); ?>

<?php 

$args = array(
    'post_type' => 'post',
    'post_per_page' => 6
);

$blogposts = new WP_Query($args);

    while (have_posts()){
        the_post();
    ?>

    <h2><?php the_title(); ?></h2>
    Posted by <?php the_author();?>
    <img src="<?php echo get_the_post_thumbnail_uri(get_the_ID()); ?>"/>
    <?php the_content();
    comment_form();

    }

?>


<?php get_footer();