<?php
//for address
define('HD_TDU', get_template_directory_uri());

require get_template_directory() . '/inc/functions/comments-temp.php';
require get_template_directory() . '/inc/widgets/widget-recent-post.php';
require get_template_directory() . '/inc/widgets/banner-widget.php';
require get_template_directory() . '/inc/widgets/widget-contact-footer.php';
require get_template_directory() . '/inc/widgets/widget-social.php';
require get_template_directory() . '/inc/widgets/widget-newsletter.php';


//theme setup
function homedecor_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('blog_sidebar',100,100,true);
    add_theme_support('widgets');
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

//  with this function You have the ability to add a menu for wordpress
    register_nav_menus(
        array(
            'main_menu' => __('Main Menu'),
            'mobile_menu' => __('Mobile Menu')
        ));

    register_sidebar(
      array(
          'name' => 'blog sidebar (just for our theme) ',
          'id' => 'blog_sidebar',
          'before_widget'=> '<div class="widget">',
          'after_widget'=> '</div>',
          'before_title'=> '<h5 class="widget-title">',
          'after_title'=> '</h5>'
      ));
    register_sidebar(
        array(
            'name' => 'footer one',
            'id' => 'footer_sidebar_one',
            'before_widget'=> '<div class="widget">',
            'after_widget'=> '</div>',
            'before_title'=> '<h6 class="widget-title">',
            'after_title'=> '</h6>'
        ));
    register_sidebar(
        array(
            'name' => 'footer two',
            'id' => 'footer_sidebar_two',
            'before_widget'=> '<div class="widget">',
            'after_widget'=> '</div>',
            'before_title'=> '<h6 class="widget-title">',
            'after_title'=> '</h6>'
        ));
    register_sidebar(
        array(
            'name' => 'footer three',
            'id' => 'footer_sidebar_three',
            'before_widget'=> '<div class="widget">',
            'after_widget'=> '</div>',
            'before_title'=> '<h6 class="widget-title">',
            'after_title'=> '</h6>'
        ));


}

add_action('after_setup_theme', 'homedecor_setup');

//theme style and script
function homedecor_script()
{

    wp_enqueue_style('bootstrap-min', HD_TDU . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('owl-carousel', HD_TDU . '/assets/owlcarousel/owl.carousel.min.css');
    wp_enqueue_style('owl-theme-default', HD_TDU . '/assets/owlcarousel/owl.theme.default.min.css"');
    wp_enqueue_style('homedecor-style', HD_TDU . '/assets/css/style.css');
    wp_enqueue_style('homedecor-responsive', HD_TDU . '/assets/css/responsive.css');

    wp_enqueue_script('owl-carousel', HD_TDU . '/assets/owlcarousel/owl.carousel.min.js', array('jquery'), '1', true);
    wp_enqueue_script('popper', HD_TDU . '/assets/js/popper.min.js', array('jquery'), '1', true);
    wp_enqueue_script('bootstrap', HD_TDU . '/assets/js/bootstrap.min.js', array('jquery'), '1', true);
    wp_enqueue_script('countdown', HD_TDU . '/assets/js/jquery.countdown.min.js', array('jquery'), '1', true);
    wp_enqueue_script('main', HD_TDU . '/assets/js/main.js', array('jquery'), '1', true);

}

add_action('wp_enqueue_scripts', 'homedecor_script');

//get Menu id
function get_menu_id($location)
{
    $locations = get_nav_menu_locations();
    $menu_id = $locations[$location];
    return !empty($menu_id) ? $menu_id : '';
}

//Get child Menu
function get_child_menu_items($menu_array, $parent_id)
{
    $child_menus = [];
    if (!empty($menu_array) && is_array($menu_array)) {
        foreach ($menu_array as $menu) {
            if (intval($menu->menu_item_parent) === $parent_id) {
                array_push($child_menus, $menu);
            }
        }
    }
    return $child_menus;
}

//get menu class
function get_class_menu($menu_item)
{
    $menu_classes = $menu_item->classes;
    $class_name = '';
    if (!empty($menu_classes) && is_array($menu_classes)) {
        for ($i = 0; $i < count($menu_classes); $i++) {
            $class_name .= esc_html($menu_classes[$i]);
        }
        return $class_name;
    }
}


//wordpress count comment number
function show_count_comments($post_id)
{
    $comments = get_comments_number($post_id);
    if ($comments > 0) {
        return $comments . '  ' . "Comments";
    } else {
        return "No Comment";
    }
}


//custom Excerpt
function excerpt($limit, $more = ' ... ')
{
    $excerpt = explode(' ',get_the_excerpt() , $limit);

//    var_dump($excerpt);

    if (count($excerpt) >= $limit){
        array_pop($excerpt);
        $excerpt = implode( ' ', $excerpt) . " ". $more;
    }
    else{
        $excerpt = implode( ' ', $excerpt) . " ". $more;
    }
    $excerpt = preg_replace('[]' , '', $excerpt);

    return $excerpt;
}



remove_action('set_comment_cookies', 'wp_set_comment_cookies');

//woocommerce

remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper');
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end');

add_action('woocommerce_before_main_content','HD_Theme_wrapper_start');
add_action('woocommerce_before_main_content','HD_Theme_breadcrumb');
add_action('woocommerce_after_main_content','HD_Theme_wrapper_end');

function HD_Theme_wrapper_start(){
    echo '<section class="main-content">';
}
function HD_Theme_wrapper_end(){
    echo '</section>';
}
function HD_Theme_breadcrumb(){
    return get_template_part('template/single/single-breadcrumb');
}


function woo_average_rate($get_average_rate){
    $average_rate = ($get_average_rate * 20 ).'%' ;
    return $average_rate;
}













