<?php get_header(); ?>

<div class="page-content single-page">
    <?php if(have_posts()): while(have_posts()) : the_post(); ?>
        <article class="post">
            <?php the_post_thumbnail(); ?>

            <h1><?php the_title(); ?></h1>

            <div class="post__content">
                <?php the_content(); ?>
            </div>

            <div class="post__meta">
                <?php echo get_avatar( get_the_author_meta(' ID '), 50); ?>
                <p>
                    Publié le <?php the_date(); ?>
                    par <?php the_author(); ?><br>
                    Catégorie : <?php the_category(); ?><br>
                    Etiquette(s) : <?php the_tags(); ?>
                </p>
            </div>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>