<?php

/*
Template Name: Template Service
*/
if (class_exists('ACF')) {
    get_header();
?>
<?php get_template_part('template-parts/content', 'breadcumb'); ?>
<?php get_template_part('template-parts/content', 'service'); ?>
<?php get_template_part('template-parts/content', 'testimonial'); ?>

<?php get_footer(); ?>
<?php
} else {
    get_template_part('demo-data/template-service');
}
?>