
<!-- product box-->
<section class="product section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="title-s1 text-center mb-5">
                    <h3 class="fw-bolder"> trending </h3>
                </div>
            </div>
        </div>
        <div class="row">

            <?php

            $args= array(
                    'post_type'=>'product',
                    'posts_per_page'=>8,
                    'orderby'=>'date'
            );
            $loop = New WP_Query($args);

            while ($loop -> have_posts()) : $loop -> the_post(); global $product;
            ?>

            <div class="col-lg-4 col-xl-3 col-md-4 col-sm-6 ">
              <?php get_template_part('template/product/product-box') ?>
            </div>

            <?php endwhile; wp_reset_postdata(); ?>

        </div>
    </div>
</section>
<!-- end product box-->
