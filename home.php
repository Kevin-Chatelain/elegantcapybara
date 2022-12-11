<?php get_header(); ?>

    <div class="home-content">
        

        <div class="last-post-container">
            <div class="page-header">
                <h1 class="page-title">Accueil</h1>
                <div class="barre-title"></div>
            </div>

            <div class="post-grid">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                    <article class="post">
                        <h2><?php the_title(); ?></h2>
                            <?php the_post_thumbnail(); ?>
                                <p class="post__meta">
                                    Publié le <?php the_time(get_option('data_format')); ?>
                                    par <?php the_author() ?> <br> <?php comments_number(); ?>
                                </p>

                                <?php the_excerpt(); ?>

                                <p class="link-container">
                                    <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
                                </p>
                    </article>

                <?php endwhile; endif; ?>
            </div>
        </div>

        <div class="sidebar">
            <?php dynamic_sidebar('sidebar_home'); ?>
        </div>


    </div>


    

<?php get_footer(); ?>