<?php get_header(); ?>

    <h1><?php the_title(); ?></h1>

    <?php  the_terms($post->ID, 'categorie', 'Catégorie :'); ?>

    <?php the_content(); ?>

<?php get_footer(); ?>