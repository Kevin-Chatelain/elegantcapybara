<?php 

function theme_customizer_function($wp_customize) {
    $wp_customize->add_panel('landing_panel', array(
        'title' => 'Landing Panel',
        'priority' => 10,
        'capability' => 'edit_theme_options'
    ));

    $wp_customize->add_section('landing_page_home', array(
        'title' => 'Home Section',
        'description' => __('Home Section Customizer'),
        'panel' => 'landing_panel'
    ));

    $wp_customize->add_setting('landing_small_header', array(
        'default' => __('Dernières actualités')
    ));

    $wp_customize->add_control('landing_small_header', array(
        'label' => 'Small Heading',
        'section' => 'landing_page_home',
        'priority' => 1
    ));

    $wp_customize->add_setting('landing_textarea', array(
        'default' => __('Votre texte ici')
    ));

    $wp_customize->add_control('landing_textarea', array(
        'label' => 'Description',
        'section' => 'landing_page_home',
        'priority' => 2,
        'type' => 'textarea'
    ));
}

add_action('customize_register', 'theme_customizer_function');

