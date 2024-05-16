<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/products.css' ?>" />

<div class="root">

    <?php
    /*
    Template Name: ProductPage
    */

    include (get_template_directory() . "/navigation.php");

    $base_img = get_template_directory_uri() . '/assets/img/';
    ?>
    <div class="product-container">

        <img src="<?php echo $base_img; ?>/plane.png" class="bg_img">

        <div class="hero__home">
            <div class="hero_inner">

                <?php
                $args = array(
                    'post_type' => 'pp_properties',
                    'posts_per_page' => 1, // Limit to one post
                    'post_status' => 'publish'
                );

                $the_query = new WP_Query($args);

                // The Loop
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $legend = get_post_meta(get_the_ID(), 'pp_legend', true);
                        $description = get_post_meta(get_the_ID(), 'pp_description', true);
                        $primary_action_text = get_post_meta(get_the_ID(), 'pp_primary_action_text', true);
                        $primary_action_link = get_post_meta(get_the_ID(), 'pp_primary_action_link', true);
                        $secondary_action_text = get_post_meta(get_the_ID(), 'pp_secondary_action_text', true);
                        $secondary_action_link = get_post_meta(get_the_ID(), 'pp_secondary_action_link', true);
                        $image = get_post_meta(get_the_ID(), 'pp_image', true);
                    }
                } else {
                    // No posts found
                }

                // Restore original Post Data
                wp_reset_postdata();
                ?>

                <img src="<?php echo $base_img; ?>/Group 83.png" alt="">
                <div class="hero_content">
                    <h1 class="h1__home">
                        <?php echo $legend ?>
                    </h1>
                    <p>
                        <?php echo $description ?>
                    </p>
                    <div class="d-flex">
                        <a class="btn-primary" href="<?php echo $primary_action_link ?>">
                            <button type="button"
                                class="btn btn_friendly btn-outline-light btn-lg me-3"><?php echo $primary_action_text ?></button>
                        </a>
                        <a class="btn-primary" href="<?php echo $secondary_action_link ?>">
                            <button type="button"
                                class="btn btn_friendly btn-light btn-lg ms-3"><?php echo $secondary_action_text ?></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Args for the custom post type query
        $args = array(
            'post_type' => 'product', // Replace 'my_custom_type' with your actual custom post type
            'posts_per_page' => -1 // Number of posts to show. Use -1 for all posts.
        );

        // The Query
        $the_query = new WP_Query($args);

        // The Loop
        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post();

                $product_id = $post->ID;
                $show = get_post_meta(get_the_ID(), 'show_on_home_page', true);
                $title = get_post_meta(get_the_ID(), 'title', true);
                $subtitle = get_post_meta(get_the_ID(), 'subtitle', true);
                $icon = get_post_meta(get_the_ID(), 'icon', true);
                $sub_title = get_post_meta(get_the_ID(), 'short_description', true);
                $features = get_post_meta(get_the_ID(), 'detailed_feature_list', true);

                ?>

                <a class="product" href="<?php echo get_permalink($product_id); ?>">
                    <img src="<?php echo $icon ?>" style="width:64px; height:64px;" alt="">
                    <div class="p_content">
                        <h3><?php echo $title ?></h3>
                        <p>
                            <?php echo $subtitle ?>
                        </p>
                    </div>
                </a>

                <?php
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
        else:
            echo '<p>' . _e('Sorry, no posts matched your criteria.') . '</p>';
        endif;

        get_footer();
        ?>

    </div>