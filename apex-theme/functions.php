<?php
/**
 * Apex Theme functions and definitions
 */

if (!function_exists('apex_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function apex_theme_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Menu Principal', 'apex-theme'),
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('apex_theme_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo.
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'apex_theme_setup');

/**
 * Enqueue scripts and styles.
 */
function apex_theme_scripts() {
    // Enqueue Styles
    wp_enqueue_style('apex-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    wp_enqueue_style('apex-style', get_stylesheet_uri());
    wp_enqueue_style('apex-custom-styles', get_template_directory_uri() . '/css/styles.css');
    
    // Enqueue Scripts
    wp_enqueue_script('apex-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'apex_theme_scripts');

/**
 * Register Home Page Widget Area
 */
function apex_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'apex-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Adicione widgets aqui.', 'apex-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'apex_widgets_init');

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions for handling the form
 */
require_once get_template_directory() . '/inc/form-handler.php';
