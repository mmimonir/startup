<?php get_header(); ?>
<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">
                <?php
                printf(
                    esc_html__('Search Results for: %s', 'startup'),
                    '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
                );
                ?></h1>

        </div>
    </div>
</div>
<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-8">
                <div class="row g-5">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            // get author data
                            $author_id = get_the_author_meta('ID');
                            $author_name = get_the_author_meta('display_name', $author_id);

                            // get date data
                            $post_date = get_the_date('j M, Y');

                            // get category data
                            $categories = get_the_category();


                    ?>
                            <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        <?php
                                        if (!empty($categories[0]->name)) {
                                            foreach ($categories as $category) {
                                                $category_name = $category->name;
                                                $category_url = get_category_link($category->term_id);
                                        ?>
                                                <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="<?php echo $category_url; ?>"><?php echo $category_name;  ?></a>

                                        <?php
                                            }
                                        }

                                        ?>

                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3"><i class="far fa-user text-primary me-2"></i><?php echo $author_name; ?></small>
                                            <small><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $post_date; ?></small>
                                        </div>
                                        <h4 class="mb-3"><?php the_title(); ?></h4>
                                        <p><?php the_excerpt(); ?></p>
                                        <a class="text-uppercase" href="<?php the_permalink(); ?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<h2 class="text-center">No results found</h2>';
                    }
                    ?>
                </div>
                <div class="col-md-12">
                    <?php startup_pagination();  ?>
                </div>
            </div>
            <!-- Blog list End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Blog End -->
<?php get_footer(); ?>