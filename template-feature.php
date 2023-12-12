<?php

/*
Template Name: Template Feature
*/
if (class_exists('ACF')) {
    get_header();
?>
<?php get_template_part('template-parts/content', 'breadcumb'); ?>
<?php get_template_part('template-parts/content', 'feature'); ?>

<?php get_footer(); ?>
<?php
} else {
    get_template_part('demo-data/template-feature');
}
?>