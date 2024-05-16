<?php 

function register_pp_properties_post_type() {
    $args = array(
        'labels'             => array(
            'name'                  => 'Product Page Properties',
            'singular_name'         => 'Product Page Property',
            'menu_name'             => 'Product Page Properties',
            'name_admin_bar'        => 'Product Page Property',
            'add_new'               => 'Add New',
            'add_new_item'          => 'Add New Product Page Property',
            'new_item'              => 'New Product Page Property',
            'edit_item'             => 'Edit Product Page Property',
            'view_item'             => 'View Product Page Property',
            'all_items'             => 'All Product Page Properties',
            'search_items'          => 'Search Product Page Properties',
            'parent_item_colon'     => 'Parent Product Page Properties:',
            'not_found'             => 'No product page properties found.',
            'not_found_in_trash'    => 'No product page properties found in Trash.'
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'pp_properties'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail')
    );
    register_post_type('pp_properties', $args);
}
add_action('init', 'register_pp_properties_post_type');

function pp_properties_metaboxes() {
    $prefix = 'pp_'; // Prefix for all fields
    $cmb = new_cmb2_box(array(
        'id'            => $prefix . 'meta',
        'title'         => 'Product Page Details',
        'object_types'  => array('pp_properties'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ));

    $cmb->add_field(array(
        'name' => 'Legend',
        'desc' => 'Enter a legend for the product page',
        'id'   => $prefix . 'legend',
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => 'Description',
        'desc' => 'Enter a description for the product page',
        'id'   => $prefix . 'description',
        'type' => 'textarea_small',
    ));

    $cmb->add_field(array(
        'name' => 'Primary Action Text',
        'desc' => 'Text for the "Get In Touch" button/link',
        'id'   => $prefix . 'primary_action_text',
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => 'Primary Action Link',
        'desc' => 'URL for the "Get In Touch" button/link',
        'id'   => $prefix . 'primary_action_link',
        'type' => 'text_url',
    ));

    $cmb->add_field(array(
        'name' => 'Secondary Action Text',
        'desc' => 'Text for the "Get Started Now" button/link',
        'id'   => $prefix . 'secondary_action_text',
        'type' => 'text',
    ));

    $cmb->add_field(array(
        'name' => 'Secondary Action Link',
        'desc' => 'URL for the "Get Started Now" button/link',
        'id'   => $prefix . 'secondary_action_link',
        'type' => 'text_url',
    ));

    $cmb->add_field(array(
        'name' => 'Property Image',
        'desc' => 'Upload an image for the product page',
        'id'   => $prefix . 'image',
        'type' => 'file',
    ));
}
add_action('cmb2_admin_init', 'pp_properties_metaboxes');
