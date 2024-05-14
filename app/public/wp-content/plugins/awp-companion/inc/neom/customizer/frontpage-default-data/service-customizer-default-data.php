<?php
// if ( ! function_exists( 'NEOM_SERVICE_DEFAULT_CONTENT' ) ) :
// function NEOM_SERVICE_DEFAULT_CONTENT( $wp_customize ) {

// $neom_service_data = $wp_customize->get_setting( 'neom_service_content' );
// if ( ! empty( $neom_service_data ) ) {
// $neom_service_data->default =
define(
	'NEOM_SERVICE_DEFAULT_CONTENT',
	wp_json_encode(
		array(
			array(
				'image_url'  => awp_companion_plugin_url . '/inc/neom/img/portfolio-service-1.webp',
				'icon_value' => 'fa-shield',
				'title'      => esc_html__( 'Secure Business', 'neom' ),
				'subtitle'   => esc_html__( 'Cyber Security', 'neom' ),
				'subtitle2'  => esc_html__( 'A Trusted Partner', 'neom' ),
				'subtitle3'  => esc_html__( 'Application Security', 'neom' ),
				'text'       => esc_html__( 'Contrary to popular belief, Lorem ipsum is not simply random text. it has roots in a piece of classical Latin literature Contrary', 'neom' ),
				'text2'      => esc_html__( 'View More', 'neom' ),
				'link'       => '#',
				'id'         => 'customizer_repeater_service_001',
			),
			array(
				'image_url'  => awp_companion_plugin_url . '/inc/neom/img/portfolio-service-2.webp',
				'icon_value' => 'fa-envelope-o',
				'title'      => esc_html__( 'Facebook Ads', 'neom' ),
				'subtitle'   => esc_html__( 'Cyber Security', 'neom' ),
				'subtitle2'  => esc_html__( 'A Trusted Partner', 'neom' ),
				'subtitle3'  => esc_html__( 'Application Security', 'neom' ),
				'text'       => esc_html__( 'Contrary to popular belief, Lorem ipsum is not simply random text. it has roots in a piece of classical Latin literature Contrary', 'neom' ),
				'text2'      => esc_html__( 'View More', 'neom' ),
				'link'       => '#',
				'id'         => 'customizer_repeater_service_002',
			),
			array(
				'image_url'  => awp_companion_plugin_url . '/inc/neom/img/portfolio-service-3.webp',
				'icon_value' => 'fa-pie-chart',
				'title'      => esc_html__( 'Marketing Analytics', 'neom' ),
				'subtitle'   => esc_html__( 'Cyber Security', 'neom' ),
				'subtitle2'  => esc_html__( 'A Trusted Partner', 'neom' ),
				'subtitle3'  => esc_html__( 'Application Security', 'neom' ),
				'text'       => esc_html__( 'Contrary to popular belief, Lorem ipsum is not simply random text. it has roots in a piece of classical Latin literature Contrary', 'neom' ),
				'text2'      => esc_html__( 'View More', 'neom' ),
				'link'       => '#',
				'id'         => 'customizer_repeater_service_003',
			),
		)
	)
);
	// }
	// }
	// add_action( 'customize_register', 'NEOM_SERVICE_DEFAULT_CONTENT' );
	// endif;

