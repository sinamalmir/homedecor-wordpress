
<?php

// Creating the widget
class recent_post_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'recent_post_widget',

// Widget name will appear in UI
            __('New post(for this theme)', 'wpb_widget_domain'),

// Widget description
            array( 'description' => __( 'New post widget(just for this theme)', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $blog_num =  $instance['blog_num'];
        $set_date =  $instance['set_date'];

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        ?>

        <ul class="list-none widget-recent-post">

        <?php
        // Define our WP Query Parameters
        $query_options = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'publish_date',
            'order' => 'DESC',
            'posts_per_page' => $blog_num,
        );
        $the_query = new WP_Query( $query_options );
        while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

            <li>
                <div class="recent-post-main">
                    <div class="post-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('blog_sidebar'); ?>
                        </a>
                    </div>
                    <div class="post-content">
                        <h6>
                            <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                        </h6>
                        <?php if ($set_date){ ?>
                        <p class="small m-0"> <?php echo get_the_date(); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </li>


        <?php endwhile; wp_reset_postdata();  ?>

        </ul>

        <?php
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {


        $title = !empty($instance[ 'title' ] ) ? $instance[ 'title' ] : 'enter the title ';
        $blog_num = !empty($instance[ 'blog_num' ] ) ? $instance[ 'blog_num' ] : 'How much post u want to show ';
        $set_date = !empty($instance[ 'set_date' ] ) ? $instance[ 'set_date' ] : '0';

// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"> Title : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'blog_num' ); ?>"> How much show : </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'blog_num' ); ?>" name="<?php echo $this->get_field_name( 'blog_num' ); ?>" type="text" value="<?php echo esc_attr( $blog_num ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'set_date' ); ?>"> show date publish : </label>
            <input class="widefat" <?php if ($set_date) { echo "checked";} ?>  id="<?php echo $this->get_field_id( 'set_date' ); ?>" name="<?php echo $this->get_field_name( 'set_date' ); ?>"  type="checkbox" value="1" />
        </p>

        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['blog_num'] = ( ! empty( $new_instance['blog_num'] ) ) ? strip_tags( $new_instance['blog_num'] ) : '';
        $instance['set_date'] = ( ! empty( $new_instance['set_date'] ) ) ? strip_tags( $new_instance['set_date'] ) : '';

        return $instance;
    }

// Class wpb_widget ends here
}


// Register and load the widget
function recent_post_load_widget() {
    register_widget( 'recent_post_widget' );
}
add_action( 'widgets_init', 'recent_post_load_widget' );


?>