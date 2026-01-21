<?php
// Ajax Search 

// search ajax function
function wc_ajax_search_scripts() {

  wp_enqueue_script(
    'wc-ajax-search',
    get_template_directory_uri() . '/assets/js/ajax-search.js',
    array(),
    null,
    true
  );

  wp_localize_script(
    'wc-ajax-search',
    'wc_ajax_search',
    array(
      'ajax_url' => admin_url('admin-ajax.php')
    )
  );
}
add_action('wp_enqueue_scripts', 'wc_ajax_search_scripts');

// search product query
function wc_ajax_product_search() {

  if ( empty($_POST['keyword']) ) {
    wp_die();
  }

  $keyword = sanitize_text_field($_POST['keyword']);

  $args = array(
    'post_type'      => 'product',
    'posts_per_page' => 6,
    's'              => $keyword,
  );

  $query = new WP_Query($args);

  if ( $query->have_posts() ) {

    echo '<ul class="ajax-search-list">';

    while ( $query->have_posts() ) {
      $query->the_post();
      global $product;
      ?>
<li class="product-search-result-item">
    <a class="search-product-list-inner" href="<?php the_permalink(); ?>">
        <?php echo $product->get_image('thumbnail'); ?>
        <span class="title"><?php the_title(); ?></span>
        <!-- <span class="price"><?php echo $product->get_price_html(); ?></span> -->
    </a>
</li>
<?php
    }

    echo '</ul>';

  } else {
    echo '<p class="no-result">
    <i class="fa-regular fa-face-frown-open"></i>
    No products found
    </p>';
  }

  wp_reset_postdata();
  wp_die();
}

add_action('wp_ajax_wc_ajax_product_search', 'wc_ajax_product_search');
add_action('wp_ajax_nopriv_wc_ajax_product_search', 'wc_ajax_product_search');