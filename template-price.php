<?php

/*
Template Name: Template Price
*/
if (class_exists('ACF')) {
    get_header();
?>
<?php get_template_part('template-parts/content', 'breadcumb'); ?>
<?php get_template_part('template-parts/content', 'price'); ?>
<?php get_template_part('template-parts/content', 'qoute'); ?>

<?php get_footer(); ?>
<?php
} else {
    get_template_part('demo-data/template-price');
}
?>