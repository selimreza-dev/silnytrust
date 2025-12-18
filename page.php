<?php
//  Page Template

get_header(); ?>

<main>

    <!--  page title -->
    <?php
    $page_header_img = get_template_directory_uri() . '/assets/img/page-bg-img.png';
    ?>
    <!-- page title section  - main area -->
    <section id="page-title" class="w-full h-40 page-title" style="background-image: url('<?php echo $page_header_img; ?>'); background-position:center; background-size:cover; background-repeat:no-repeat;">
        <div class="page-title-container flex items-center justify-center w-full h-full gray-page-bg white-text-color">
            <div class="flex flex-col items-center justify-center gap-3">
                <!-- Page Title -->
                <div>
                    <h1 class="uppercase text-2xl sm:text-3xl white-text font-medium"><?php the_title(); ?></h1>
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
                            <?php the_title(); ?>
                        </span>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- page area -->
    <section id="page-area">
        <div class="page-area w-12/12 mx-auto px-5 py-5 flex items-center justify-between sm:w-11/12">
            <?php get_template_part('template_part/page_setup'); ?>
        </div>
    </section>
</main>


<!-- footer -->
<?php get_footer(); ?>