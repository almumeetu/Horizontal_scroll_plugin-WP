<?php
/*
Plugin Name: Elementor Horizontal Slider Widget
Description: A custom Elementor widget for a horizontal slider with dynamic content.
Version: 1.0
Author: My Name 
Depends: Elementor
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Include the main Elementor classes.
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Elementor_Horizontal_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'horizontal-slider-widget';
    }

    public function get_title() {
        return __( 'Horizontal Slider', 'elementor-horizontal-slider' );
    }

    public function get_icon() {
        return 'eicon-slick-slider';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'elementor-horizontal-slider' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'category_slug',
            [
                'label' => __( 'Category Slug', 'elementor-horizontal-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'description' => __( 'Enter the category slug to filter posts.', 'elementor-horizontal-slider' ),
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => __( 'Items', 'elementor-horizontal-slider' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => __( 'Title', 'elementor-horizontal-slider' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Title', 'elementor-horizontal-slider' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'subtitle',
                        'label' => __( 'Subtitle', 'elementor-horizontal-slider' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Subtitle', 'elementor-horizontal-slider' ),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'image',
                        'label' => __( 'Image', 'elementor-horizontal-slider' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                ],
                'default' => [
                    [
                        'title' => __( 'Title 1', 'elementor-horizontal-slider' ),
                        'subtitle' => __( 'Subtitle 1', 'elementor-horizontal-slider' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $category_slug = $settings['category_slug'];

        $query_args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );

        if (!empty($category_slug)) {
            $query_args['category_name'] = $category_slug;
        }

        $query = new \WP_Query($query_args);

        ?>
        <div class="horizontal-slider">
            <div class="scrolling-container">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="item">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                        <?php endif; ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <?php
    }
}

function register_elementor_horizontal_slider_widget() {
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Horizontal_Slider_Widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'register_elementor_horizontal_slider_widget' );

function elementor_horizontal_slider_enqueue_styles() {
    wp_enqueue_style( 'elementor-horizontal-slider-style', plugin_dir_url( __FILE__ ) . 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'elementor_horizontal_slider_enqueue_styles' );
