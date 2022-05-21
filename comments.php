<?php

if (post_password_required())
    return;
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h4 class="comments-title">
            <?php
            printf(_nx('One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'twentythirteen'),
                number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
            ?>
        </h4>

        <ul class="comment-list comments list-none mt-4">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'callback' => 'better_comments'
            ));
            ?>
        </ul><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'twentythirteen'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'twentythirteen')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'twentythirteen')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'twentythirteen'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $args = [];
    $args = wp_parse_args($args);
    if (!isset($args['format'])) {
        $args['format'] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
    }

    $req = get_option('require_name_email');
    $html5 = 'html5' === $args['format'];

    // Define attributes in HTML5 or XHTML syntax.
    $required_attribute = ($html5 ? ' required' : ' required="required"');
    $checked_attribute = ($html5 ? ' checked' : ' checked="checked"');

    // Identify required fields visually.
    $required_indicator = ' <span class="required" aria-hidden="true">*</span>';

    $fields = array(
        'author' => sprintf(
            '<div class="form-group col-md-5">%s</div>',

            sprintf(
                '<input id="author" name="author"  class="form-control" placeholder="Your name..." type="text" value="%s" size="30" maxlength="245"%s />',
                esc_attr($commenter['comment_author']),
                ($req ? $required_attribute : '')
            )
        ),
        'email' => sprintf(
            '<div class="form-group col-md-5">%s</div>',

            sprintf(
                '<input id="email" name="email" %s  class="form-control" placeholder="Your email..." value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
                ($html5 ? 'type="email"' : 'type="text"'),
                esc_attr($commenter['comment_author_email']),
                ($req ? $required_attribute : '')
            )
        )

    );

    $comment_form = array(

        'title_reply' => 'you can take a comment this here ',

        'class_form' => 'row mt-3',

        'comment_field' => '      <div class="form-group col-12">
            <textarea placeholder="Comment" class="form-control" name="comment" id="comment" rows="8"></textarea>
        </div>',

        'submit_button' => '    <div class="form-group col-md-2">
            <button type="submit" id="%2$s"  class="btn btn-danger w-100 %3$s" value="%4$s"> submit</button>
        </div>',


        'fields' => $fields
    );

    ?>


    <?php comment_form($comment_form); ?>

</div><!-- #comments -->

