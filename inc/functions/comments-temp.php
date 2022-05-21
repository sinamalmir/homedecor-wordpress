
<?php
if( ! function_exists( 'better_comments' ) ):
    function better_comments($comment, $args, $depth) {
        ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">


            <div class="comment-img">
                <?php echo get_avatar($comment,$size='60'); ?>
            </div>

            <div class="comment-block">

                <p class="customer-meta">
                    <span class="review-author"> <?php echo get_comment_author() ?></span>
                    <span class="comment-date"> <?php printf(esc_html__('%1$s at %2$s'  ), get_comment_date(),  get_comment_time()) ?> </span>

                    <span class="reply">
                        <a href="#">
                            <i class="fa fa-reply"></i>
                            <?php comment_reply_link(array_merge($args,
                                array('depth' => $depth,
                                    'max_depth' => $args['max_depth']
                                ))) ?></a>
                    </span>

                </p>

                <div class="description">
                    <p>
                        <?php comment_text() ?>
                    </p>
                </div>


                <div class="comment-arrow"></div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php esc_html_e('Your comment is awaiting moderation.') ?></em>
                    <br />
                <?php endif; ?>

            </div>


        <?php
    }
endif;
