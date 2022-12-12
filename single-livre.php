<?php get_header(); ?>

    <div class="page-content">  
        <div class="page-header">
            <h1><?php the_title(); ?></h1>
            <div class="barre-title"></div>
        </div>

        <div class="categorie-header">
            <?php  the_terms($post->ID, 'categorie', 'Catégorie : '); ?>
        </div>

        <?php the_content(); ?>

        <div class="credit-livre">
            <p><span>Rédigé par :</span> <?php echo the_field('auteur'); ?></p>
            <p><span>Disponibilité :</span> <?php echo the_field('disponible_en_magasin'); ?></p>
            <p><span>Editeurs :</span> <?php echo the_field('editeurs'); ?></p>
            <p><span>Photo du livre :</span></p> <img src="<?php echo the_field('photo_du_livre'); ?>"/>
        </div>
    </div>

<?php get_footer(); ?>