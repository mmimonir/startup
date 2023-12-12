<?php

/*
Template Name: Template Quote
*/
if (class_exists('ACF')) {
    get_header();
?>
<?php get_template_part('template-parts/content', 'breadcumb'); ?>
<?php get_template_part('template-parts/content', 'quote'); ?>

<?php get_footer(); ?>
<?php
} else {
    get_template_part('demo-data/template-quote');
}
?>