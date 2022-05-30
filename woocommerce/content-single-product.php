<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <section class="pro-gallery mini-margin">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">

                    <?php
                    /**
                     * Hook: woocommerce_before_single_product_summary.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action('woocommerce_before_single_product_summary');

                    ?>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="pro-meta-info">

                        <?php the_title('<h2 class="pro-meta-title">', '</h2>') ?>

                        <?php woocommerce_template_single_excerpt(); ?>

                        <ul class="list-none pro-meta">
                            <?php if ($product->get_sku()) : ?>
                                <li>
                                    <span class="fw-normal"> SKU:  </span>
                                    <span class="float-end"> <?php echo $product->get_sku(); ?> </span>
                                </li>
                            <?php endif; ?>
                            <li>
                                <span class="fw-normal"> CATEGORY:  </span>
                                <span class="float-end">
                                    <?php the_terms(get_the_ID(), 'product_cat', '', ', ') ?>
                                </span>
                            </li>
                            <li>
                                <span class="fw-normal"> TAGS:  </span>
                                <span class="float-end pro-tags">
                                   <?php the_terms(get_the_ID(), 'product_tag', '', ' ') ?>
                                </span>
                            </li>

                            <li>
                                <span class="fw-normal"> SOCIAL:  </span>
                                <span class="float-end">
                                    <?php get_template_part('template/product/social-share') ?>
                                </span>
                            </li>

                        </ul>

                    </div>

                    <?php get_template_part('template/product/service-box') ?>

                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     *
                     * do_action('woocommerce_single_product_summary');
                     * */
                    ?>
                </div>

                <div class="col-xl-4 col-md-12 ">

                    <div class="product-str">
                        <div class="pro-star d-flex justify-content-end">
                            <div class="rating-star">
                                <div class="rate"
                                     style="width: <?= woo_average_rate($product->get_average_rating()); ?>"></div>
                            </div>
                            <div class="rating-num ms-3"> (<?php echo $product->get_rating_count(); ?>)</div>
                        </div>
                    </div>


                    <div class="pro-price-sec justify-content-center text-center">

                        <div class="pro-main-price">
                            <?php woocommerce_template_single_price(); ?>
                        </div>

                        <div class="add-to-cart mt-5">
                            <?php woocommerce_template_single_add_to_cart(); ?>
                        </div>

                    </div>

                </div>
                <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action('woocommerce_after_single_product_summary');
                ?>
            </div>
        </div>
    </section>

<!--    product tab  -->
    <section class="pro-det mb-5">
        <div class="container">
            <div class="row">
                <div class="product-detail">


                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">
                                <i class="far fa-comment-alt-edit"></i>
                                description
                            </button>

                            <?php
                            if ($product && ($product->has_attributes() || apply_filters('wc_product_enable_dimensions_display' , $product->has_weight() || $product->has_dimensions() ) )){ ?>

                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">
                                <i class="fas fa-info"></i>
                                additional information
                            </button>

                            <?php } ?>


                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">
                                <i class="far fa-comment-alt"></i>
                                reviews
                            </button>

                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">

                            <div class="pro-text">
                                <div class="pro-detail-title">
                                    <h3 class="fs-3 mb-3"> product description </h3>
                                </div>
                                <?php the_content(); ?>

                            </div>

                        </div>

                        <?php
                        if ($product && ($product->has_attributes() || apply_filters('wc_product_enable_dimensions_display' , $product->has_weight() || $product->has_dimensions() ) )){ ?>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                <div class="product-detail-tables">

                                    <div class="pro-detail-title">
                                        <h3 class="fs-3 mb-3"> additional information</h3>
                                    </div>

                                    <?php wc_get_template('single-product/tabs/additional-information.php'); ?>

                                </div>
                            </div>

                       <?php } ?>



                        <div class="tab-pane fade " id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                            <div class="product-comment">

                                <div class="pro-detail-title">
                                    <h3 class="fs-3 mb-3"> Comments </h3>
                                </div>
                                <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }
                                ?>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!--    related post -->
    <section>
        <div class="container">
            <div class="row">
                <?php woocommerce_output_related_products(); ?>
            </div>
        </div>
    </section>

</div>

<?php do_action('woocommerce_after_single_product'); ?>
