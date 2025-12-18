<!DOCTYPE html>
<html lang='<?php language_attributes(); ?>'>

<head>
    <meta charset="<?php get_bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- header Area -->
    <section id="header-top">
        <div class="header-top-container w-12/12 sm:w-11/12 mx-auto px-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="primary-font flex gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>

                        <span class="mb-0.75">
                            <?php echo  get_theme_mod('silnytrust_header_email_setting'); ?>
                        </span>
                    </p>
                </div>
                <div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header_top_menu',
                        'menu_id'        => 'header_top_nav',
                        'menu_class'     => 'top-menu'
                    ));
                    ?>
                </div>
            </div>
        </div>
    </section>
    <header id="header-area" class="relative">
        <nav class="w-12/12 sm:w-11/12 mx-auto px-5 py-2.5 flex items-center justify-between ">
            <div class="header-logo">
                <div class="w-30 md:w-40">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                    ?>
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/img/Silnytrust-logo.png'); ?>"
                                alt="<?php echo esc_attr(bloginfo('name')); ?>">
                        </a>
                    <?php


                    }
                    ?>
                </div>
            </div>
            <div class="main-menu">
                <button id="mobile-menu-btn" class="block md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <?php
                if (has_nav_menu('primary_menu')) {
                    wp_nav_menu(array(
                        'location' => 'primary_menu',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'hidden md:block'
                    ));
                }

                ?>
            </div>
            <div>
                <div class="cart-box mr-3.5">
                    <span class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="cart-count">
                            1
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    </header>