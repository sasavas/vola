<?php
// Register navigation menus
function register_nav() {
    register_nav_menus(
        array(
            'header' => 'Header',
            'footer' => 'Footer',
            '404'    => '404'
        )
    );
}

// Theme setup function
function setup() {
    register_nav();
    add_theme_support('post-thumbnails');
    add_image_size('team', 475, 475, array('center', 'center'));
}

if (!function_exists('setup')) {
    add_action('after_setup_theme', 'setup');
}

// Enqueue styles and scripts
function enqueue_theme_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style('vola-styles', get_stylesheet_uri());

// Enqueue Google Material Icons stylesheet
    wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons+Outlined', array(), null);

    $styles_dir = get_template_directory() . '/assets/styles/';
    $styles_url = get_template_directory_uri() . '/assets/styles/';

    // Enqueue jQuery from local file
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', array(), null, true);
    
    // Uncomment this line to enqueue your custom init script
    // wp_enqueue_script('init', get_template_directory_uri() . '/js/init.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

// Include custom post types
$custom_post_types = array(
    'product',
    'our-reference',
    'vola-page',
    'social-media',
    'home-properties',
    'products-properties'
);

foreach ($custom_post_types as $cpt) {
    include_once(get_template_directory() . '/custom-post-types/' . $cpt . '.php');
}

// Add theme support for site icons
function my_theme_setup() {
    add_theme_support('site-icon');
}
add_action('after_setup_theme', 'my_theme_setup');


?>
