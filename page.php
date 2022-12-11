<?php get_header(); ?>

    <div class="page-content">
        <div class="page-header">
            <h1 class="page-title">
                <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
            </h1>
            <div class="barre-title"></div>
        </div>
        
    </div>
    
<?php get_footer(); ?>