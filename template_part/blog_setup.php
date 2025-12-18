<div class="flex flex-wrap gap-5 justify-between lg:flex-none">
    <!-- blog post -->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <div class="blog-item flex flex-col max-h-full w-12/12 md:w-[48%] lg:w-full lg:max-h-52 lg:flex-row items-stretch gap-5 mb-5">
                <div class="blog-thumbnail w-full lg:w-5/12 h-52 lg:max-h-none relative">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                    <div class="post-date absolute top-0 left-0 p-3">
                        <div class="post-date-box py-2 px-3 flex flex-col items-center justify-center uppercase">
                            <div class="date-month font-semibold text-[13px] leading-0 pt-3 pb-3">
                                <?php echo get_the_date('j M'); ?>
                            </div>
                            <div class="date-year font-semibold text-4 leading-0 pt-2 pb-3">
                                <?php echo get_the_date('Y'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="post-author absolute bottom-0 right-0 m-2 px-2 py-1 flex gap-1 items-center">
                        <i class="fa-solid fa-user-pen dark-text"></i>
                        <?php echo get_the_author_posts_link(); ?>
                    </div>
                </div>
                <div class=" w-full md:w-7/12 px-5 md:px-none pb-3 md:py-3 md:pr-3">
                    <div class="post-title">
                        <h2 class="font-semibold text-[22px] md:text-[24px]">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                    </div>
                    <div class="excerpt-box"><?php the_excerpt(); ?></div>
                    <div class="excerpt-more-btn my-2 block">
                        <a class=" inline-block  px-4 py-2" href="<?php the_permalink(); ?>">
                            <?php esc_html_e('Read More', 'silnytrust'); ?>
                        </a>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
    <?php else: ?>
        <p><?php esc_html_e('No Post Found !!!', 'silnytrsut'); ?></p>
    <?php endif; ?>
</div>