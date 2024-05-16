<?php
add_action('init', 'create_product_type');
add_action('cmb2_admin_init', 'cmb2_product_fields');

function create_product_type()
{
    register_post_type(
        'product',
        array(
            'labels' => array(
                'name' => __('Products', 'textdomain'),
                'singular_name' => __('Product', 'textdomain'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'ourproducts'),
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}

function cmb2_product_fields()
{
    $prefix = ''; // Prefix for all fields

    // Initialize the metabox
    $cmb = new_cmb2_box(
        array(
            'id' => 'product_fields',
            'title' => __('Product Fields', 'textdomain'),
            'object_types' => array('product'), // Post type
            'context' => 'normal',
            'priority' => 'high',
            'show_names' => true,
        )
    );

    // Text field for Title
    $cmb->add_field(
        array(
            'name' => esc_html__('Title', 'online-generator'),
            'id' => $prefix . 'title',
            'type' => 'text',
            'attributes' => array(
                'placeholder' => esc_html__('Title', 'online-generator'),
            ),
        )
    );

    // Text field for Subtitle
    $cmb->add_field(
        array(
            'name' => esc_html__('Subtitle', 'online-generator'),
            'id' => $prefix . 'subtitle',
            'type' => 'text',
            'attributes' => array(
                'placeholder' => esc_html__('Subtitle', 'online-generator'),
            ),
        )
    );

    // Image field for Icon
    $cmb->add_field(
        array(
            'name' => esc_html__('Icon', 'online-generator'),
            'id' => $prefix . 'icon',
            'type' => 'file',
        )
    );

    // Text field for Short Description
    $cmb->add_field(
        array(
            'name' => esc_html__('Short Description', 'online-generator'),
            'id' => $prefix . 'short_description',
            'type' => 'text',
            'description' => esc_html__('Short description which will be displayed on the product listing page', 'online-generator'),
            'attributes' => array(
                'placeholder' => esc_html__('Short Description', 'online-generator'),
            ),
        )
    );

    // Select field for Animation Type
    $cmb->add_field(
        array(
            'name' => esc_html__('Animation Type', 'online-generator'),
            'id' => $prefix . 'animation_type',
            'type' => 'select',
            'options' => array(
                'updown' => esc_html__('Up and Down', 'online-generator'),
                'leftright' => esc_html__('Left and Right', 'online-generator'),
            ),
            'default' => 'updown',
        )
    );

    // Checkbox for Show On Home Page
    $cmb->add_field(
        array(
            'name' => esc_html__('Show On Home Page', 'online-generator'),
            'id' => $prefix . 'show_on_home_page',
            'type' => 'checkbox',
        )
    );

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

    // Group field for Detailed Feature List
    $group_field_id = $cmb->add_field(
        array(
            'id' => $prefix . 'detailed_feature_list',
            'type' => 'group',
            'description' => __('Features that will be displayed in the single product detail page.', 'online-generator'),
            'options' => array(
                'group_title' => __('Feature {#}', 'online-generator'),
                'add_button' => __('Add Another Feature', 'online-generator'),
                'remove_button' => __('Remove Feature', 'online-generator'),
                'sortable' => true,
            ),
        )
    );

    // Sub-fields for Detailed Feature List
    $cmb->add_group_field(
        $group_field_id,
        array(
            'name' => __('Feature Name', 'online-generator'),
            'id' => 'feature_name',
            'type' => 'text',
        ),
    );

    $cmb->add_group_field($group_field_id, array(
        'name' => __('Feature Description', 'online-generator'),
        'id' => 'feature_description',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true, // Use auto-paragraphs
            'media_buttons' => true, // Show insert/upload button(s)
            'teeny' => false, // Output the minimal editor config used in Press This
            'textarea_rows' => 10, // Set the number of rows
        ),
    )
    );

    $cmb->add_group_field($group_field_id, array(
        'name' => esc_html__('Icon', 'online-generator'),
        'id' => 'feature_icon',
        'type' => 'file',
    )
    );

    $cmb->add_group_field($group_field_id, array(
        'name' => esc_html__('Image Location', 'online-generator'),
        'id' => $prefix . 'image_location',
        'type' => 'select',
        'options' => array(
            'left' => esc_html__('Left', 'online-generator'),
            'right' => esc_html__('Right', 'online-generator'),
        ),
        // 'default' => 'left',
    )
    );

    $cmb->add_group_field($group_field_id, array(
        'name' => esc_html__('Theme', 'online-generator'),
        'id' => $prefix . 'theme',
        'type' => 'select',
        'options' => array(
            'light' => esc_html__('Light', 'online-generator'),
            'dark' => esc_html__('Dark', 'online-generator'),
        ),
        'default' => 'light',
    )
    );
}