<?php
add_action('init', 'create_our_references_type');
add_action('cmb2_admin_init', 'cmb2_reference_fields');

function create_our_references_type() {
    register_post_type('our_reference',
        array(
            'labels'      => array(
                'name'          => __('Our References', 'textdomain'),
                'singular_name' => __('Reference', 'textdomain'),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => 'references'),
            'supports'    => array('title', 'editor', 'thumbnail'),
            //'taxonomies'  => array('category', 'post_tag'),
        )
    );
}

function cmb2_reference_fields() {
    $prefix = ''; // Prefix for all fields

    // Initialize the metabox
    $cmb = new_cmb2_box(array(
        'id'            => 'our_reference_fields',
        'title'         => __('Our Reference Fields', 'textdomain'),
        'object_types'  => array('our_reference'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ));

    // Text field for Title
    $cmb->add_field(array(
        'name'        => esc_html__('Company', 'online-generator'),
        'id'          => $prefix . 'company',
        'type'        => 'text',
        'attributes'  => array(
            'placeholder' => esc_html__('Company', 'online-generator'),
        ),
    ));

    $cmb->add_field(array(
        'name'        => esc_html__('Order', 'online-generator'),
        'id'          => $prefix . 'order',
        'type'        => 'text_small', // This is technically a text input but can be typecast to a number.
        'attributes'  => array(
            'placeholder' => esc_html__('Order', 'online-generator'),
            'type' => 'number', // Makes the input a number type
            'pattern' => '\d*', // Only allows digits to be entered
            'min' => '0', // Minimum value
            'max' => '100', // Maximum value
            'step' => '1' // Increment steps
        )
    ));

    // Image field for Icon
    $cmb->add_field(array(
        'name' => esc_html__('Icon', 'online-generator'),
        'id'   => $prefix . 'icon',
        'type' => 'file',
    ));
}