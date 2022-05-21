
<div class="single-post">
    <h2 class="blog-title"> <?php the_title(); ?> </h2>
   <?php get_template_part("template/single/blog-meta"); ?>

    <div class="blog-img">
        <?php the_post_thumbnail(); ?>
    </div>


    <div class="blog-content">
        <div class="blog-info">
            <?php the_content(); ?>
        </div>

        <?php get_template_part('template/single/blog-post-footer'); ?>

    </div>

</div>