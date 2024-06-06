<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/navigation.css' ?>" />
<?php require_once (get_template_directory() . '/logo.php'); ?>

<div class="navigation-container">
    <?php echo get_logo_horizontal(); ?>
    <nav class="ms-auto">
        <a href="<?php echo home_url('/'); ?>">HOME</a>

        <?php
        $args = array(
            'sort_column' => 'menu_order', // Orders the pages by menu order
            'post_type' => 'page',       // Fetches only pages
            'post_status' => 'publish'     // Only fetches published pages
        );

        $pages = get_pages($args);

        if ($pages) {
            foreach ($pages as $page) {
                echo '<a href="' . get_permalink($page->ID) . '">' . esc_html($page->post_title) . '</a>';
            }
        }

        wp_reset_postdata();
        ?>
    </nav>

    <nav class="mobile_nav">
        <span class="material-icons-outlined close_menu mat-icon" aria-hidden="false" aria-label="menu">close</span>
        <a href="<?php echo home_url('/'); ?>">HOME</a>
        <?php
        $args = array(
            'sort_column' => 'menu_order', // Orders the pages by menu order
            'post_type' => 'page',       // Fetches only pages
            'post_status' => 'publish'     // Only fetches published pages
        );

        $pages = get_pages($args);

        if ($pages) {
            foreach ($pages as $page) {
                echo '<a href="' . get_permalink($page->ID) . '">' . esc_html($page->post_title) . '</a>';
            }
        }

        wp_reset_postdata();
        ?>
    </nav>
    <menu>
        <span class="material-icons-outlined open_menu mat-icon" aria-hidden="false" aria-label="menu">menu</span>
    </menu>
</div>

<script>
    jQuery(document).ready(function($) {
     $(".open_menu").click(function() {
        $(".mobile_nav").addClass("opened")
     });
     $(".close_menu").click(function() {
        $(".mobile_nav").removeClass("opened")
     })
    });
</script>