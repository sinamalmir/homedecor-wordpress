
<!-- blog slider-->
<section class="weblog section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="title-s1 text-center mb-5">
                    <h3 class="fw-bolder"> blog </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme blog-carousel">

                    <?php
                    // Define our WP Query Parameters
                    $query_options = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'orderby' => 'publish_date',
                        'order' => 'DESC',
                        'posts_per_page' => 10,
                    );
                    $the_query = new WP_Query( $query_options );

                    while ($the_query -> have_posts()) : $the_query -> the_post(); ?>


                        <div class="item">
                          <?php get_template_part('template/single/card-content'); ?>
                        </div>




                    <?php endwhile; wp_reset_postdata();  ?>




                </div>
            </div>
        </div>
    </div>
</section>
<!-- end blog slider -->
