<?php


// hero-carousel
function silny_hero_carousel()
{
    $labels = array(
        'name' => __('Carousels', 'silnytrust'),
        'singular_name' => __('Carousel', 'silnytrust'),
        'menu_name' => __('Carousels', 'silnytrust'),
        'name_admin_bar' => __('Carousel', 'silnytrust'),
        'add_new' => __('Add New', 'silnytrust'),
        'add_new_item' => __('Add New Carousel', 'silnytrust'),
        'edit_item' => __('Edit Carousel', 'silnytrust'),
        'view_item' => __('View Carousel', 'silnytrust'),
        'all_items' => __('All Carousels', 'silnytrust'),
        'search_items' => __('Search Carousels', 'silnytrust'),
        'not_found' => __('Not Found Carousels', 'silnytrust'),
        'not_found_in_trash' => __('Not found Carousels in trash.', 'silnytrust'),
        'archives' => __('Carousels Archives', 'silnytrust'),
        'attributes' => __('Carousels Attributes', 'silnytrust'),
        'inset_into_item' => __('Inset into Carousels', 'silnytrust'),
        'upload_to_this_item' => __('Upload to Carousels', 'silnytrust'),
        'featured_image' => __('Featured Image', 'silnytrust'),
        'set_featured_image' => __('Set Featured Image', 'silnytrust'),
        'remove_featured_image' => __('Remove Featured Image', 'silnytrust'),
        'use_featured_image' => __('Use featured Image', 'silnytrust'),
        'filter_items_list' => __('Carousels Filter List', 'silnytrust'),
        'filter_lists' => __('Filter Carousels', 'silnytrust'),
        'item_list_navgation' => __('Carousels Navigation', 'silnytrust'),
    );
    $args = array(
        'labels' => $labels,
        'description' => __('Image Carousels', 'silnytrust'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'carousel',
            'with_front' => false,
        ),
        'menu_position' => 6,
        'menu_icon' => 'dashicons-format-image',
        'capability' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'supports' => array('title', 'thumbnail',),
        'taxonomies' => array('slider'),
        'show_in_rest' => true,
        'rest_base' => 'carousel',

    );
    register_post_type('carousel', $args);
}
add_action('init', 'silny_hero_carousel');
