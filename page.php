<?php /* Template Name: Full width */

get_header();

get_template_part('template/single/single-breadcrumb');

while (have_posts()) : the_post();
?>

<section class="main-content">
    <!--  start single blog-->
    <section class="single-blog mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    <!--  end single blog-->
</section>


<?php

endwhile;
get_footer();

?>
