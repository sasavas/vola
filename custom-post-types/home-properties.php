<?php 

add_action('init', 'register_home_properties_post_type');
add_action('cmb2_admin_init', 'home_properties_metaboxes');
// add_action('admin_init', 'disable_new_posts');

function register_home_properties_post_type() {
    $args = array(
        'labels'             => array(
            'name'                  => 'Home Properties',
            'singular_name'         => 'Home Property',
            'menu_name'             => 'Home Properties',
            'name_admin_bar'        => 'Home Property',
            'add_new'               => 'Add New',
            'add_new_item'          => 'Add New Home Property',
            'new_item'              => 'New Home Property',
            'edit_item'             => 'Edit Home Property',
            'view_item'             => 'View Home Property',
            'all_items'             => 'All Home Properties',
            'search_items'          => 'Search Home Properties',
            'parent_item_colon'     => 'Parent Home Properties:',
            'not_found'             => 'No home properties found.',
            'not_found_in_trash'    => 'No home properties found in Trash.'
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'home_properties'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail')
    );
    register_post_type('home_properties', $args);
}

function home_properties_metaboxes() {
    $prefix = 'hp_'; // Prefix for all fields
    $cmb = new_cmb2_box(array(
        'id'            => $prefix . 'meta',
        'title'         => 'Property Details',
        'object_types'  => array('home_properties'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ));

    $cmb->add_field(array(
        'name' => 'Legend',
        'desc' => 'Enter a legend',
        'id'   => $prefix . 'legend',
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => 'Description',
        'desc' => 'Enter a description for the property',
        'id'   => $prefix . 'description',
        'type' => 'textarea_small',
        'attributes' => array(
            'maxlength' => 256,
        )
    ));

    $cmb->add_field(array(
        'name' => 'Primary Action Text',
        'id'   => $prefix . 'primary_action_text',
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => 'Primary Action Link',
        'id'   => $prefix . 'primary_action_link',
        'type' => 'text_url',
    ));

    $cmb->add_field(array(
        'name' => 'Secondary Action Text',
        'id'   => $prefix . 'secondary_action_text',
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => 'Secondary Action Link',
        'id'   => $prefix . 'secondary_action_link',
        'type' => 'text_url',
    ));

    $cmb->add_field(array(
        'name' => 'Property Image',
        'desc' => 'Upload an image for the property',
        'id'   => $prefix . 'image',
        'type' => 'file',
    ));
}

// Global 
function disable_new_posts() {
    // Get the global post type object
    $post_type = get_post_type_object('home_properties');

    // Check if a post of type 'home_properties' exists
    if (get_posts(array('post_type' => 'home_properties', 'post_status' => 'publish', 'posts_per_page' => 1))) {
        // Disable adding new posts
        $post_type->cap->create_posts = 'do_not_allow';
    }
}