<?php

/**
 * 404 error Template 
 */
get_header(); ?>

<main>

    <section id="error-404-area">
        <div class="flex max-w-full md:max-w-7xl mx-auto items-center justify-center flex-col mb-6">
            <h1 class="text-4xl uppercase mt-8 font-bold">Something is Wrong</h1>
            <div class="w-9/12 md:w-6/12">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/404.png'; ?>">
            </div>
            <div>
                <a class="inline-block py-1 px-5 secondary-color-bg light-color-text transition-all " href="<?php echo home_url('/'); ?>">Go to HOME</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>