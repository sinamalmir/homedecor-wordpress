
<!-- product slider -->
<section class="pro-slid section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="title-s1 text-center mb-5">
                    <h3 class="fw-bolder"> Popular </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-slider">
                <div class="col-md-12">

                    <div id="owl-demo" class="owl-carousel owl-theme product-carousel">

                        <?php

                        $args= array(
                            'post_type'=>'product',
                            'posts_per_page'=>8,
                            'orderby'=>'date',
                            'meta_query'     => array(
                                array(
                                    'key'           => '_sale_price',
                                    'value'         => 0,
                                    'compare'       => '>',
                                    'type'          => 'numeric'
                                )
                            )
                        );
                        $loop = New WP_Query($args);

                        while ($loop -> have_posts()) : $loop -> the_post(); global $product;
                            ?>

                            <div class="item">
                                <?php get_template_part('template/product/product-box') ?>
                            </div>

                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end product slider -->
