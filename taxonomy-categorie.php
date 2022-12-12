<?php get_header(); ?>
    
    <div class="page-content">

        <div class="page-header">
            <h1><?php the_archive_title(); ?></h1>
            <div class="barre-title"></div>
        </div>

        <?php the_archive_description(); ?>

       <?php 
       
       $args = array(  
        'post_type' => 'livre',
        'post_status' => 'publish',
        'posts_per_page' => 8, 
        'orderby' => 'title', 
        'order' => 'ASC', 
    );

    $loop = new WP_Query( $args ); 
    ?>
    <div class="post-grid">
    <?php
    while ( $loop->have_posts() ) : $loop->the_post(); 
    ?>

        <article class="post">
            <h2><?php the_title(); ?></h2>
                
            <?php the_excerpt(); ?>

            <p class="link-container">
                <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
            </p>       
        </article>
    <?php
    endwhile;
    ?>
</div>

<?php

wp_reset_postdata(); 

