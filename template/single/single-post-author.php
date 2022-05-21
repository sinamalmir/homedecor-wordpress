<div class="post-author card">
    <div class="card-body">
        <div class="author-img">
            <?php echo get_avatar(get_the_author_meta('ID'));?>
        </div>
        <div class="author-info">
            <h6 class="mt-1 author-name">
                <a href="#" class="d-inline-block mb-1">
                    <?php echo get_the_author_meta('display_name'); ?>
                </a>
            </h6>
            <p>
                <?php echo get_the_author_meta('description'); ?>
            </p>
        </div>
    </div>
</div>