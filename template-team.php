<?php

/*
Template Name: Template Team
*/
if (class_exists('ACF')) {
    get_header();
?>
<?php get_template_part('template-parts/content', 'breadcumb'); ?>
<?php get_template_part('template-parts/content', 'team'); ?>

<?php get_footer(); ?>
<?php
} else {
    get_template_part('demo-data/template-team');
}
?>