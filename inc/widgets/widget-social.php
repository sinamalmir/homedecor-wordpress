
<?php

// Creating the widget
class social_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'social_widget',

// Widget name will appear in UI
            __('Social media widget(for this theme)', 'wpb_widget_domain'),

// Widget description
            array( 'description' => __( 'social media icons(just for this theme)', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $facebook =  $instance['facebook'];
        $instagram =  $instance['instagram'];
        $telegram =  $instance['telegram'];
        $twitter =  $instance['twitter'];
        $pinterest =  $instance['pinterest'];

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        ?>

        <ul class="footer-icon social-icons d-flex list-none">
            <li>
                <a href="<?= $facebook ?>">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
            <li>
                <a href="<?= $instagram?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="<?= $twitter?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="<?= $telegram?>">
                    <i class="fab fa-telegram"></i>
                </a>
            </li>
            <li>
                <a href="<?= $pinterest ?>">
                    <i class="fab fa-pinterest-square"></i>
                </a>
            </li>
        </ul>


        <?php
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {


        $title = !empty($instance[ 'title' ] ) ? $instance[ 'title' ] : 'enter the title ';
        $facebook = !empty($instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '';
        $instagram = !empty($instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '';
        $telegram = !empty($instance[ 'telegram' ] ) ? $instance[ 'telegram' ] : '';
        $twitter = !empty($instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
        $pinterest = !empty($instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '';

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"> Title : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>">facebook: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>">instagram: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'telegram' ); ?>">telegram: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'telegram' ); ?>" name="<?php echo $this->get_field_name( 'telegram' ); ?>" type="text" value="<?php echo esc_attr( $telegram ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>">twitter: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">pinterest: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
        </p>


        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
        $instance['telegram'] = ( ! empty( $new_instance['telegram'] ) ) ? strip_tags( $new_instance['telegram'] ) : '';
        $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
        $instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';

        return $instance;
    }

// Class wpb_widget ends here
}




// Register and load the widget
function social_load_widget() {
    register_widget( 'social_widget' );
}
add_action( 'widgets_init', 'social_load_widget' );


?>