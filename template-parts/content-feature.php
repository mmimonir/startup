<?php
$feature_subtitle = get_field('feature_subtitle', 'option');
$feature_title = get_field('feature_title', 'option');
$features = get_field('feature', 'option');
$feature_column = get_field('feature_column', 'option');
?>
<!-- Features Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"><?php echo $feature_subtitle; ?></h5>
            <h1 class="mb-0"><?php echo $feature_title; ?></h1>
        </div>
        <div class="row g-5">
            <?php
            foreach ($features as $feature) {
                $feature_icon = $feature['feature_icon'];
                $feature_heading = $feature['feature_heading'];
                $feature_description = $feature['feature_description'];
            ?>
                <div class="<?php echo $feature_column; ?>">
                    <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="<?php echo $feature_icon; ?> text-white"></i>
                        </div>
                        <h4><?php echo $feature_heading; ?></h4>
                        <p class="mb-0"><?php echo $feature_description; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Features Start -->