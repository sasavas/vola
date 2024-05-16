<?php require_once (get_template_directory() . '/logo.php'); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/footer.css' ?>" />

<div class="footer-container">
    <div class="summary">
        <?php echo get_logo_horizontal(44); ?>
    </div>

    <div class="vola">
        Her hakkı VOLA TEKNOLOJİ A.Ş’ye aittir. Copyright © 2024

        <div class="social_media">

            <?php

            $args = array(
                'post_type' => 'social_media',
                'posts_per_page' => -1, // Retrieve all posts
                'post_status' => 'publish'
            );
            $social_media_query = new WP_Query($args);

            if ($social_media_query->have_posts()) {
                while ($social_media_query->have_posts()) {
                    $social_media_query->the_post();

                    // Get custom fields values
                    $social_media_name = get_post_meta(get_the_ID(), 'sm_name', true);
                    $social_media_icon = get_post_meta(get_the_ID(), 'sm_icon', true);
                    $social_media_link = get_post_meta(get_the_ID(), 'sm_link', true);

                    echo '<a href="'. $social_media_link . '"><img width="32" height="32" src="' . $social_media_icon . '"/></a>';
                }
            }

            wp_reset_postdata();
            ?>

        </div>
    </div>
</div>

<div class="legals">

</div>