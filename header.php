<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">

<head>
    <meta charset="<?php get_bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Header Area start -->
    <header id="header">
        <section class="header-top pt-2 ">
            <div class="header-top-container max-w-full px-5 md:max-w-7xl mx-auto flex items-center justify-between">
                <div class="top-contact flex flex-row items-center gap-3">
                    <span class="border border-gray-300 rounded-full w-10 h-10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>

                    </span>
                    <span class="primary-font flex flex-col">
                        <span class="text-[16px] leading-5">Hotline:</span>
                        <span class="hotline-text primary-font text-[20px] leading-5 font-semibold">
                            <span>+880 <?php echo get_theme_mod('silnytrust_hotline_setting'); ?> </span>
                        </span>
                    </span>
                </div>
                <div class="top-menu">
                    <?php
                    if (has_nav_menu('top-menu')) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'top-menu',
                                'menu_id'        => 'header-top-menu',
                                'fallback_cb'    => false,
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="header-area  relative pt-3 pb-5">
            <div class="header-container max-w-full px-5 md:max-w-7xl mx-auto flex items-center justify-between">
                <!-- header logo -->
                <div class="header-logo">
                    <div class="w-40">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/silnytrust-logo.png'); ?>"
                                alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- header menu -->
                <div class="header-menu">
                    <?php
                    if (has_nav_menu('header-menu')) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header-menu',
                                'menu_id'        => 'primary-menu',
                                'fallback_cb'    => false,
                            )
                        );
                    }
                    ?>
                </div>
                <div class="flex justify-between gap-5 items-center">
                    <!-- header product search -->
                    <div id="header-search-btn" class="header-product-search">
                        <div class=" ">
                            <div class="search-btn cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- header mini cart area -->
                    <div class="header-mini-cart">
                        <div>
                            <div class="mini-cart-calculate">
                                <span id="mini-cart-after-ajax" class="cursor-pointer flex mini-cart-icon">
                                    <span class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span
                                            class="cart-count mini-cart-count absolute -top-2 right-1 primary-color-bg w-4.5 h-4.5 flex items-center justify-center rounded-full text-[13px] font-semibold text-white">
                                            <?php echo WC()->cart->get_cart_contents_count(); ?>
                                        </span>
                                    </span>
                                    <span class="mini-cart-total">
                                        <?php echo WC()->cart->get_cart_total(); ?>
                                    </span>
                                </span>
                            </div>
                            <div id="mini-cart-main" class="mini-cart">
                                <?php woocommerce_mini_cart(); ?>

                            </div>
                        </div>
                    </div>
                    <!-- mobile dropdown menu button -->
                    <div id="mobile-menu-open-close" class="mobile-menu-button md:hidden block">
                        <div class="open-btn cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>

                        </div>
                        <div class="close-btn hidden cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </header>
    <!-- Header Area end-->

    <!-- Search Area start-->
    <section id="header-search-area" class="header-search-form">
        <div class="search-container ">
            <div class="search-box">
                <form class="wc-ajax-search">
                    <div class="search-field">
                        <input type="text" id="wc-ajax-search-input" placeholder="Search products..."
                            autocomplete="off" />
                        <span><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                    <div id="wc-ajax-search-results" class="product-search-result">

                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- Search Area end -->