<?php
// Blog  Cagetory Page

get_header(); ?>

<main>

    <!-- Cagetory page title -->
    <?php
    $page_header_img = get_template_directory_uri() . '/assets/img/page-bg-img.png';
    ?>
    <!-- Cagetory page title section  - main area -->
    <section id="page-title" class="w-full h-40 page-title" style="background-image: url('<?php echo $page_header_img; ?>'); background-position:center; background-size:cover; background-repeat:no-repeat;">
        <div class="page-title-container flex items-center justify-center w-full h-full gray-page-bg white-text-color">
            <div class="flex flex-col items-center justify-center gap-3">
                <!--Cagetory Page Title -->
                <div>
                    <h1 class="uppercase text-2xl sm:text-3xl white-text-color font-medium"><?php single_cat_title(); ?></h1>
                </div>
                <!-- Page Navigate -->
                <div>
                    <p class=" flex items-center justify-center gap-2">
                        <span>
                            <a class="home-page-navigate white-text-color hover:primary-text-color" href="<?php echo home_url(); ?>"><span>HOME</span></a>
                        </span>
                        <span class="white-text-color">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>

                        </span>
                        <span class="uppercase white-text-color archive-title primary-font">
                            <?php the_archive_title(); ?>
                        </span>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- blog area -->
    <section id="blogs" class="py-10">
        <div class="content-wrapper w-12/12 mx-auto px-5 py-2 flex items-start justify-between sm:w-11/12 gap-5 flex-wrap lg:flex-nowrap">
            <div class="blog-area w-12/12 lg:w-9/12">
                <?php get_template_part('template_part/blog_setup') ?>
            </div>
            <div class="sidebar-area w-12/12 lg:w-3/12">
                <div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main>


<!-- footer -->
<?php get_footer(); ?>