<?php

/**
 * Comments template
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <div class="comments-box">
        <div>
            <h2>Write Your Comments</h2>
        </div>
        <?php comment_form(); ?>
    </div>
    <div class="comments-item bg-white-color p-4 my-5 rounded">
        <?php if (have_comments()) : ?>
            <h2 class="comments-title text-gray-color text-xl my-4 font-semibold">
                <?php
                printf(
                    _nx('One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'silnytrust'),
                    number_format_i18n(get_comments_number())
                );
                ?>
            </h2>

            <ol class="comment-list">
                <?php
                wp_list_comments(array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 30,
                    'format'     => 'html5',
                ));
                ?>
            </ol>

            <?php the_comments_navigation(); ?>
        <?php endif; ?>

        <?php if (! comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'silnytrust'); ?></p>
        <?php endif; ?>

    </div>

</div>