<?php
// This template use for single post
// with header
get_header(); ?>

<!-- ===================================
    Main Area Start
=====================================-->
<main>
    <?php if (have_posts()): ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $post_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
            <section id="page-title" class="w-full h-40 page-title relative" style="background-image: url('<?php echo esc_url($post_thumbnail);  ?>'); background-position:center; background-size:cover; background-repeat:no-repeat;">
                <div class="page-title-container flex items-center justify-center w-full h-full white-text">
                    <div class="flex flex-col items-center justify-center gap-4">
                        <!-- Page Title -->
                        <div>
                            <h1 class="capitalize text-[20px] sm:text-2xl md:text-3xl white-text-color font-semibold text-center">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <!-- Post meta -->
                        <div class="post-meta">
                            <p class=" flex items-center justify-center gap-0 flex-col">
                                <span>
                                    <span class="post-author uppercase white-text">
                                        <?php the_author_posts_link(); ?>
                                    </span>
                                </span>
                                <span class="post-date uppercase white-text">
                                    <?php echo get_the_date('j F Y'); ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="post-area">
                <div class="wrapper max-w-full md:max-w-6xl px-4 mx-auto py-3 flex gap-5 my-8">
                    <div class="content-area">
                        <?php get_template_part('template_part/post_setup') ?>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?>

    <section id="comments-area">
        <div class="comments-wrapper max-w-full md:max-w-6xl px-4 mx-auto py-3 flex gap-5">
            <div class="comments-content w-full md:w-9/12 mx-auto">
                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
            </div>
        </div>
    </section>
</main>


<!-- ===================================
    Main Area End
=====================================-->

<?php
// Footer 
get_footer(); ?>