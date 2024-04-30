<?php
/* 
* Plugin Name:       Wp-customs-horizontal
* Plugin URI:        https://example.com/plugins/the-basics/ 
* Description:       Handle the basics with this plugin. 
* Version:           1.10.3 
* Requires at least: 5.2 
* Requires PHP:      7.2 
* Author:            Al Mumeetu Saikat 
* Author URI:        https://author.example.com/ 
* License:           GPL v2 or later 
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html 
* Update URI:        https://example.com/my-plugin/ 
* Text Domain:       hroizontal_custom 
*/


/**
 * Proper way to enqueue styles
 */

// Define a function to enqueue styles
function hroizontal_customs_enqueue_styles()
{
    // Enqueue your stylesheet
    wp_enqueue_style('horizontal-style', plugins_url('css/horizontal-style.css', __FILE__));
}

// Hook into the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'hroizontal_customs_enqueue_styles');



/**
 * Proper way to enqueue Scripts
 */
function hroizontal_customs_equeue_scripts()
{
    wp_enqueue_script('horizontal-js', plugins_url('/js/horizontal-js.js', __FILE__), array(), '1.0.0', true);
    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', false, '3.9.1');
    wp_enqueue_script('gsap-scrollTriger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js', false, '3.9.1');
    
}
add_action('wp_enqueue_scripts', 'hroizontal_customs_equeue_scripts');


if (!function_exists('horizontall_scroll')) {

    // Register Custom Post Type
    function horizontall_scroll()
    {

        $labels = array(
            'name'                  => _x('horizontal-scrolls', 'Post Type General Name', 'hroizontal_custom'),
            'singular_name'         => _x('horizontal-scroll', 'Post Type Singular Name', 'hroizontal_custom'),
            'menu_name'             => __('horizontal-scroll', 'hroizontal_custom'),
            'name_admin_bar'        => __('Post Type', 'hroizontal_custom'),
            'archives'              => __('Item Archives', 'hroizontal_custom'),
            'attributes'            => __('Item Attributes', 'hroizontal_custom'),
            'parent_item_colon'     => __('Parent Item:', 'hroizontal_custom'),
            'all_items'             => __('All Items', 'hroizontal_custom'),
            'add_new_item'          => __('Add New Item', 'hroizontal_custom'),
            'add_new'               => __('Add New', 'hroizontal_custom'),
            'new_item'              => __('New Item', 'hroizontal_custom'),
            'edit_item'             => __('Edit Item', 'hroizontal_custom'),
            'update_item'           => __('Update Item', 'hroizontal_custom'),
            'view_item'             => __('View Item', 'hroizontal_custom'),
            'view_items'            => __('View Items', 'hroizontal_custom'),
            'search_items'          => __('Search Item', 'hroizontal_custom'),
            'not_found'             => __('Not found', 'hroizontal_custom'),
            'not_found_in_trash'    => __('Not found in Trash', 'hroizontal_custom'),
            'featured_image'        => __('Featured Image', 'hroizontal_custom'),
            'set_featured_image'    => __('Set featured image', 'hroizontal_custom'),
            'remove_featured_image' => __('Remove featured image', 'hroizontal_custom'),
            'use_featured_image'    => __('Use as featured image', 'hroizontal_custom'),
            'insert_into_item'      => __('Insert into item', 'hroizontal_custom'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'hroizontal_custom'),
            'items_list'            => __('Items list', 'hroizontal_custom'),
            'items_list_navigation' => __('Items list navigation', 'hroizontal_custom'),
            'filter_items_list'     => __('Filter items list', 'hroizontal_custom'),
        );
        $args = array(
            'label'                 => __('horizontal-scroll', 'hroizontal_custom'),
            'description'           => __('horizontal-scroll', 'hroizontal_custom'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type('horizontal-scroll', $args);
    }
    add_action('init', 'horizontall_scroll', 0);
}


function horizontal_scroll_loop()
{
    ?> 
    <div class="slider container-wraper">
    <?php 
    // WP_Query arguments
    $args = array(
        'post_type'              => array('horizontal-scroll'),
        'post_status'            => array('publish'),
    );

    // The Query
    $hroizontal_custom_query = new WP_Query($args);

    // The Loop
    if ($hroizontal_custom_query->have_posts()) {
        while ($hroizontal_custom_query->have_posts()) {
            $hroizontal_custom_query->the_post();
            // do something
            ?>
            <div class="slide panel">
                <div class="Name">
                    <h3><?php echo get_post_meta( get_the_ID(), 'scrolling_name', true ); ?></h3>
                </div>
                <div class="Description">
                    <p><?php echo get_post_meta( get_the_ID(), 'scrolling_desig', true ); ?></p>
                </div>
                <div class="Des">
                    <p><?php echo get_post_meta( get_the_ID(), 'scrolling_des', true ); ?></p>
                </div>
                <div class="ibrahim">
                    <p><?php echo get_post_meta( get_the_ID(), 'ibrahim_name', true ); ?></p>
                </div>
                <div class="img">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">
                </div>
            </div>

    <?php }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata(); ?> 
    </div>
    <?php 
}
?>








