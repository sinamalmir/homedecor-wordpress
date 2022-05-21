<?php /* Template Name: With Sidebar */

get_header();

get_template_part('template/single/single-breadcrumb');

while (have_posts()) : the_post();
    ?>

    <section class="main-content">
        <!--  start single blog-->
        <section class="single-blog mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <?php the_content(); ?>
                    </div>

                    <?php get_sidebar(); ?>

                </div>
            </div>
        </section>
        <!--  end single blog-->
    </section>


<?php

endwhile;
get_footer();

?>
