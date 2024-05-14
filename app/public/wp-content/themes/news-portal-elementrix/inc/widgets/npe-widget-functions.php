<?php
/**
 * News Portal Elementrix custom function and work related to widgets.
 *
 * @package News Portal Elementrix
 */


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function news_portal_elementrix_widgets_init() {
    
    /**
     * Register right sidebar
     *
     * @since 1.0.0
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'news-portal-elementrix' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'news-portal-elementrix' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    /**
     * Register header ads area
     *
     * @since 1.0.0
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Header Ads', 'news-portal-elementrix' ),
        'id'            => 'news_portal_elementrix_header_ads_area',
        'description'   => esc_html__( 'Add banner widgets here.', 'news-portal-elementrix' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    /**
     * Register 4 different footer area 
     *
     * @since 1.0.0
     */
    register_sidebars( 4 , array(
        'name'          => esc_html__( 'Footer %d', 'news-portal-elementrix' ),
        'id'            => 'news_portal_elementrix_footer_sidebar',
        'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'news-portal-elementrix' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'news_portal_elementrix_widgets_init' );