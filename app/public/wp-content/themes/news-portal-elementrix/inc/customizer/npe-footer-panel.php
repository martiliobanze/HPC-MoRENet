<?php
/**
 * News Portal Elementrix Footer Settings panel at Theme Customizer
 *
 * @package News Portal Elementrix
 */

add_action( 'customize_register', 'news_portal_elementrix_footer_settings_register' );

function news_portal_elementrix_footer_settings_register( $wp_customize ) {

	/**
     * Add Footer Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'news_portal_elementrix_footer_settings_panel',
	    array(
	        'priority'       => 30,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Footer Settings', 'news-portal-elementrix' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
	 * Widget Area Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'news_portal_elementrix_footer_widget_section',
        array(
            'title'		=> esc_html__( 'Widget Area', 'news-portal-elementrix' ),
            'panel'     => 'news_portal_elementrix_footer_settings_panel',
            'priority'  => 5,
        )
    );

    /**
     * Switch option for footer widget area
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_footer_widget_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_footer_widget_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Footer Widget Section', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Show/Hide option for footer widget area section.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_footer_widget_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Show', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Hide', 'news-portal-elementrix' )
                    ),
                'priority'  => 5,
            )
        )
    );

    /**
     * Image Radio field for widget area column
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'footer_widget_layout',
        array(
            'default'           => 'column_three',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Control_Radio_Image(
        $wp_customize,
        'footer_widget_layout',
            array(
                'label'    => esc_html__( 'Footer Widget Layout', 'news-portal-elementrix' ),
                'description' => esc_html__( 'Choose layout from available layouts', 'news-portal-elementrix' ),
                'section'  => 'news_portal_elementrix_footer_widget_section',
                'choices'  => array(
	                    'column_four' => array(
	                        'label' => esc_html__( 'Columns Four', 'news-portal-elementrix' ),
	                        'url'   => '%s/assets/images/footer-4.png'
	                    ),
	                    'column_three' => array(
	                        'label' => esc_html__( 'Columns Three', 'news-portal-elementrix' ),
	                        'url'   => '%s/assets/images/footer-3.png'
	                    ),
	                    'column_two' => array(
	                        'label' => esc_html__( 'Columns Two', 'news-portal-elementrix' ),
	                        'url'   => '%s/assets/images/footer-2.png'
	                    ),
	                    'column_one' => array(
	                        'label' => esc_html__( 'Column One', 'news-portal-elementrix' ),
	                        'url'   => '%s/assets/images/footer-1.png'
	                    )
	            ),
	            'priority' => 10,
                'active_callback' => 'news_portal_elementrix_cb_footer_widget'
            )
        )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
	 * Bottom Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'news_portal_elementrix_footer_bottom_section',
        array(
            'title'		=> esc_html__( 'Bottom Section', 'news-portal-elementrix' ),
            'panel'     => 'news_portal_elementrix_footer_settings_panel',
            'priority'  => 10,
        )
    );

    /**
     * Text field for copyright
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_copyright_text',
        array(
            'default'    => '',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control(
        'news_portal_elementrix_copyright_text',
        array(
            'type'      => 'text',
            'label'     => esc_html__( 'Copyright Text', 'news-portal-elementrix' ),
            'section'   => 'news_portal_elementrix_footer_bottom_section',
            'priority'  => 5
        )
    );
    $wp_customize->selective_refresh->add_partial( 
        'news_portal_elementrix_copyright_text', 
        array(
            'selector' => 'span.np-copyright-text',
            'render_callback' => 'news_portal_elementrix_customize_partial_copyright',
        )
    );
}