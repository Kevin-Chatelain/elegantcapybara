<?php 

function cd_customizer_settings($wp_customize) {
    $wp_customize->add_section('cd_colors', array(
        'title' => 'Couleur',
        'priority' => 30,
    ));

    $wp_customize->add_setting('background_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label' => 'Couleur de fond',
        'section' => 'cd_colors',
        'settings' => 'background_color',
    )));

    add_action('wp_head', 'cd_customizer_css');
    function cd_customizer_css() {
        ?>
            <style type="text/css">
                body {background: #<?php echo get_theme_mod('background_color', '#fffffff'); ?>;}
            </style>
        <?php
    }
}

add_action('customize_register', 'cd_customizer_settings');