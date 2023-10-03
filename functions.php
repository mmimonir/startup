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

    add_theme_support('post-thumbnails', array('slider'));

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
{
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
}
add_action('init', 'startup_cpt');
