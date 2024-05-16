<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/page.css' ?>" />

<?php get_header(); ?>

<div class="root">

    <?php include (get_template_directory() . "/navigation.php"); ?>

    <div class="page-container">
        <div class="page_inner__page">
            <div class="page_content">
                <?php the_content(); ?>
            </div>
        </div>

    </div>

    <?php get_footer(); ?>
</div>