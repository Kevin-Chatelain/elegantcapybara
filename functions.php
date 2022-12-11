<?php 

require get_template_directory().'/inc/customizer.php';

//Ajout automatique du titre dans l'en-tête du site
add_theme_support('title-tag');

//Ajout de la prise en charge des images mise en avant
add_theme_support('post_thumbnails');

//Ajout du menu 
function save_mon_menu() {
    register_nav_menu('menu_principal', __('Menu principal'));
}
add_action('init', 'save_mon_menu');

function theme_widgets_init() {
    register_sidebar( array( 
        'name' => esc_html('Sidebar', 'theme'),
        'id' => 'sidebar-1',
        'description' => esc_html('Add widget here.', 'theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'theme_widgets_init');

function additional_custom_styles() {
    wp_enqueue_style('uniquestylesheetid', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'additional_custom_styles');



function costum_pt() {
    $labels = array(
        'name' => _x('Livres', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Livres', 'Post Type General Name', 'textdomain'),
        'menu_name' => __('Livres', 'textdomain'),
        'menu_admin_bar' => __('Livres', 'textdomain'),
        'parent_item_colon' => __('Livre parent', 'textdomain'),
        'all_items' => __('Tous les livres', 'textdomain'),
        'add_new_item' => __('Ajouter un Livre', 'textdomain'),
        'add_new' => __('Ajouter', 'textdomain'),
        'new_item' => __('Nouveau livre', 'textdomain'),
        'edit_item' => __('Modifier le livre', 'textdomain'),
        'update_item' => __('Mettre à jour le livre', 'textdomain'),
        'view_item' => __('Voir le livre', 'textdomain'),
        'search_items' => __('Rechercher un livre', 'textdomain'),
        'not_found' => __('Aucun livre', 'textdomain'),
        'not_found_in_trash' => __('Aucun livre dans la corbeille', 'textdomain'),
    );

    $rewrite = array(
        'slug' => _x('livre', 'livre', 'textdomain'),
        'with_front' => true,
        'pages' => true,
        'feeds' => false,
    );

    $args = array(
        'label' => __('livre', 'textdomain'),
        'description' => __('livres', 'textdomain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        'taxonomies' => array('livre_type'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-book-alt',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true, 
        'has_archive' => false, 
        'exclude_from_search' => false,
        'publicy_queryable' => true,
        'query_var' => 'livre',
        'rewrite' => $rewrite,
        'capability_type' => 'page',
    );
    register_post_type('livre', $args);

    register_taxonomy(
        'categorie',
        'livre',
        array(
            'label' => 'Catégorie',
            'labels' => array(
                'name' => 'Catégories',
                'singular_name' => 'Catégorie',
                'all_items' => 'Toutes les catégories',
                'edit_item' => 'Modifier la catégorie',
                'view_item' => 'Voir la catégorie',
                'updata_item' => 'Mettre à jour la catégorie',
                'add_new_item' => 'Ajouter une catégorie',
                'new_item_name' => 'Nouvelle catégorie',
                'search_items' => 'Rechercher parmi les catégories',
                'popular_items' => 'Catégories les plus utilisées',
            ),
            'hierarchical' => true
        )
    );

    register_taxonomy_for_object_type('categorie', 'livre');
}

add_action('init', 'costum_pt', 10);

function theme_remove_menu_pages() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'theme_remove_menu_pages');

// Création de Widgets

add_action('widgets_init', 'nouvelle_zone_widgets_init');

function nouvelle_zone_widgets_init() {
    
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar_home',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
        'class' => 'nom_de_la_classe',
    ));

    register_sidebar(array(
        'name' => 'Footer Gauche',
        'id' => 'footer_left',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
        'class' => 'nom_de_la_classe',
    ));

    register_sidebar(array(
        'name' => 'Footer Droite',
        'id' => 'footer_right',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
        'class' => 'nom_de_la_classe',
    ));

    register_sidebar(array(
        'name' => 'Header Logo',
        'id' => 'header_logo',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
        'class' => 'nom_de_la_classe',
    ));
    
    register_sidebar(array(
        'name' => 'Footer copyright',
        'id' => 'footer_copyright',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
        'class' => 'nom_de_la_classe',
    ));
}

add_action('widget_init', 'remove_default_widgets');

function remove_default_widgets() {
    unregister_widget('WP_Widget_Calendar');

    unregister_widget( 'WP_Widget_Pages' );  
    unregister_widget( 'WP_Widget_Calendar' );  
    unregister_widget( 'WP_Widget_Archives' ); 
    unregister_widget( 'WP_Widget_Links' );  
    unregister_widget( 'WP_Widget_Media_Audio' ); 
    unregister_widget( 'WP_Widget_Media_Image' ); 
    unregister_widget( 'WP_Widget_Media_Video' ); 
    unregister_widget( 'WP_Widget_Media_Gallery' ); 
    unregister_widget( 'WP_Widget_Meta' );  
    unregister_widget( 'WP_Widget_Search' ); 
    unregister_widget( 'WP_Widget_Text'); 
    unregister_widget( 'WP_Widget_Categories' ); 
    unregister_widget( 'WP_Widget_Recent_Posts' ); 
    unregister_widget( 'WP_Widget_Recent_Comments'); 
    unregister_widget( 'WP_Widget_RSS' ); 
    unregister_widget( 'WP_Widget_Tag_Cloud' ); 
    unregister_widget( 'WP_Nav_Menu_Widget' );  
    unregister_widget( 'WP_Widget_Custom_HTML' ); 
}

function shortcode_hello() {
    return "<h1>Hello !</h1>";
}

add_shortcode('hello', 'shortcode_hello');

function shortcode_bvn($atts) {
    extract(shortcodeatts(
        array(
            'langue' => 'FR'
    ), $atts));

    if($langue == "EN") {
        $text = "Welcome";
    }
    else {
        $text = "Bienvenue";
    }

    return '<h1>'.$text.'</h1>';
}

add_shortcode('bvn', 'shortcode_bvn');

function derniersarticles($atts) { 
    extract(shortcode_atts(array( 
        'articles' => 1,
    ), $atts));

    $return_string = '<ul>';
    query_posts(array('post_type' => 'livre', 'orderby' => 'date', 'order' => 'DESC', 'showposts' => $articles)); 
    if (have_posts()) :
        while (have_posts()) : the_post();
            $return_string .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
        endwhile;
    endif;
    $return_string .= '</ul>';

    wp_reset_query();
    return $return_string;
}
add_shortcode('articles', 'derniersarticles');

function shortcode_color($atts, $content) {
    extract(shortcode_atts(array( 
        'color' => 'black',
    ), $atts));
    return '<p style="color:'.$color.';">'.$content.'</p>';
}
add_shortcode('text-color', 'shortcode_color');

add_action('admin_init', 'themeoptions');

function themeoptions( ) {
    register_setting('my_theme', 'background_color');
    register_setting('my_theme', 'primary-color');
    register_setting('my_theme', 'secondary-color');
    register_setting('my_theme', 'font-color1');
    register_setting('my_theme', 'font-color2');
}

add_action('admin_menu', 'adminmenupage');

function adminmenupage() {
    add_menu_page(
        'Options',
        'Options du thème',
        'administrator',
        'themeoptionspage',
        'mythemeoptionspage'
    );
}

function mythemeoptionspage() {
    ?>
    <div class="wrap">
        <h1>Options du thème</h1>

        <form method="post" action="options.php">
            <?php
                settings_fields('my_theme');
            ?>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="background_color">Couleur du body</label></th>
                        <td><input type="text" id="background_color" name="background_color" class="my-color-field" value="<?php echo get_option('background_color'); ?>"/></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="primary-color">Couleur principale</label></th>
                        <td><input type="text" id="primary-color" name="primary-color" class="my-color-field" value="<?php echo get_option('primary-color'); ?>"/></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="secondary-color">Couleur secondaire</label></th>
                        <td><input type="text" id="secondary-color" name="secondary-color" class="my-color-field" value="<?php echo get_option('secondary-color'); ?>"/></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="font-color1">Couleur du texte 1</label></th>
                        <td><input type="text" id="font-color1" name="font-color1" class="my-color-field" value="<?php echo get_option('font-color1'); ?>"/></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row"><label for="font-color2">Couleur du texte 2</label></th>
                        <td><input type="text" id="font-color2" name="font-color2" class="my-color-field" value="<?php echo get_option('font-color2'); ?>"/></td>
                    </tr>
                </table>

            <p class="submit">
                <input type="submit" class="button-primary" value="Sauvegarder" />
            </p>
        </form>
    </div>
    <?php
}

add_action('wp_head', 'themecss');

function themecss() {
?>
    <style type="text/css">

        :root {
            --font-color1: <?php echo !empty(get_option('font-color1')) ? get_option('font-color1') : "#f7f7f7"; ?>;
            --font-color2: <?php echo !empty(get_option('font-color2')) ? get_option('font-color2') : "#151515"; ?>;
            --secondary-color: <?php echo !empty(get_option('secondary-color')) ? get_option('secondary-color') : "#917d57"; ?>;
            --primary-color: <?php echo !empty(get_option('primary-color')) ? get_option('primary-color') : "#222"; ?>;
        }
        body{
            background-color: <?php echo !empty(get_option('background_color')) ? get_option('background_color') : "#F4F4F4"; ?>;
        }
    </style>
<?php
}

add_action('admin_enqueue_scripts', 'my_enqueue_color_picker');
function my_enqueue_color_picker($hook_suffix) {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('my-script-handle', get_template_directory_uri() . '/myscript.js', 
    array('wp-color-picker'), false, true);
}

?>