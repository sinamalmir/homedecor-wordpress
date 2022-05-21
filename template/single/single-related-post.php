<div class="related-post mb-5 mt-3 ">
    <div class="related-post-title mb-5">
        <h5 class="mb-4"> related post </h5>
    </div>
    <div class="row">

        <?php

        $related = get_posts(array(
            'category__in' => wp_get_post_categories($post->ID),
            'numberposts' => 2,
            'post__not_in' => array($post->ID)
        ));


        if ($related) foreach ($related as $post) {
            setup_postdata($post); ?>

            <div class="col-md-6 mb-4">
                <?php get_template_part('template/single/card-content'); ?>
            </div>

        <?php }
        wp_reset_postdata();

        ?>

    </div>
</div>