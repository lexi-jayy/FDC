<?php

function mytheme_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'custom_theme_colour_section', array(
        'title' => __('Colours', 'FDCTheme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('custom_background_colour', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_background_control', array(
        'label' => __( 'Background Colour', 'FDCTheme'),
        'section' => 'custom_theme_colour_section',
        'settings' => 'custom_background_colour',
    )));



    $wp_customize->add_setting('navigation_background', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'custom_header_background_colour', array(
        'label' => __( 'Header Colour', 'FDCTheme'),
        'section' => 'custom_theme_colour_section',
        'settings' => 'navigation_background',
    )));
}
add_action( 'customize_register', 'mytheme_customize_register' );




function mytheme_customize_css()
{
    ?>
         <style type="text/css">
             body {
                 background-color: <?php echo get_theme_mod('custom_background_colour', '#000000'); ?>;
             }
             .custom_nav{
                 background-color: <?php echo get_theme_mod('navigation_background', '#ffffff'); ?>;
             }
         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');