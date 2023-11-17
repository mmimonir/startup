<?php

class Custom_Menu_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "<ul>"; // Custom HTML for sub-menu start
    }

    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "</ul>"; // Custom HTML for sub-menu end
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $current_object_id = 0)
    {
        // $indent = str_repeat("\t", $depth);
        // $output .= $indent . "<li>"; // Custom HTML for menu item start
        $output .= "<li>"; // Custom HTML for menu item start
        $output .= '<a  href="' . $item->url . '" class="nav-item nav-link">' . $item->title  . '</a>'; // Link and title
    }

    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>"; // Custom HTML for menu item end
    }
}

function startup_setup()
{
    load_theme_textdomain('startup', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post', 'slider', 'team'));

    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'startup')
    ));
}
add_action('after_setup_theme', 'startup_setup');

function startup_assets()
{   // Load All CSS
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap', array(), '1.0.0', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('startup-style', get_stylesheet_uri());

    // Load All JS
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/js/counterup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'startup_assets');

// Main Sliders
function startup_cpt()
{   // Slider Custom Post Type
    $labels = array(
        'name'                  => _x('Sliders', 'Post type general name', 'startup'),
        'singular_name'         => _x('Slider', 'Post type singular name', 'startup'),
        'menu_name'             => _x('Sliders', 'Admin Menu text', 'startup'),
        'name_admin_bar'        => _x('Slider', 'Add New on Toolbar', 'startup'),
        'add_new'               => __('Add New', 'slider'),
        'add_new_item'          => __('Add New Slider', 'startup'),
        'new_item'              => __('New Slider', 'startup'),
        'edit_item'             => __('Edit Slider', 'startup'),
        'view_item'             => __('View Slider', 'startup'),
        'all_items'             => __('All Slider', 'startup'),
        'search_items'          => __('Search Slider', 'startup'),
        'parent_item_colon'     => __('Parent Slider:', 'startup'),
        'not_found'             => __('No slider found.', 'startup'),
        'not_found_in_trash'    => __('No slider found in Trash.', 'startup'),
        'featured_image'        => _x('Slider Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'startup'),
        'set_featured_image'    => _x('Set slider image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'startup'),
        'remove_featured_image' => _x('Remove sliver image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'startup'),
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'menu_icon' => 'dashicons-book',

        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'sliders'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'thumbnail', 'custom-fields', 'thumbnail'),
        // 'taxonomies'         => array('category', 'post_tag'),
    );
    register_post_type('slider', $args);

    // Services Custom Post Type    
    $labels = array(
        'name'                  => _x('Services', 'Post type general name', 'startup'),
        'singular_name'         => _x('Service', 'Post type singular name', 'startup'),
        'menu_name'             => _x('Services', 'Admin Menu text', 'startup'),
        'name_admin_bar'        => _x('Service', 'Add New on Toolbar', 'startup'),
        'add_new'               => __('Add New', 'slider'),
        'add_new_item'          => __('Add New Service', 'startup'),
        'new_item'              => __('New Service', 'startup'),
        'edit_item'             => __('Edit Service', 'startup'),
        'view_item'             => __('View Service', 'startup'),
        'all_items'             => __('All Services', 'startup'),
        'search_items'          => __('Search Services', 'startup'),
        'parent_item_colon'     => __('Parent Services:', 'startup'),
        'not_found'             => __('No services found.', 'startup'),
        'not_found_in_trash'    => __('No services found in Trash.', 'startup'),
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'menu_icon' => 'dashicons-book',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'custom-fields', 'thumbnail'),
    );
    register_post_type('services', $args);

    // Price Custom Post
    $labels = array(
        'name'                  => _x('Prices', 'Post type general name', 'startup'),
        'singular_name'         => _x('Price', 'Post type singular name', 'startup'),
        'menu_name'             => _x('Prices', 'Admin Menu text', 'startup'),
        'name_admin_bar'        => _x('Price', 'Add New on Toolbar', 'startup'),
        'add_new'               => __('Add New', 'slider'),
        'add_new_item'          => __('Add New Price', 'startup'),
        'new_item'              => __('New Price', 'startup'),
        'edit_item'             => __('Edit Price', 'startup'),
        'view_item'             => __('View Price', 'startup'),
        'all_items'             => __('All Prices', 'startup'),
        'search_items'          => __('Search Prices', 'startup'),
        'parent_item_colon'     => __('Parent Prices:', 'startup'),
        'not_found'             => __('No prices found.', 'startup'),
        'not_found_in_trash'    => __('No prices found in Trash.', 'startup'),
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'menu_icon' => 'dashicons-book',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'price'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'custom-fields', 'thumbnail'),
    );
    register_post_type('price', $args);

    // Testimonials Custom Post
    $labels = array(
        'name'                  => _x('Testimonials', 'Post type general name', 'startup'),
        'singular_name'         => _x('Testimonial', 'Post type singular name', 'startup'),
        'menu_name'             => _x('Testimonials', 'Admin Menu text', 'startup'),
        'name_admin_bar'        => _x('Testimonial', 'Add New on Toolbar', 'startup'),
        'add_new'               => __('Add New', 'slider'),
        'add_new_item'          => __('Add New Testimonial', 'startup'),
        'new_item'              => __('New Testimonial', 'startup'),
        'edit_item'             => __('Edit Testimonial', 'startup'),
        'view_item'             => __('View Testimonial', 'startup'),
        'all_items'             => __('All Testimonials', 'startup'),
        'search_items'          => __('Search Testimonials', 'startup'),
        'parent_item_colon'     => __('Parent Testimonials:', 'startup'),
        'not_found'             => __('No testimonials found.', 'startup'),
        'not_found_in_trash'    => __('No testimonials found in Trash.', 'startup'),
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'menu_icon' => 'dashicons-book',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonial'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'custom-fields'),
    );
    register_post_type('testimonial', $args);

    // Teams Custom Post
    $labels = array(
        'name'                  => _x('Teams', 'Post type general name', 'startup'),
        'singular_name'         => _x('Team', 'Post type singular name', 'startup'),
        'menu_name'             => _x('Teams', 'Admin Menu text', 'startup'),
        'name_admin_bar'        => _x('Team', 'Add New on Toolbar', 'startup'),
        'add_new'               => __('Add New', 'slider'),
        'add_new_item'          => __('Add New Team', 'startup'),
        'new_item'              => __('New Team', 'startup'),
        'edit_item'             => __('Edit Team', 'startup'),
        'view_item'             => __('View Team', 'startup'),
        'all_items'             => __('All Teams', 'startup'),
        'search_items'          => __('Search Teams', 'startup'),
        'parent_item_colon'     => __('Parent Teams:', 'startup'),
        'not_found'             => __('No teams found.', 'startup'),
        'not_found_in_trash'    => __('No teams found in Trash.', 'startup'),
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'menu_icon' => 'dashicons-book',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'custom-fields', 'thumbnail'),
    );
    register_post_type('team', $args);
}
add_action('init', 'startup_cpt');

