<?php
// if ( ! function_exists( 'NEOM_ABOUT_DEFAULT_CONTENT' ) ) :
// function NEOM_ABOUT_DEFAULT_CONTENT( $wp_customize ) {

// $neom_about_data = $wp_customize->get_setting( 'neom_about_content' );
// if ( ! empty( $neom_about_data ) ) {
// $neom_about_data->default =
define(
	'NEOM_ABOUT_DEFAULT_CONTENT',
	wp_json_encode(
		array(
			array(
				'title'  => esc_html__( 'SEO Marketing', 'neom' ),
				'number' => 51,
				'link'   => '#',
				'id'     => 'customizer_repeater_features_001',
			),
			array(
				'title'  => esc_html__( 'Web Design', 'neom' ),
				'number' => 72,
				'link'   => '#',
				'id'     => 'customizer_repeater_features_002',
			),
			array(
				'title'  => esc_html__( 'Features Addons', 'neom' ),
				'number' => 63,
				'link'   => '#',
				'id'     => 'customizer_repeater_features_003',
			),
			array(
				'title'  => esc_html__( 'Cloud Host', 'neom' ),
				'number' => 84,
				'link'   => '#',
				'id'     => 'customizer_repeater_features_004',
			),
		)
	)
);
	// }
	// }
	// add_action( 'customize_register', 'NEOM_ABOUT_DEFAULT_CONTENT' );
	// endif;

