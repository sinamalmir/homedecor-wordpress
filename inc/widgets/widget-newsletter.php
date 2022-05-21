


<?php

// Creating the widget
class newsletter_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'newsletter_widget',

// Widget name will appear in UI
            __('Newsletter Sign up(for this theme)', 'wpb_widget_domain'),

// Widget description
            array( 'description' => __( 'Newsletter sign up with contact form 7 plugin (just for this theme)', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $description =  $instance['description'];
        $shortcode =  $instance['shortcode'];

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];  ?>

        <p> <?= $description ; ?> </p>
        <?php echo do_shortcode($shortcode) ; ?>

        <?php echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {


        $title = !empty($instance[ 'title' ] ) ? $instance[ 'title' ] : 'enter the title ';
        $description = !empty($instance[ 'description' ] ) ? $instance[ 'description' ] : 'Description ';
        $shortcode = !empty($instance[ 'shortcode' ] ) ? $instance[ 'shortcode' ] : 'shortcode ';

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"> Title : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'description' ); ?>">description: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'shortcode' ); ?>">shortcode : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" type="text" value="<?php echo esc_attr( $shortcode ); ?>" />
        </p>

        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        $instance['shortcode'] = ( ! empty( $new_instance['shortcode'] ) ) ? strip_tags( $new_instance['shortcode'] ) : '';

        return $instance;
    }

// Class wpb_widget ends here
}


// Register and load the widget
function newsletter_load_widget() {
    register_widget( 'newsletter_widget' );
}
add_action( 'widgets_init', 'newsletter_load_widget' );


?>



