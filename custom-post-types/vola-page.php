<?php

add_action('cmb2_admin_init', 'my_page_custom_fields');

function my_page_custom_fields() {
    $prefix = '_page_';

    $cmb = new_cmb2_box(array(
        'id'            => 'page_custom_fields',
        'title'         => __('Page Custom Fields', 'textdomain'),
        'object_types'  => array('page'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ));

    $cmb->add_field(array(
        'name'       => __('Pre-Title', 'textdomain'),
        'id'         => $prefix . 'pre_title',
        'type'       => 'text',
    ));

    $cmb->add_field(array(
        'name'       => __('Background Image URL', 'textdomain'),
        'id'         => $prefix . 'background_image',
        'type'       => 'file',
        'options'    => array(
            'url' => true, // Use text input field for the url
        ),
        'text'    => array(
            'add_upload_file_text' => __('Add Background Image', 'textdomain'), // Change upload button text. Default: "Add or Upload File"
        ),
    ));
}
