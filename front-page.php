<?php

/**
 * Template Name: Home
 * Header Area
 * */
get_header(); ?>


<main>
    <section id="hero-slider-box">
        <div class="hero-sliders">
            <!-- Prev Button -->
            <button class="owl-prev-btn slider-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                </svg>

            </button>
            <div id="owl-slider" class="owl-carousel owl-theme ">

                <?php
                $args = array(
                    'post_type' => 'carousel',
                    'post_per_page' => -1,
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
                $event_query = new WP_Query($args);
                if ($event_query->have_posts()) :
                ?>
                    <?php while ($event_query->have_posts()): $event_query->the_post(); ?>

                        <div class="hero-slider-item">
                            <?php the_post_thumbnail(); ?>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            </div>
            <!-- Next Button -->
            <button class="owl-next-btn slider-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>

            </button>
        </div>
        <div class="hero-info">
            <div class="hero-info-container max-w-full px-5 md:max-w-6xl mx-auto ">
                <div class="hero-info-details">
                    <div class="free-delivery info-item  flex items-end gap-3 ">
                        <div class="info-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/box.png'; ?>" alt="">
                        </div>
                        <div class="info-text">
                            <h3>Discount</h3>
                            <p>Every week new sales</p>
                        </div>
                    </div>
                    <div class="free-delivery info-item  flex items-end gap-3 ">
                        <div class="info-icon ">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/Vector.png'; ?>" alt="">
                        </div>
                        <div class="info-text">
                            <h3>Free Delivery</h3>
                            <p>100% Free for all orders</p>
                        </div>
                    </div>
                    <div class="support info-item flex items-end gap-3 ">
                        <div class="info-icon ">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/24-hours.png'; ?>" alt="">
                        </div>
                        <div class="info-text">
                            <h3>Great Support 24/7</h3>
                            <p>We care your experiences</p>
                        </div>
                    </div>
                    <div class="sequre-payment info-item flex items-end gap-3 ">
                        <div class="info-icon ">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/shield.png'; ?>" alt="">
                        </div>
                        <div class="info-text ">
                            <h3>Secure Payment</h3>
                            <p>100% Secure Payment Method</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- category slider -->
    <section class="category-slider-box">
        <div class="max-w-full px-5 md:max-w-7xl mx-auto">
            <div class="section-meta-box">
                <div class="section-title">
                    <h2>Category Items</h2>
                </div>
                <div class="front-page-category-slide-btn">
                    <button class="cat-prev-button">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                    </button>
                    <button class="cat-next-button slider-btn">
                        <i class="fa-solid fa-circle-arrow-right"></i>
                    </button>

                </div>
            </div>
        </div>
        <div class="max-w-full px-5 md:max-w-7xl mx-auto">
            <?php
            $categories = get_terms(array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
            ));
            ?>

            <?php if (!empty($categories) && !is_wp_error($categories)) :
                echo '<div class="product-categories">'; ?>

                <div id="category-slider" class="owl-carousel">
                    <?php
                    foreach ($categories as $category) : ?>

                        <?php  // Category image ID
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image_url    = wp_get_attachment_url($thumbnail_id);
                        ?>


                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="category-card">
                            <?php if ($image_url) : ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
                            <?php endif; ?>
                            <h3><?php echo esc_html($category->name); ?></h3>
                        </a>

                    <?php endforeach; ?>

                    <?php echo '</div>'; ?>
                <?php endif; ?>

                </div>
        </div>
    </section>


    <!-- featured products -->
    <section class="section-box featured-section">
        <div class="featured-product-box max-w-full px-5 md:max-w-7xl mx-auto ">
            <div class="section-meta-box">
                <div class="section-title">
                    <h2>Featured Products</h2>
                </div>
                <div class="front-page-view-all-btn">
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                        class="btn shop-btn">
                        <span>
                            View All Products
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M12 1.5a.75.75 0 0 1 .75.75V4.5a.75.75 0 0 1-1.5 0V2.25A.75.75 0 0 1 12 1.5ZM5.636 4.136a.75.75 0 0 1 1.06 0l1.592 1.591a.75.75 0 0 1-1.061 1.06l-1.591-1.59a.75.75 0 0 1 0-1.061Zm12.728 0a.75.75 0 0 1 0 1.06l-1.591 1.592a.75.75 0 0 1-1.06-1.061l1.59-1.591a.75.75 0 0 1 1.061 0Zm-6.816 4.496a.75.75 0 0 1 .82.311l5.228 7.917a.75.75 0 0 1-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 0 1-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 0 1-1.247-.606l.569-9.47a.75.75 0 0 1 .554-.68ZM3 10.5a.75.75 0 0 1 .75-.75H6a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 10.5Zm14.25 0a.75.75 0 0 1 .75-.75h2.25a.75.75 0 0 1 0 1.5H18a.75.75 0 0 1-.75-.75Zm-8.962 3.712a.75.75 0 0 1 0 1.061l-1.591 1.591a.75.75 0 1 1-1.061-1.06l1.591-1.592a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>




                        </span>

                    </a>

                </div>
            </div>
            <div class="featured-products front-page-products">
                <?php echo do_shortcode('[featured_products limit="4" columns="4"]');
                ?>
            </div>
        </div>
    </section>


    <!-- best selling products -->
    <section class="section-box">
        <div class="best-selling-product-box max-w-full px-5 md:max-w-7xl mx-auto ">
            <div class="section-meta-box">
                <div class="section-title">
                    <h2>Best Selling Products</h2>
                </div>
                <div class="front-page-view-all-btn">
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                        class="btn shop-btn">
                        <span>
                            View All Products
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M12 1.5a.75.75 0 0 1 .75.75V4.5a.75.75 0 0 1-1.5 0V2.25A.75.75 0 0 1 12 1.5ZM5.636 4.136a.75.75 0 0 1 1.06 0l1.592 1.591a.75.75 0 0 1-1.061 1.06l-1.591-1.59a.75.75 0 0 1 0-1.061Zm12.728 0a.75.75 0 0 1 0 1.06l-1.591 1.592a.75.75 0 0 1-1.06-1.061l1.59-1.591a.75.75 0 0 1 1.061 0Zm-6.816 4.496a.75.75 0 0 1 .82.311l5.228 7.917a.75.75 0 0 1-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 0 1-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 0 1-1.247-.606l.569-9.47a.75.75 0 0 1 .554-.68ZM3 10.5a.75.75 0 0 1 .75-.75H6a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 10.5Zm14.25 0a.75.75 0 0 1 .75-.75h2.25a.75.75 0 0 1 0 1.5H18a.75.75 0 0 1-.75-.75Zm-8.962 3.712a.75.75 0 0 1 0 1.061l-1.591 1.591a.75.75 0 1 1-1.061-1.06l1.591-1.592a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>




                        </span>

                    </a>

                </div>
            </div>
            <div class="sales-products front-page-products">
                <?php echo do_shortcode('[best_selling_products limit="4" columns="4"]');
                ?>
            </div>
        </div>
    </section>


    <!-- latest products -->
    <section class="section-box">
        <div class="latest-product-box max-w-full px-5 md:max-w-7xl mx-auto ">
            <div class="section-meta-box">
                <div class="section-title">
                    <h2>Latest Products</h2>
                </div>
                <div class="front-page-view-all-btn">
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                        class="btn shop-btn">
                        <span>
                            View All Products
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M12 1.5a.75.75 0 0 1 .75.75V4.5a.75.75 0 0 1-1.5 0V2.25A.75.75 0 0 1 12 1.5ZM5.636 4.136a.75.75 0 0 1 1.06 0l1.592 1.591a.75.75 0 0 1-1.061 1.06l-1.591-1.59a.75.75 0 0 1 0-1.061Zm12.728 0a.75.75 0 0 1 0 1.06l-1.591 1.592a.75.75 0 0 1-1.06-1.061l1.59-1.591a.75.75 0 0 1 1.061 0Zm-6.816 4.496a.75.75 0 0 1 .82.311l5.228 7.917a.75.75 0 0 1-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 0 1-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 0 1-1.247-.606l.569-9.47a.75.75 0 0 1 .554-.68ZM3 10.5a.75.75 0 0 1 .75-.75H6a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 10.5Zm14.25 0a.75.75 0 0 1 .75-.75h2.25a.75.75 0 0 1 0 1.5H18a.75.75 0 0 1-.75-.75Zm-8.962 3.712a.75.75 0 0 1 0 1.061l-1.591 1.591a.75.75 0 1 1-1.061-1.06l1.591-1.592a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>




                        </span>

                    </a>

                </div>
            </div>
            <div class="lastest-products front-page-products">
                <?php echo do_shortcode('[recent_products limit="4" columns="4"]');

                ?>
            </div>
        </div>
    </section>


    <!-- hot deal products -->
    <section class="section-box">
        <div class="sale-product-box max-w-full px-5 md:max-w-7xl mx-auto ">
            <div class="section-meta-box">
                <div class="section-title">
                    <h2>Hot Deal Products</h2>
                </div>
                <div class="front-page-view-all-btn">
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                        class="btn shop-btn">
                        <span>
                            View All Products
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M12 1.5a.75.75 0 0 1 .75.75V4.5a.75.75 0 0 1-1.5 0V2.25A.75.75 0 0 1 12 1.5ZM5.636 4.136a.75.75 0 0 1 1.06 0l1.592 1.591a.75.75 0 0 1-1.061 1.06l-1.591-1.59a.75.75 0 0 1 0-1.061Zm12.728 0a.75.75 0 0 1 0 1.06l-1.591 1.592a.75.75 0 0 1-1.06-1.061l1.59-1.591a.75.75 0 0 1 1.061 0Zm-6.816 4.496a.75.75 0 0 1 .82.311l5.228 7.917a.75.75 0 0 1-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 0 1-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 0 1-1.247-.606l.569-9.47a.75.75 0 0 1 .554-.68ZM3 10.5a.75.75 0 0 1 .75-.75H6a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 10.5Zm14.25 0a.75.75 0 0 1 .75-.75h2.25a.75.75 0 0 1 0 1.5H18a.75.75 0 0 1-.75-.75Zm-8.962 3.712a.75.75 0 0 1 0 1.061l-1.591 1.591a.75.75 0 1 1-1.061-1.06l1.591-1.592a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>




                        </span>

                    </a>

                </div>
            </div>
            <div class="sales-products front-page-products">
                <?php echo do_shortcode('[sale_products limit="4" columns="4"]'); ?>
            </div>
        </div>
    </section>


    <!-- blog post -->
    <section id="front-blog-post">
        <div class="max-w-full px-5 md:max-w-7xl mx-auto">
            <div class="section-meta-box">
                <div class="section-title">
                    <h2>Latest Post</h2>
                </div>
                <div class="front-page-view-all-btn">
                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
                        class="btn shop-btn">
                        <span>
                            View All Posts
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M12 1.5a.75.75 0 0 1 .75.75V4.5a.75.75 0 0 1-1.5 0V2.25A.75.75 0 0 1 12 1.5ZM5.636 4.136a.75.75 0 0 1 1.06 0l1.592 1.591a.75.75 0 0 1-1.061 1.06l-1.591-1.59a.75.75 0 0 1 0-1.061Zm12.728 0a.75.75 0 0 1 0 1.06l-1.591 1.592a.75.75 0 0 1-1.06-1.061l1.59-1.591a.75.75 0 0 1 1.061 0Zm-6.816 4.496a.75.75 0 0 1 .82.311l5.228 7.917a.75.75 0 0 1-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 0 1-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 0 1-1.247-.606l.569-9.47a.75.75 0 0 1 .554-.68ZM3 10.5a.75.75 0 0 1 .75-.75H6a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 10.5Zm14.25 0a.75.75 0 0 1 .75-.75h2.25a.75.75 0 0 1 0 1.5H18a.75.75 0 0 1-.75-.75Zm-8.962 3.712a.75.75 0 0 1 0 1.061l-1.591 1.591a.75.75 0 1 1-1.061-1.06l1.591-1.592a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>

                        </span>

                    </a>

                </div>
            </div>
            <div class="front-box-items">
                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                );

                $latest_posts = new WP_Query($args);

                if ($latest_posts->have_posts()) :
                    echo '<div class="latest-posts">';

                    while ($latest_posts->have_posts()) :
                        $latest_posts->the_post();
                ?>
                        <div class="post-card">
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="post-title">
                                <h2><a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a></h2>
                            </div>
                            <div class="excerpt-box"><?php the_excerpt(); ?></div>
                            <div class="excerpt-more-btn my-2 block">
                                <a class=" inline-block  px-4 py-2" href="<?php the_permalink(); ?>">
                                    <?php esc_html_e('Read More', 'silnytrust'); ?>
                                </a>
                            </div>
                        </div>
                <?php
                    endwhile;

                    echo '</div>';
                endif;

                wp_reset_postdata();
                ?>

            </div>
        </div>
    </section>

</main>


<?php
// footer
get_footer(); ?>