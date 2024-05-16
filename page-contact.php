<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/styles/contact.css' ?>" />

<div class="root">

    <?php
    /*
    Template Name: Contact
    */

    include (get_template_directory() . "/navigation.php");

    $base_img = get_template_directory_uri() . '/assets/img/';

    ?>

    <div class="contact-container">
        <div class="bg_image__contact">
            <img src="<?php echo $base_img; ?>c_bg.png" alt="">

            <div class="hero__contact">
                <div class="hero_inner">
                    <img src="<?php echo $base_img; ?>/contact-letter.png" alt="">
                    <div class="hero_content">
                        <h6 class="h6__contact">Strengthen your aviation organization</h6>
                        <h1 class="h1__contact">
                            GET IN TOUCH
                        </h1>
                        <p class="p__contact">
                            Let’s analyze your needs together and offer you the right solutions and the right products
                            for
                            your organization.
                        </p>
                        
                        <?php echo do_shortcode('[wpforms id="39" title="false"]'); ?>
                        
                        <div class="d-flex form-actions">
                            <button type="button" class="btn btn-outline-light btn-lg me-3">Call Us</button>
                            <button type="button" class="btn btn-light btn-lg ms-3">Write to Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page_inner__contact">
            <div class="c_container">
                <div class="c_title_container">
                    <div class="line"></div>
                    <div class="c_title">
                        CALL <br>
                        US
                    </div>
                </div>
                <div class="c_content_container">
                    +90 850 309 0 329 
                </div>
            </div>
            <div class="c_container">
                <div class="c_content_container">
                    sales&commat;vola.aero
                </div>
                <div class="c_title_container">
                    <div class="line"></div>
                    <div class="c_title">
                        WRITE TO <br>
                        US
                    </div>
                </div>
            </div>
            <div class="c_container">
                <iframe width="100%" height="600px" frameborder="0" style="border:0"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://maps.google.com/maps?q=Nidakule Ataşehir Batı&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <?php
        get_footer();
        ?>

    </div>
</div>