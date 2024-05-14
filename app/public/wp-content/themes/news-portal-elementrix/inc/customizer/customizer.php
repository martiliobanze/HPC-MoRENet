<?php
/**
 * News Portal Elementrix Theme Customizer
 *
 * @package News Portal Elementrix
 */

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function news_portal_elementrix_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
    $wp_customize->selective_refresh->add_partial( 
        'blogname', 
        array(
            'selector' => '.site-title a',
            'render_callback' => 'news_portal_elementrix_customize_partial_blogname',
        )
    );

    $wp_customize->selective_refresh->add_partial( 
        'blogdescription', 
        array(
            'selector' => '.site-description',
            'render_callback' => 'news_portal_elementrix_customize_partial_blogdescription',
        )
    );

    /**
     * Register custom section types.
     *
     * @since 1.0.6
     */
    $wp_customize->register_section_type( 'news_portal_elementrix_Customize_Section_Upsell' );

    /**
     * Register theme upsell sections.
     *
     * @since 1.0.6
     */
    $wp_customize->add_section( new News_Portal_Elementrix_Customize_Section_Upsell(
        $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'News Portal Pro', 'news-portal-elementrix' ),
                'pro_text' => esc_html__( 'Buy Pro', 'news-portal-elementrix' ),
                'pro_url'  => 'https://mysterythemes.com/wp-themes/news-portal-pro/',
                'priority'  => 1,
            )
        )
    );

/*-----------------------------------------------------------------------------------------------------------*/
    /**
     * Add Important theme links
     *
     * @since 1.1.0
     */
    $wp_customize->add_section(
        'news_portal_elementrix_imp_link_section',
        array(
            'title'      => __( 'Important Theme Links', 'news-portal-elementrix' ),
            'priority'   => 35
        )
    );

    $wp_customize->add_setting(
        'news_portal_elementrix_imp_links',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control( new News_Portal_Elementrix_Info_Content(
        $wp_customize,
            'news_portal_elementrix_imp_links',
            array(
                'section'       => 'news_portal_elementrix_imp_link_section',
                'description'   => '<a class="mt-imp-link" href="https://docs.mysterythemes.com/news-portal-elementrix/" target="_blank">'.__( 'Documentation', 'news-portal-elementrix' ).'</a><a class="mt-imp-link" href="https://preview.mysterythemes.com/news-portal-elementrix" target="_blank">'.__( 'Live Demos', 'news-portal-elementrix' ).'</a><a class="mt-imp-link" href="https://www.facebook.com/mysterythemes/" target="_blank">'.__( 'Like Us in Facebook', 'news-portal-elementrix' ).'</a><a class="mt-imp-link" href="https://wpallresources.com/" target="_blank">'.__( 'WP Tutorials', 'news-portal-elementrix' ).'</a><a class="mt-imp-link" href="https://mysterythemes.com/wp-themes/news-portal-pro/" target="_blank">'.__( 'Upgrade to Pro', 'news-portal-elementrix' ).'</a>',
            )
        )
    );

    $wp_customize->add_setting(
        'news_portal_elementrix_rate_us',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control( new News_Portal_Elementrix_Info_Content( 
        $wp_customize,
            'news_portal_elementrix_rate_us',
            array(
                'section'       => 'news_portal_elementrix_imp_link_section',
                'description'   => sprintf(__( 'Please do rate our theme if you liked it %s', 'news-portal-elementrix' ), '<a class="mt-imp-link" href="https://wordpress.org/support/theme/news-portal-elementrix/reviews/?filter=5#new-post" target="_blank">Rate/Review</a>' ),
            )
        )
    );

}
add_action( 'customize_register', 'news_portal_elementrix_customize_register' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function news_portal_elementrix_customize_preview_js() {
	wp_enqueue_script( 'news_portal_elementrix_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'news_portal_elementrix_customize_preview_js' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function news_portal_elementrix_customize_backend_scripts() {

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
    
    wp_enqueue_style( 'news_portal_elementrix_admin_customizer_style', get_template_directory_uri() . '/assets/css/npe-customizer-style.css' );

    wp_enqueue_script( 'news_portal_elementrix_admin_customizer', get_template_directory_uri() . '/assets/js/npe-customizer-controls.js', array( 'jquery', 'customize-controls' ), '20170616', true );
}
add_action( 'customize_controls_enqueue_scripts', 'news_portal_elementrix_customize_backend_scripts', 10 );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Load required files for customizer section
 *
 * @since 1.0.0
 */

require get_template_directory() . '/inc/customizer/npe-general-panel.php';          // General Settings
require get_template_directory() . '/inc/customizer/npe-header-panel.php';  		    // Header Settings
require get_template_directory() . '/inc/customizer/npe-additional-panel.php';       // Additional Settings
require get_template_directory() . '/inc/customizer/npe-design-panel.php';           // Design Settings
require get_template_directory() . '/inc/customizer/npe-footer-panel.php';           // Footer Settings
require get_template_directory() . '/inc/customizer/npe-custom-classes.php';         // Custom Classes
require get_template_directory() . '/inc/customizer/npe-customizer-sanitize.php';    // Customizer Sanitize
require get_template_directory() . '/inc/customizer/npe-active-callback.php';    // Customizer Active callback