<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php $home = "Accueil";?>
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('title') : wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header class="header">
        <div class="header-left">
            <div class="header-logo">
                <?php dynamic_sidebar('header_logo'); ?>
            </div>
            <div class="header-texte">
                <div class="capy-logo">
                    <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
                </div>  
                <p class="slogan"><?php bloginfo('description'); ?></p>
            </div>
        </div> 

        <div class="header-menu desktop-menu">
            <a href="<?php echo home_url('/'); ?>">Accueil</a>
            <?php wp_nav_menu(array('theme_location' => 'menu_principal')); ?>
        </div>

        <div class="header-menu mobile-menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </div>

        <div class="floating-menu">
            <div class="links">
                <a href="<?php echo home_url('/'); ?>">Accueil</a>
                <?php wp_nav_menu(array('theme_location' => 'menu_principal')); ?>
            </div>

            <div class="close">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>

        <script>
            document.querySelector('.mobile-menu').addEventListener('click', () => {
                document.querySelector('.floating-menu').classList.toggle('active-menu');
            })

            document.querySelector('.close').addEventListener('click', () => {
                document.querySelector('.floating-menu').classList.toggle('active-menu');
            })
        </script>
        
        
    </header>
