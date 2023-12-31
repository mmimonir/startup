<?php
class startup_plain_text_widget extends WP_Widget
{

    // The construct part
    function __construct()
    {
        parent::__construct(
            // Base ID of your widget
            'startup_plain_text_widget',

            // Widget name will appear in UI
            __('Startup Plain Text Widget', 'startup'),

            // Widget description
            array('description' => __('Search Widget for Startup Theme', 'startup'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $plain_text = $instance['plain_text'];
        $plain_btn_text = $instance['plain_btn_text'];
        $plain_btn_url = $instance['plain_btn_url'];

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
?>
            <!-- Plain Text Start -->
            <div class="bg-light text-center" style="padding: 30px;">
                <p><?php echo $plain_text; ?></p>
                <a href="<?php echo $plain_btn_url; ?>" class="btn btn-primary py-2 px-4"><?php echo $plain_btn_text; ?></a>
            </div>
            <!-- Plain Text End -->
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
            $title = __('Plain Text', 'startup');
        }
        $plain_text = $instance['plain_text'];
        $plain_btn_text = $instance['plain_btn_text'];
        $plain_btn_url = $instance['plain_btn_url'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('plain_text'); ?>"><?php _e('Text:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('plain_text'); ?>" name="<?php echo $this->get_field_name('plain_text'); ?>" type="text" value="<?php echo esc_attr($plain_text); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('plain_btn_text'); ?>"><?php _e('Button Text:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('plain_btn_text'); ?>" name="<?php echo $this->get_field_name('plain_btn_text'); ?>" type="text" value="<?php echo esc_attr($plain_btn_text); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('plain_btn_url'); ?>"><?php _e('Button URL:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('plain_btn_url'); ?>" name="<?php echo $this->get_field_name('plain_btn_url'); ?>" type="url" value="<?php echo esc_attr($plain_btn_url); ?>" />
        </p>
<?php
    }
    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        $instance['plain_text'] = $new_instance['plain_text'];
        $instance['plain_btn_text'] = $new_instance['plain_btn_text'];
        $instance['plain_btn_url'] = $new_instance['plain_btn_url'];

        return $instance;
    }

    // Class wpb_widget ends here
}

// Register and load the widget
function startup_plain_text_widget_load()
{
    register_widget('startup_plain_text_widget');
}

add_action('widgets_init', 'startup_plain_text_widget_load');
