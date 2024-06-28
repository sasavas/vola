<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/home.css' ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/products.css' ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/presentation.css' ?>" />

<div class="root">

    <?php

    global $post;
    $product = $post;
    // echo 'Current post ID is: ' . $post->ID;
    // echo 'Title: ' . get_the_title($post->ID);
    
    include (get_template_directory() . "/navigation.php");

    $base_img = get_template_directory_uri() . '/assets/img/';
    ?>

    <?php
    $args = array(
        'post_type' => 'product', // Replace 'my_custom_type' with your actual custom post type
        'posts_per_page' => -1 // Number of posts to show. Use -1 for all posts.
    );

    // $product_slug = 'taps';  // Set this to the desired product slug
    // $product = get_page_by_path($product_slug, OBJECT, 'product');
    
    // $title = $post->title;
    // $sub_title = $post->subtitle;
    
    $title = get_post_meta($product->ID, 'title', true);
    $sub_title = get_post_meta($product->ID, 'subtitle', true);

    if ($product) {
        ?>
        <div class="product-container">
            <div class="product">
                <h1><?php echo $title; ?></h1>
                <h6><?php echo $sub_title ?></h6>
            </div>

            <?php $features = get_post_meta($product->ID, 'detailed_feature_list', true); ?>

            <?php if (!empty($features)) { ?>
                <?php foreach ($features as $feature): ?>
                    <?php $image_location = $feature['image_location']; ?>
                    <?php $theme = $feature['theme']; ?>
                    <div class="presentation-container">
                        <div class="section_container <?php echo $theme ?>">
                            <div class="<?php echo $theme ?> <?php echo $image_location ?> layout">
                                <?php $feature_icon_url = $feature['feature_icon']; ?>
                                <?php if ($feature_icon_url): ?>
                                    <div class="img">
                                        <img style="width: 80%" src="<?php echo esc_url($feature_icon_url); ?>"
                                            alt="<?php echo esc_attr(get_the_title($feature_icon_id)); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="text">
                                    <h2><?php echo esc_html($feature['feature_name']); ?></h2>
                                    <h6><?php echo esc_html($feature['feature_subtitle']); ?></h6>

                                    <div class="content">
                                        <?php echo wpautop(wp_kses_post($feature['feature_description'])); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } else {
                echo "not found";
            } ?>
        </div>
        <?php
        wp_reset_postdata();

        $faq_description = get_post_meta($product->ID, 'faq_description', true);
        $faqs = get_post_meta($product->ID, 'faq_list', true); ?>

        <?php if (!empty($faqs)) { ?>
            <div class="faq">
                <h1>FAQ</h1>
                <p><?php echo $faq_description; ?></p>

                <?php $count = 0; ?>
                <?php foreach ($faqs as $faq): ?>
                    <?php $faq_question = $faq['faq_question']; ?>
                    <?php $faq_answer = $faq['faq_answer']; ?>

                    <div class="qa closed">
                        <h5>
                            <?php echo ++$count ?> - 
                            <?php echo $faq_question; ?>
                            <span class="material-icons-outlined toggle_question mat-icon" aria-hidden="false"
                                aria-label="menu">arrow_drop_down</span>
                        </h5>
                        <div class="answer">
                            <?php echo $faq_answer; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php } ?>

        <?php
        wp_reset_postdata();
        get_footer();
        ?>
        <?php
    } else {
        echo '<p>Product not found.</p>';
    }
    ?>

    <script>
        jQuery(document).ready(function ($) {
            $(".qa h5").click(function () {
                if ($(this).parents('.qa').hasClass('open')) {
                    $(this).parents('.qa').removeClass('open');
                    $(this).parents('.qa').addClass('closed');
                } else {
                    $('.qa').removeClass('open');
                    $('.qa').addClass('closed');
                    $(this).parents('.qa').removeClass('closed');
                    $(this).parents('.qa').addClass('open');
                }
            });
        });
    </script>
</div>