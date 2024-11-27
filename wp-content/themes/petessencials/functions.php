<?php


/**
 * Essential theme supports
 * */
function theme_setup()
{
    // tag-title
    add_theme_support('title-tag');


    // post thumbnail
    add_theme_support('post-thumbnails');

    /** post formats */
    // $post_formats = array('aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status');
    // add_theme_support('post-formats', $post_formats);


    /** HTML5 support **/
    // add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

    /** custom background **/
    // $bg_defaults = array(
    //     'default-image'          => '',
    //     'default-preset'         => 'default',
    //     'default-size'           => 'cover',
    //     'default-repeat'         => 'no-repeat',
    //     'default-attachment'     => 'scroll',
    // );
    // add_theme_support('custom-background', $bg_defaults);

    /** custom header **/
    // $header_defaults = array(
    //     'default-image'          => '',
    //     'width'                  => 300,
    //     'height'                 => 60,
    //     'flex-height'            => true,
    //     'flex-width'             => true,
    //     'default-text-color'     => '',
    //     'header-text'            => true,
    //     'uploads'                => true,
    // );
    // add_theme_support('custom-header', $header_defaults);

    // /** custom log **/
    // add_theme_support('custom-logo', array(
    //     'height'      => 60,
    //     'width'       => 400,
    //     'flex-height' => true,
    //     'flex-width'  => true,
    //     'header-text' => array('site-title', 'site-description'),
    // ));
}
add_action('after_setup_theme', 'theme_setup');

// Enqueue styles
function pet_enqueue_styles()
{
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/assets/css/output.css', array(), '1.0', 'all');
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/dabad9c33d.js', array(), null, true);
    wp_enqueue_script('carouseljs', get_template_directory_uri() . '/assets/js/carousel.js');
}

add_action('wp_enqueue_scripts', 'pet_enqueue_styles');

// Register menu
function petessentials_register_nav_menu()
{
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'petessentials'),
        'footer_menu'  => __('Footer Menu', 'petessentials'),
    ));
}
add_action('after_setup_theme', 'petessentials_register_nav_menu', 0);
