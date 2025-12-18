<!-- page setup -->
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="page-item">
            <div class=" w-full">
                <div class="page-content-box">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php else: ?>
<?php endif; ?>