<?php
/**
 * News Portal Elementrix General Settings panel at Theme Customizer
 *
 * @package News Portal Elementrix
 */

add_action( 'customize_register', 'news_portal_elementrix_general_settings_register' );

function news_portal_elementrix_general_settings_register( $wp_customize ) {

	$wp_customize->get_section( 'title_tagline' )->panel = 'news_portal_elementrix_general_settings_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = '5';
    $wp_customize->get_section( 'colors' )->panel    = 'news_portal_elementrix_general_settings_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';
    $wp_customize->get_section( 'background_image' )->panel = 'news_portal_elementrix_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority = '15';
    $wp_customize->get_section( 'static_front_page' )->panel = 'news_portal_elementrix_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '20';

    /**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'news_portal_elementrix_general_settings_panel',
	    array(
	        'priority'       => 5,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'General Settings', 'news-portal-elementrix' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Color option for theme
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_theme_color',
        array(
            'default'     => '#870306',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'news_portal_elementrix_theme_color',
            array(
                'label'      => __( 'Theme Color', 'news-portal-elementrix' ),
                'section'    => 'colors',
                'priority'   => 5
            )
        )
    );

    /**
     * Secondary Color option for theme
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_theme_secondary_color',
        array(
            'default'     => '#FFD600',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'news_portal_elementrix_theme_secondary_color',
            array(
                'label'      => __( 'Secondary Theme Color', 'news-portal-elementrix' ),
                'section'    => 'colors',
                'priority'   => 5
            )
        )
    );

    /**
     * Title Color
     *
     * @since 1.0.0
     */

    $wp_customize->add_setting(
        'news_portal_elementrix_site_title_color',
        array(
            'default'     => '#870306',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
 
    $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize,
            'news_portal_elementrix_site_title_color',
            array(
                'label'      => __( 'Header Text Color', 'news-portal-elementrix' ),
                'section'    => 'colors',
                'priority'   => 5
            )
        )
    );
    
/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Website layout section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'news_portal_elementrix_website_layout_section',
        array(
            'title'         => __( 'Website Layout', 'news-portal-elementrix' ),
            'description'   => __( 'Choose a site to display your website more effectively.', 'news-portal-elementrix' ),
            'priority'      => 55,
            'panel'         => 'news_portal_elementrix_general_settings_panel',
        )
    );
    
    $wp_customize->add_setting(
        'news_portal_elementrix_site_layout',
        array(
            'default'           => 'fullwidth_layout',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_site_layout',
        )       
    );
    $wp_customize->add_control(
        'news_portal_elementrix_site_layout',
        array(
            'type'          => 'radio',
            'priority'      => 5,
            'label'         => __( 'Site Layout', 'news-portal-elementrix' ),
            'section'       => 'news_portal_elementrix_website_layout_section',
            'choices'       => array(
                'fullwidth_layout' => __( 'FullWidth Layout', 'news-portal-elementrix' ),
                'boxed_layout' => __( 'Boxed Layout', 'news-portal-elementrix' )
            ),
            'priority'      => 5,
        )
    );

/*------------------------------------------------------------------------------------------*/
    /**
     * Title and tagline checkbox
     *
     * @since 1.0.1
     */
    $wp_customize->add_setting( 
        'news_portal_elementrix_site_title_option', 
        array(
            'default' => 'true',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_checkbox'
        )
    );
    $wp_customize->add_control( 
        'news_portal_elementrix_site_title_option', 
        array(
            'label'     => esc_html__( 'Display Site Title and Tagline', 'news-portal-elementrix' ),
            'section'   => 'title_tagline',
            'type'      => 'checkbox'
        )
    );

    /*------------------------------------------------------------------------------------------*/
    /**
     * Templates Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'news_portal_elementrix_templates_settings_section',
        array(
            'title'         => __( 'Template Settings', 'news-portal-elementrix' ),
            'description'   => __( 'Manage the settings for available templates.', 'news-portal-elementrix' ),
            'priority'      => 55,
            'panel'         => 'news_portal_elementrix_general_settings_panel',
        )
    );

    /**
     * Switch option for homepage template content show hide
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_home_template_content_option',
        array(
            'default' => 'hide',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_home_template_content_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Home Page Template', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Show/Hide option to display content of the pages that uses home page template.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_templates_settings_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Hide', 'news-portal-elementrix' )
                    ),
                'priority'  => 10,
            )
        )
    );
}