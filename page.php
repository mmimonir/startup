<?php if (class_exists('ACF')) {
    get_header();
    get_template_part('template-parts/content', 'breadcumb'); ?>
    <section class="page-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-content">
                        <?php
                        while (have_posts()) {
                            the_post();
                        ?>
                            <h4><?php the_title(); ?></h4>
                            <?php the_content(); ?>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();
} else {
    $requested_page = get_queried_object()->post_name;
    // echo $requested_page;    
    get_template_part('demo-data/template-' . $requested_page);
} ?>