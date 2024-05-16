<?php get_header(); ?>

<?php
/*
Template Name: About
*/
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/about.css' ?>" />

<div class="root">

    <?php
    global $post;
    
    $title = get_the_title();
    $content = get_the_content();
    $preTitle = get_post_meta($post->ID, '_page_pre_title', true);
    $background_image = get_post_meta($post->ID, '_page_background_image', true);

    include (get_template_directory() . "/navigation.php");
    $base_img = get_template_directory_uri() . '/assets/img/';

    ?>
    <div class="about-container">
        <div class="bg_image__about">
            <img src="<?php echo $background_image; ?>" alt="">
            <div class="hero__about">
                <div class="hero_inner">
                    <div class="hero_content">
                        <h6 class="mb-4"><?php echo $preTitle ?></h6>
                        <h1>
                            <?php echo $title ?>
                        </h1>

                        <?php echo wpautop(wp_kses_post($content)); ?>

                        <img src="<?php echo $base_img; ?>/contact-letter.png" alt="">
                        
                        <div class="my-2"></div>
                        <div class="d-flex mt-5">
                            <button type="button" class="btn btn-outline-dark btn-lg me-3">Call Us</button>
                            <button type="button" class="btn btn-dark btn-lg ms-3">Write to Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center">

            <?php echo get_logo_vertical(240, 96); ?>

            <h3>WE PROVIDES A WIDE RANGE OF SERVICES ON AVIATION SOFTWARE</h3>
            <p>VOLA works hard to cover all aspects of aviation operations in single software that communicates each
                other.
            </p>
            <div class="d-flex mt-5">
                <a href="<?php echo '/products' ?>">
                    <button routerLinkActive="router-link-active" type="button" class="btn btn-light btn-lg">See the
                        products</button>
                </a>
            </div>
        </div>

        <?php
        get_footer();
        ?>
    </div>
</div>

<script>
    let elems = document.getElementsByTagName('p');
    for(let elem of elems){
        // elem.classList.add('mt-3');
    }
</script>