function startup_acf_json($path)
{
    // update path
    $path = get_stylesheet_directory() . '/acf-json';

    // return
    return $path;
}
add_filter('acf/settings/save_json', 'startup_acf_json');


// Pagination
function startup_pagination()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max   = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link());

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array) $links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link());

    echo '</ul></div>' . "\n";
}

// Sidebar Register
function startup_sidebar()
{
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'startup'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'startup'),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="section-title section-title-sm position-relative pb-3 mb-4"><h3 class="mb-0">',
        'after_title'   => '</h3></div>',
    ));
}

add_action('widgets_init', 'startup_sidebar');

// Creating the widget
// Creating the widget
class startup_search_widget extends WP_Widget
{

    // The construct part
    function __construct()
    {
        parent::__construct(
            // Base ID of your widget
            'startup_search_widget',

            // Widget name will appear in UI
            __('Startup Search Widget', 'startup'),

            // Widget description
            array('description' => __('Search Widget for Startup Theme', 'startup'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
?>
            <!-- Search Form Start -->
            <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">

                <form action="<?php echo home_url('/'); ?>" method="get">
                    <div class="input-group">
                        <input type="search" name="s" value="<?php echo get_search_query(); ?>" class="form-control p-3" placeholder="Keyword">
                        <button type="submit" class="btn btn-primary px-4"><i class="fa fa-search"></i></button>
                    </div>
                </form>

            </div>
            <!-- Search Form End -->
        <?php

            echo $args['after_widget'];
        }
    }

    // Creating widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Search', 'startup');
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    <?php
        }
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

    // Class wpb_widget ends here
}

// Register and load the widget
function startup_search_widget_load()
{
    register_widget('startup_search_widget');
}

add_action('widgets_init', 'startup_search_widget_load');
