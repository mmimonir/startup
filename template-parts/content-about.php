<!-- About Start -->
<?php

if (acf()) {
    $about_image = get_field('about_image', 'option');
    $about_subtitle = get_field('about_subtitle', 'option');
    $about_title = get_field('about_title', 'option');
    $about_description = get_field('about_description', 'option');
    $about_features = get_field('about_features', 'option');
    $about_info_icon = get_field('about_info_icon', 'option');
    $about_info_subtitle = get_field('about_info_subtitle', 'option');
    $about_info_title = get_field('about_info_title', 'option');
    $about_button_text = get_field('about_button_text', 'option');
    $about_button_url = get_field('about_button_url', 'option');
}

?>
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase"><?php echo acf() ? $about_subtitle : 'ABOUT US'; ?></h5>
                    <h1 class="mb-0"><?php echo acf() ? $about_title : 'The Best IT Solution With 10 Years of Experience'; ?></h1>
                </div>
                <p class="mb-4"><?php echo $about_description; ?></p>
                <div class="row g-0 mb-3">
                    <?php
                    if (acf()) {
                        foreach ($about_features as $feature) {
                    ?>
                            <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                                <h5 class="mb-3"><i class="<?php echo $feature['about_feature_icon']; ?> text-primary me-3"></i><?php echo $feature['about_feature_title']; ?></h5>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Award Winning</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staff</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Support</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="<?php echo $about_info_icon; ?> text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2"><?php echo acf() ? $about_info_subtitle : 'Call to ask any question'; ?></h5>
                        <h4 class="text-primary mb-0"><?php echo acf() ? $about_info_title : '+012 345 6789'; ?></h4>
                    </div>
                </div>
                <a href="<?php echo acf() ? $about_button_url : '#'; ?>" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s"><?php echo acf() ? $about_button_text : 'Request A Quote'; ?></a>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo acf() ? $about_image['url'] : 'assets/img/about.jpg';  ?>" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->