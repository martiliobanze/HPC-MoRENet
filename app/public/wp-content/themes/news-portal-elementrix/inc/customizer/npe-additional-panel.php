<?php
/**
 * News Portal Elementrix Additional Settings panel at Theme Customizer
 *
 * @package News Portal Elementrix
 */

add_action( 'customize_register', 'news_portal_elementrix_additional_settings_register' );

function news_portal_elementrix_additional_settings_register( $wp_customize ) {

	/**
     * Add Additional Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'news_portal_elementrix_additional_settings_panel',
	    array(
	        'priority'       => 20,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Additional Settings', 'news-portal-elementrix' ),
	    )
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
	 * Social Icons Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'news_portal_elementrix_social_icons_section',
        array(
            'title'		=> esc_html__( 'Social Icons', 'news-portal-elementrix' ),
            'panel'     => 'news_portal_elementrix_additional_settings_panel',
            'priority'  => 5,
        )
    );

    /**
     * Repeater field for social media icons
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
        'social_media_icons', 
        array(
            'sanitize_callback' => 'news_portal_elementrix_sanitize_repeater',
            'default' => json_encode(array(
                array(
                    'social_icon_class' => 'fa fa-facebook-f',
                    'social_icon_url' => '',
                )
            ))
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Repeater_Controler(
        $wp_customize, 
            'social_media_icons', 
            array(
                'label'   => __( 'Social Media Icons', 'news-portal-elementrix' ),
                'section' => 'news_portal_elementrix_social_icons_section',
                'settings' => 'social_media_icons',
                'priority' => 5,
                'news_portal_elementrix_box_label' => __( 'Social Media Icon','news-portal-elementrix' ),
                'news_portal_elementrix_box_add_control' => __( 'Add Icon','news-portal-elementrix' )
            ),
            array(
                'social_icon_class' => array(
                    'type'        => 'social_icon',
                    'label'       => __( 'Social Media Logo', 'news-portal-elementrix' ),
                    'description' => __( 'Choose social media icon.', 'news-portal-elementrix' )
                ),
                'social_icon_url' => array(
                    'type'        => 'url',
                    'label'       => __( 'Social Icon Url', 'news-portal-elementrix' ),
                    'description' => __( 'Enter social media url.', 'news-portal-elementrix' )
                )
            )
        ) 
    );

/*-----------------------------------------------------------------------------------------------------------------------*/
   	/**
   	 * Category Color Section
   	 *
   	 * @since 1.0.0
   	 */
    $wp_customize->add_section(
        'news_portal_elementrix_categories_color_section',
        array(
            'title'         => __( 'Categories Color', 'news-portal-elementrix' ),
            'priority'      => 10,
            'panel'         => 'news_portal_elementrix_additional_settings_panel',
        )
    );

	$priority = 5;
	$categories = get_categories( array( 'hide_empty' => 1 ) );
	$wp_category_list = array();

	foreach ( $categories as $category_list ) {

		$wp_customize->add_setting( 
			'news_portal_elementrix_category_color_'.esc_html( strtolower( $category_list->slug ) ),
			array(
				'default'              => '#870306',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'sanitize_hex_color'
			)
		);

		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 
			'news_portal_elementrix_category_color_'.esc_html( strtolower( $category_list->slug ) ),
				array(
					'label'    => sprintf( esc_html__( ' %s', 'news-portal-elementrix' ), esc_html( $category_list->name ) ),
					'section'  => 'news_portal_elementrix_categories_color_section',
					'priority' => $priority
				)
			)
		);
		$priority++;
	}

/*-----------------------------------------------------------------------------------------------------------------------*/
    /**
     * Sidebar Sticky Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'news_portal_elementrix_sidebar_sticky_section',
        array(
            'title'     => esc_html__( 'Sidebar Sticky Settings', 'news-portal-elementrix' ),
            'panel'     => 'news_portal_elementrix_additional_settings_panel',
            'priority'  => 20,
        )
    );

    /**
     * Switch option for category color at widget title
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'news_portal_elementrix_inner_sidebar_sticky_option',
        array(
            'default' => 'show',
            'sanitize_callback' => 'news_portal_elementrix_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new News_Portal_Elementrix_Customize_Switch_Control(
        $wp_customize,
            'news_portal_elementrix_inner_sidebar_sticky_option',
            array(
                'type'      => 'switch',
                'label'     => esc_html__( 'Innerpage Sticky', 'news-portal-elementrix' ),
                'description'   => esc_html__( 'Enable/Disable sticky sidebar for innperpages like( archive, single, search ) pages.', 'news-portal-elementrix' ),
                'section'   => 'news_portal_elementrix_sidebar_sticky_section',
                'choices'   => array(
                    'show'  => esc_html__( 'Enable', 'news-portal-elementrix' ),
                    'hide'  => esc_html__( 'Disable', 'news-portal-elementrix' )
                    ),
                'priority'  => 5,
            )
        )
    );

}