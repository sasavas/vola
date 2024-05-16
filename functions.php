<?php
function register_nav()
{
    register_nav_menus(
        array(
            "header" => "Header"
        )
    );

    register_nav_menus(
        array(
            "footer" => "Footer"
        )
    );

    register_nav_menus(
        array(
            "404" => "404"
        )
    );
}

if (!function_exists("setup")):
    function setup()
    {
        register_nav();
        add_theme_support('post-thumbnails');
        add_image_size('team', 475, 475, array('center', 'center'));
    }
endif;

function scripts_header()
{
    wp_enqueue_style('init', get_stylesheet_uri());
}

function scripts_footer()
{
    // wp_enqueue_scripts('init', get_template_directory_uri(  ) .'/js/init.js', array('jquery'));
}

function my_theme_styles()
{
    wp_enqueue_style('vola-styles', get_stylesheet_uri());
}

add_action('after_setup_theme', 'setup');
add_action('wp_enqueue_scripts', 'my_theme_styles');
// add_action( 'wp_footer', 'scripts_footer' );


include_once(get_template_directory(  ) .'/custom-post-types/product.php');
include_once(get_template_directory(  ) .'/custom-post-types/our-reference.php');
include_once(get_template_directory(  ) .'/custom-post-types/vola-page.php');
include_once(get_template_directory(  ) .'/custom-post-types/social-media.php');
include_once(get_template_directory(  ) .'/custom-post-types/home-properties.php');
include_once(get_template_directory(  ) .'/custom-post-types/products-properties.php');