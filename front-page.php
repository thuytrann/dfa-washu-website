<?php get_header(); ?>
<section class="section-carousel">
    <div class="img-slider">
        <div class="slide active">
            <img src="<?php echo get_template_directory_uri(); ?>/img/demo1.png" alt="">
        </div>
        <div class="slide">
            <img src="<?php echo get_template_directory_uri(); ?>/img/demo2.jpg" alt="">
        </div>
        <div class="slide">
            <img src="<?php echo get_template_directory_uri(); ?>/img/demo3.jpeg" alt="">
        </div>
        <div class="slide">
            <img src="<?php echo get_template_directory_uri(); ?>/img/demo4.jpg" alt="">
        </div>
        <div class="slide">
            <img src="<?php echo get_template_directory_uri(); ?>/img/demo5.png" alt="">
        </div>
        <div class="navigation">
            <div class="btn active"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
            <div class="btn"></div>
        </div>
    </div>
</section>
<section class="section-blog">
    <h2>Our Latest Project/Blogs</h2>
    <div class="fp-all-posts">
        <?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 6,
   )); 
        ?>

        <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="fp-blog">
            <img class="fp-blog-img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
            <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
            </a>
            <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <p><?php __('No News'); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>