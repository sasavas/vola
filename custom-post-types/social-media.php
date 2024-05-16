<?php
add_action('init', 'create_social_media_post_type');
add_action( 'cmb2_admin_init', 'register_social_media_metabox' );

function create_social_media_post_type() {
    register_post_type('social_media',
        array(
            'labels' => array(
                'name' => __('Social Media', 'textdomain'),
                'singular_name' => __('Social Media', 'textdomain')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'social-media'),
            'supports' => array('title'),
        )
    );
}

function register_social_media_metabox() {
    $prefix = 'sm_';

    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Social Media Details', 'cmb2' ),
        'object_types'  => array( 'social_media' ), // Post type
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Social Media Name', 'cmb2' ),
        'desc'       => __( 'Enter the name of the social media platform', 'cmb2' ),
        'id'         => $prefix . 'name',
        'type'       => 'text',
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Social Media Link', 'cmb2' ),
        'desc'       => __( 'Enter the name of the social media link', 'cmb2' ),
        'id'         => $prefix . 'link',
        'type'       => 'text',
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Social Media Icon', 'cmb2' ),
        'desc'       => __( 'Upload or add the URL of the social media icon', 'cmb2' ),
        'id'         => $prefix . 'icon',
        'type'       => 'file',
    ) );
}