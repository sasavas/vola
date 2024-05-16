<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/home.css' ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/presentation.css' ?>" />

<div class="root">

    <?php
    include (get_template_directory() . "/navigation.php");

    $base_img = get_template_directory_uri() . '/assets/img/';
    $base_vid = get_template_directory_uri() . '/assets/vids/';
    ?>
    <div class="home-container">
        <div class="bg_image__home">
            <div class="light_bg"></div>
            <img src="<?php echo $base_img; ?>/site-bg.png" alt="">
            <div class="img_overlay">
                <svg class="airplane" viewBox="0 0 1260 1080" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M535.5 521.525C852.57 503.074 1132.01 308.977 1260.21 19.8695C1264.35 10.5145 1257.46 0 1247.23 0L0 0.000366018V1080H1247.23C1257.46 1080 1264.35 1069.49 1260.21 1060.13C1132.01 771.013 852.58 576.925 535.5 558.475C381.73 549.53 233.63 542.384 152.55 542.384L156.56 559.115L151.95 558.735L136.71 545.312L95.2999 548.91L124.13 597.045L112 595.096L73.2599 549.53C73.2599 549.53 36.1498 550.16 36.1498 539.995C36.1498 529.83 73.2599 530.46 73.2599 530.46L112 484.894L124.13 482.945L95.2999 531.08L136.71 534.678L151.95 521.255L156.56 520.875L152.55 537.606C233.62 537.606 381.72 530.47 535.5 521.515V521.525Z"
                        fill="#233146" />
                </svg>
            </div>
            <div class="img_color">
                <svg class="airplane" viewBox="0 0 1260 1080" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M535.5 521.525C852.57 503.074 1132.01 308.977 1260.21 19.8695C1264.35 10.5145 1257.46 0 1247.23 0L0 0.000366018V1080H1247.23C1257.46 1080 1264.35 1069.49 1260.21 1060.13C1132.01 771.013 852.58 576.925 535.5 558.475C381.73 549.53 233.63 542.384 152.55 542.384L156.56 559.115L151.95 558.735L136.71 545.312L95.2999 548.91L124.13 597.045L112 595.096L73.2599 549.53C73.2599 549.53 36.1498 550.16 36.1498 539.995C36.1498 529.83 73.2599 530.46 73.2599 530.46L112 484.894L124.13 482.945L95.2999 531.08L136.71 534.678L151.95 521.255L156.56 520.875L152.55 537.606C233.62 537.606 381.72 530.47 535.5 521.515V521.525Z"
                        fill="#233146" />
                </svg>
            </div>

            <?php
            $args = array(
                'post_type' => 'home_properties',
                'posts_per_page' => 1, // Limit to one post
                'post_status' => 'publish'
            );

            $the_query = new WP_Query($args);

            // The Loop
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $legend = get_post_meta(get_the_ID(), 'hp_legend', true);
                    $description = get_post_meta(get_the_ID(), 'hp_description', true);
                    $primary_action_text = get_post_meta(get_the_ID(), 'hp_primary_action_text', true);
                    $primary_action_link = get_post_meta(get_the_ID(), 'hp_primary_action_link', true);
                    $secondary_action_text = get_post_meta(get_the_ID(), 'hp_secondary_action_text', true);
                    $secondary_action_link = get_post_meta(get_the_ID(), 'hp_secondary_action_link', true);
                    $image = get_post_meta(get_the_ID(), 'hp_image', true);
                }
            } else {
                // No posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
            ?>

            <div class="hero__home">
                <div class="hero_inner">
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
                                    class="btn btn-outline-primary btn-lg me-3"><?php echo $primary_action_text ?></button>
                            </a>
                            <a class="btn-primary" href="<?php echo $secondary_action_link ?>">
                                <button type="button"
                                    class="btn btn-primary btn-lg ms-3"><?php echo $secondary_action_text ?></button>
                            </a>
                        </div>
                    </div>
                    <img src="<?php echo $base_img; ?>/efb.png" alt="">
                </div>
            </div>
        </div>

        <div class="page_inner__home">
            <div class="insights">
                <div class="section">
                    <span class="material-symbols-outlined mat-icon">laptop_mac</span>
                    <p>We works hard to cover all aspects of aviation operations in single software that communicates
                        with
                        each other.</p>
                </div>
                <div class="section">
                    <span class="material-symbols-outlined mat-icon" aria-hidden="false"
                        aria-label="Trusted by ">ads_click</span>
                    <p>VOLA is trusted by many aviation organizations around the world who use its software</p>
                </div>
                <div class="section">
                    <span class="material-symbols-outlined mat-icon" aria-hidden="false"
                        aria-label="How it works">design_services</span>
                    <p>We provides a wide range of services on aviation software.</p>
                </div>
            </div>

            <?php include_once (get_template_directory() . '/references.php'); ?>

            <div class="page_content vid">
                <h2 style="text-transform:uppercase;">
                    The smartest solution on the market!
                </h2>

                <img src="<?php echo $base_vid ?>/vid-1.gif" alt="" style="width:100%;height:auto;">

            </div>

            <div class="page_content_bg">
                <h1 class="h1__home">
                    Manage your aviation organization
                </h1>
                <div class="content_image_area d-flex">
                    <img src="<?php echo $base_img; ?>plane.png" alt="">
                    <img src="<?php echo $base_img; ?>Group 83.png" alt="">
                </div>
                <div class="pc_inner">
                    <?php include_once (get_template_directory() . '/product-list.php'); ?>
                </div>
            </div>
        </div>

        <?php
        get_footer();
        ?>
    </div>
</div>