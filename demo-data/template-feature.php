<?php

/*
Template Name: Template Feature
*/
get_template_part('demo-data/header');
// include_once('template-parts/header');
?>

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Features</h1>
            <a href="" class="h5 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h5 text-white">Features</a>
        </div>
    </div>
</div>
<?php get_template_part('demo-data/template/feature'); ?>

<?php
get_template_part('demo-data/footer');
?>