<?php
get_header();
get_template_part("template/single/single-breadcrumb");

while (have_posts()) : the_post(); ?>


    <!-- start main content-->
    <section class="main-content">
    <!--  start single blog-->

    <section class="single-blog mt-5">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-lg-9">
            <?php
            get_template_part("template/single/single-main-content");
            get_template_part("template/single/single-blog-navigation");
            get_template_part("template/single/single-post-author");
            get_template_part("template/single/single-related-post");
            get_template_part("template/single/single-comment-area");
            ?>
        </div>

    <?php endwhile; ?>
    <?php get_sidebar(); ?>
        </div>

    </div>
    </section>
    <!--  end single blog-->

    </section>
    <!--end main content-->


<?php get_footer(); ?>