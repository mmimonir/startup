<?php

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Startup
 */
if (post_password_required())
    return;
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <div class="section-title section-title-sm position-relative pb-3 mb-4">
            <h3 class="mb-0"><?php
                                printf(
                                    _nx('One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'startup'),
                                    number_format_i18n(get_comments_number()),
                                    '<span>' . get_the_title() . '</span>'
                                );
                                ?></h3>
        </div>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'li',
                'short_ping'  => true,
                'avatar_size' => 74,
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
        ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'startup'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'startup')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'startup')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation 
        ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'startup'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() 
    ?>

</div><!-- #comments -->