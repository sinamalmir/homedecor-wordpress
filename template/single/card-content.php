<div class="card blog-box border-rad-1 overflow-hidden">
    <a href="<?php the_permalink(); ?>" class="blog-box-link">
        <?php the_post_thumbnail(); ?>
    </a>
    <div class="card-body">
        <a href="<?php the_permalink(); ?>" class="blog-box-link">
            <h3 class="card-title fs-5 fw-bold txt-color-2 anis-transition mb-3">
                <?php the_title(); ?>
            </h3>
        </a>

        <?php get_template_part('template/single/blog-meta'); ?>

        <p class="card-text fs-7 txt-color-2 mt-3">
            <?php echo excerpt(25 ,'....');?>
        </p>
    </div>
</div>