
<?php

// Creating the widget
class contact_footer_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'contact_footer_widget',

// Widget name will appear in UI
            __('contact information(for this theme)', 'wpb_widget_domain'),

// Widget description
            array( 'description' => __( 'Contact information in footer(just for this theme)', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $address =  $instance['address'];
        $email =  $instance['email'];
        $tel =  $instance['tel'];

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];  ?>

        <ul class="contact-info list-none">
            <li>
                <i class="fas fa-map-marker-alt"></i>
                <span><?= $address ?></span>
            </li>
            <li>
                <a href="#">
                    <i class="far fa-envelope"></i>
                    <span><?= $email ?></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-phone-alt"></i>
                    <span><?= $tel ?></span>
                </a>
            </li>
        </ul>

        <?php echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {


        $title = !empty($instance[ 'title' ] ) ? $instance[ 'title' ] : 'enter the title ';
        $address = !empty($instance[ 'address' ] ) ? $instance[ 'address' ] : 'Your address ';
        $email = !empty($instance[ 'email' ] ) ? $instance[ 'email' ] : 'Your email ';
        $tel = !empty($instance[ 'tel' ] ) ? $instance[ 'tel' ] : 'Your Phone number ';

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"> Title : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'address' ); ?>">address: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>">email: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'tel' ); ?>">tel: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'tel' ); ?>" name="<?php echo $this->get_field_name( 'tel' ); ?>" type="text" value="<?php echo esc_attr( $tel ); ?>" />
        </p>



        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
        $instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
        $instance['tel'] = ( ! empty( $new_instance['tel'] ) ) ? strip_tags( $new_instance['tel'] ) : '';

        return $instance;
    }

// Class wpb_widget ends here
}


// Register and load the widget
function contact_footer_load_widget() {
    register_widget( 'contact_footer_widget' );
}
add_action( 'widgets_init', 'contact_footer_load_widget' );


?>