<?php
get_header();

$base_url = get_template_directory_uri(); // Base URL for static resources

// Args for the custom post type query
$args = array(
    'post_type' => 'our_reference', // Replace 'my_custom_type' with your actual custom post type
    'posts_per_page' => -1, // Number of posts to show. Use -1 for all posts.
    'post_status'    => 'publish',
);

// The Query
$the_query = new WP_Query($args); ?>

<div class="references">
    <h6 style="text-transform: uppercase;">
        Trusted by users at leading companies around the world
    </h6>

    <ul>
        <?php            
        // The Loop
        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post();

                $title = get_post_meta(get_the_ID(), 'company', true);
                $icon = get_post_meta(get_the_ID(), 'icon', true);
                ?>

                <li>
                    <!-- <h5><?php echo esc_html($title); ?></h5> -->
                    <?php if ($icon): ?>
                        <img style="max-width: 240px;" src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?> icon">
                    <?php endif; ?>
                </li>
                <?php
            endwhile;
        else:
            echo '<p>' . _e('Sorry, no reference matched your criteria.') . '</p>';
        endif;

        wp_reset_postdata();
        ?>
    </ul>
</div>