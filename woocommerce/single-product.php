<?php

/**
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (! defined('ABSPATH')) {
	exit;
}

get_header('shop'); ?>

<section id="single-product-page" class=" max-w-full px-5 md:max-w-7xl mx-auto py-6">
	<?php
	do_action('woocommerce_before_main_content');
	?>


	<div class="single-product-loop-wrap">
		<?php while (have_posts()) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part('content', 'single-product'); ?>

		<?php endwhile;
		?>
	</div>


	<?php
	do_action('woocommerce_after_main_content');
	?>
</section>

<?php
get_footer('shop');
