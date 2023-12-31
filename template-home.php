<?php
/*
Template Name: Template Home
*/
if (class_exists('ACF')) {
    get_header();  ?>
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $args = array(
                'post_type' => 'slider',
                'posts_per_page' => 3,
            );

            $slider = new WP_Query($args);
            $i = 0;
            if ($slider->have_posts()) {
                while ($slider->have_posts()) {

                    $slider->the_post();
                    $i++;

                    $slider_subtitle = get_field('slider_subtitle');
                    $slider_btn_1_text = get_field('slider_btn_1_text');
                    $slider_btn_1_url = get_field('slider_btn_1_url');
                    $slider_btn_2_text = get_field('slider_btn_2_text');
                    $slider_btn_2_url = get_field('slider_btn_2_url');

            ?>
                    <div class="carousel-item <?php if ($i == 1) {
                                                    echo 'active';
                                                } ?>">
                        <img class="w-100" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php echo $slider_subtitle; ?></h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?php the_title(); ?></h1>
                                <a href="<?php echo esc_url($slider_btn_1_url); ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php echo $slider_btn_1_text; ?></a>
                                <?php
                                if ($slider_btn_2_text) {
                                ?>
                                    <a href="<?php echo $slider_btn_2_url; ?>" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"><?php echo $slider_btn_2_text; ?></a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
            <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    <!-- Navbar & Carousel End -->

    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <?php
                $i = 0;
                $counters = get_field('counters', 'option');
                foreach ($counters as $counter) {
                    $i++;
                ?>
                    <div class="col-lg-4 wow <?php echo $counter['counter_animation']; ?>" data-wow-delay="<?php echo $counter['counter_delay']; ?>">
                        <div class="<?php echo $i % 2 == 0 ?  "bg-light" : 'bg-primary'; ?> shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                            <div class="<?php echo $i % 2 == 0 ?  "bg-primary" : 'bg-white'; ?> d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                                <i class="<?php echo $counter['counter_icon']; ?> <?php echo $i % 2 == 0 ?  "text-white" : 'text-primary'; ?>"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="<?php echo $i % 2 == 0 ?  "text-primary" : 'text-white'; ?> mb-0"><?php echo $counter['counter_title']; ?></h5>
                                <h1 class="<?php echo $i % 2 == 0 ?  "text-black" : 'text-white'; ?> mb-0" data-toggle="counter-up"><?php echo $counter['counter_number']; ?></h1>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Facts Start -->

    <?php get_template_part('template-parts/content', 'about'); ?>
    <?php get_template_part('template-parts/content', 'feature'); ?>
    <?php get_template_part('template-parts/content', 'service'); ?>
    <?php get_template_part('template-parts/content', 'price'); ?>
    <?php get_template_part('template-parts/content', 'qoute'); ?>
    <?php get_template_part('template-parts/content', 'testimonial'); ?>
    <?php get_template_part('template-parts/content', 'team'); ?>
    <?php get_template_part('template-parts/content', 'blog'); ?>

    <?php get_footer(); ?>
<?php
} else {
    get_template_part('demo-data/template-home');
}
?>