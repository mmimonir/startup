<?php
class startup_tags_widget extends WP_Widget
{

    // The construct part
    function __construct()
    {
        parent::__construct(
            // Base ID of your widget
            'startup_tags_widget',

            // Widget name will appear in UI
            __('Startup Tags Widget', 'startup'),

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
            <div class="d-flex flex-wrap m-n1">
                <?php
                $tags = get_tags();
                foreach ($tags as $tag) {
                ?>
                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="btn btn-light m-1"><?php echo $tag->name; ?></a>
                <?php
                }
                ?>
            </div>
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
            $title = __('Tags Cloud', 'startup');
        }
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php

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
function startup_tags_widget_load()
{
    register_widget('startup_tags_widget');
}

add_action('widgets_init', 'startup_tags_widget_load');
