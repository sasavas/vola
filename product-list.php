<?php

$base_url = get_template_directory_uri(); // Base URL for static resources

// Args for the custom post type query
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'post_status' => 'publish',
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
        $short_description = get_post_meta(get_the_ID(), 'short_description', true);
        $features = get_post_meta(get_the_ID(), 'detailed_feature_list', true);
        ?>

        <?php if ($show): ?>
            <div class="product">
                <!-- <span class="material-symbols-outlined mat-icon" aria-hidden="false" aria-label="How it works">verified</span> -->
                <?php if ($icon): ?>
                    <img width="44px" height="44px" src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?> icon">
                <?php endif; ?>
                <div class="p_content">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($subtitle); ?></p>

                    <?php if (!empty($features)): ?>
                        <ul>
                            <?php foreach ($features as $feature): ?>
                                <li>
                                    <?php echo esc_html($feature['feature_name']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <p style="text-transform: uppercase;"><?php echo esc_html($short_description); ?></p>

                    <div class="d-flex mt-4">
                        <a class="btn-primary ms-auto me-1" href="<?php echo get_permalink($product_id); ?>">
                            <button type="button" class="btn btn-outline-primary">
                                More About
                                <span style="text-transform: uppercase;"><?php echo esc_html($title); ?></span>
                            </button>
                        </a>
                        <button type="button" class="btn btn-primary ms-1">Get in touch</button>
                    </div>
                </div>
            </div>
        <? endif; ?>

        <?php
    endwhile;
    // Restore original Post Data
    wp_reset_postdata();
else:
    ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php
endif;

?>