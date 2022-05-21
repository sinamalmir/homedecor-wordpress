<!-- start main content-->
<section class="main-content mini-margin">

    <!-- start archive blog-->
    <section class="archive">
        <div class="container">
            <div class="row">
                <?php if (have_posts()){ ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <div class="col-md-6">
                            <?php get_template_part('template/single/card-content'); ?>

                        </div>

                    <?php endwhile; ?>
                <?php } ?>
            </div>

            <?php get_template_part('template/archive/pagination') ?>

        </div>
    </section>
    <!-- start archive blog-->

</section>
<!--end main content-->

