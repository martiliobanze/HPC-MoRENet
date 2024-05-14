<?php
/**
 * News Portal Elementrix Header Settings panel at Theme Customizer
 *
 * @package News Portal Elementrix
 */

add_action( 'customize_register', 'news_portal_elementrix_header_settings_register' );

function news_portal_elementrix_header_settings_register( $wp_customize ) {

	/**
     * Add Header Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'news_portal_elementrix_header_settings_panel',
	    array(
	        'priority'       => 10,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Header Settings', 'news-portal-elementrix' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
	
	/**
     * Top Header Section
     */
    $wp_customize->add_section(
        'news_portal_elementrix_top_header_section',
        array(
            'title'     => __( 'Top Header Section', 'news-portal-elementrix' ),
            'priority'  => 5,
            'panel'     => 'news_portal_elementrix_header_settings_panel'
        )
    );

    /**
     * Switch option for Top Header
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_top_header_option',
        array(
            'default' => 'hide',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_top_header_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Top Header Section', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Show/Hide option for top header section.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_top_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Hide', 'news-portal-elementrix' )
                    ),
                'priority'  => 5,
            )
        )
    );

    /**
     * Switch option for Current Date
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_top_date_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_top_date_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Current Date', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Show/Hide option for current date at top header section.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_top_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Hide', 'news-portal-elementrix' )
                    ),
                'priority'  => 10,
            )
        )
    );

    /**
     * Switch option for Social Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_top_social_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_top_social_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Social Icons', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Show/Hide option for social media icons at top header section.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_top_header_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Hide', 'news-portal-elementrix' )
                    ),
                'priority'  => 15,
            )
        )
    );
/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Header Section
     */
    $wp_customize->add_section(
        'news_portal_elementrix_header_option_section',
        array(
            'title'     => __( 'Header Option', 'news-portal-elementrix' ),
            'priority'  => 10,
            'panel'     => 'news_portal_elementrix_header_settings_panel'
        )
    );    

    /**
     * Switch option for primary menu sticky
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_menu_sticky_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_menu_sticky_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Sticky Menu', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Enable/Disable option for sticky menu.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_header_option_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Enable', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Disable', 'news-portal-elementrix' )
                    ),
                'priority'  => 5,
            )
        )
    );

    /**
     * Switch option for Home Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_home_icon_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_home_icon_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Home Icon', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Show/Hide option for home icon at primary menu.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_header_option_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Hide', 'news-portal-elementrix' )
                    ),
                'priority'  => 10,
            )
        )
    );

    /**
     * Switch option for Search Icon
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_search_icon_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_search_icon_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Search Icon', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Show/Hide option for search icon at primary menu.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_header_option_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Hide', 'news-portal-elementrix' )
                    ),
                'priority'  => 15,
            )
        )
    );

    /**
     * Switch option for live button
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_live_button_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_live_button_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Live Button', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Show/Hide option for live button at primary menu.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_header_option_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Hide', 'news-portal-elementrix' )
                    ),
                'priority'  => 20,
            )
        )
    );

    /**
     * Text field for live button label
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_live_button_label',
        array(
            'default'    => __( 'Live Now', 'news-portal-elementrix' ),
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'news_portal_elementrix_live_button_label',
        array(
            'type'      => 'text',
            'label'     => esc_html__( 'Button Label', 'news-portal-elementrix' ),
            'section'   => 'news_portal_elementrix_header_option_section',
            'priority'  => 25,
            'active_callback' => 'news_portal_elementrix_cb_live_button'
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'news_portal_elementrix_live_button_label', 
        array(
            'selector' => '.live-button-wrap>a',
            'render_callback' => 'news_portal_elementrix_customize_partial_live_button',
        )
    );

    /**
     * Url field for live button link
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_live_button_url',
        array(
            'default'    => '#',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        'news_portal_elementrix_live_button_url',
        array(
            'type'      => 'text',
            'label'     => esc_html__( 'Button Link', 'news-portal-elementrix' ),
            'section'   => 'news_portal_elementrix_header_option_section',
            'priority'  => 25,
            'active_callback' => 'news_portal_elementrix_cb_live_button'
        )
    );

    /**
     * header background image
     */
    $wp_customize->add_setting( 'news_portal_elementrix_header_bg_image',
        array(
            'default'       => '',
            'capability'    => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
        'news_portal_elementrix_header_bg_image',
            array(
                'label'      => esc_html__( 'Header Background', 'news-portal-elementrix' ),
                'section'    => 'news_portal_elementrix_header_option_section',
                'priority'   => 50
            )
        )
    );
}