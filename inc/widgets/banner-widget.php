
<?php

// Creating the widget
class banner_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'banner_widget',

// Widget name will appear in UI
            __('banner(for this theme)', 'wpb_widget_domain'),

// Widget description
            array( 'description' => __( 'banner in sidebar (just for this theme)', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $discount =  $instance['discount'];
        $text_button =  $instance['text_button'];
        $link_button =  $instance['link_button'];
        $image_uri = $instance['image_uri'];

// before and after widget arguments are defined by themes
        echo $args['before_widget']; ?>

        <div class="shop-banner">
            <div class="banner-img">
                <a href="#"> <img src="<?php echo $image_uri; ?>" alt=""> </a>
            </div>

            <div class="shop-banner-content text-white">
                <h5 class="shop-banner-content-title"> <?php echo  $title?> </h5>
                <h3 class="shop-banner-content-subtitle"> <?php echo  $discount ;?> </h3>
                <a href="<?php echo  $link_button ;?>" class="btn btn-white"> <?php echo  $text_button; ?> </a>
            </div>
        </div>

        <?php echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {


        $title = !empty($instance[ 'title' ] ) ? $instance[ 'title' ] : 'enter the title ';
        $discount = !empty($instance[ 'discount' ] ) ? $instance[ 'discount' ] : 'How much offer ';
        $text_button = !empty($instance[ 'text_button' ] ) ? $instance[ 'text_button' ] : 'shop now';
        $link_button = !empty($instance[ 'link_button' ] ) ? $instance[ 'link_button' ] : 'Link';
        $image_uri = !empty($instance[ 'image_uri' ] ) ? $instance[ 'image_uri' ] : '';

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"> image </label><br />
            <img class="custom_media_image" src="<?php echo $image_uri; ?>" style="margin-bottom:15px;padding:0;max-width:100%;" />
            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>">
            <input type="button" value="<?php _e( 'choose image' ); ?>" class="button custom_media_upload" id="custom_image_uploader"/>
        </p>

        <p> standard size must be 255*350 </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"> Title : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'discount' ); ?>"> How much offer : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'discount' ); ?>" name="<?php echo $this->get_field_name( 'discount' ); ?>" type="text" value="<?php echo esc_attr( $discount ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'text_button' ); ?>"> title for button : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_button' ); ?>" name="<?php echo $this->get_field_name( 'text_button' ); ?>" type="text" value="<?php echo esc_attr( $text_button ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'link_button' ); ?>"> link: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_button' ); ?>" name="<?php echo $this->get_field_name( 'link_button' ); ?>" type="text" value="<?php echo esc_attr( $link_button ); ?>" />
        </p>

        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['discount'] = ( ! empty( $new_instance['discount'] ) ) ? strip_tags( $new_instance['discount'] ) : '';
        $instance['text_button'] = ( ! empty( $new_instance['text_button'] ) ) ? strip_tags( $new_instance['text_button'] ) : '';
        $instance['link_button'] = ( ! empty( $new_instance['link_button'] ) ) ? strip_tags( $new_instance['link_button'] ) : '';
        $instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';

        return $instance;
    }

// Class wpb_widget ends here
}


// Register and load the widget
function banner_load_widget() {
    register_widget( 'banner_widget' );
}
add_action( 'widgets_init', 'banner_load_widget' );


function banner_script(){
    wp_enqueue_media();
    wp_enqueue_script('banner_script', HD_TDU . '/assets/js/admin.js');
}
add_action('admin_enqueue_scripts', 'banner_script');


?>