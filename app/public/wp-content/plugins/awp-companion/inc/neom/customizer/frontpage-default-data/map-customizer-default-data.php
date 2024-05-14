<?php
	define(
		'NEOM_MAP_DEFAULT_CONTENT',
		json_encode(
			array(
				array(
					'icon_value' => 'fa fa-phone',
					'title'      => esc_html__( 'Phone', 'neom' ),
					'subtitle'   => esc_html__( '+21-3652-56247, +21-8540-54109', 'neom' ),
					'text'       => esc_html__( 'lorem ipsum dolar sit', 'neom' ),
				),
				array(
					'icon_value' => 'fa fa-envelope',
					'title'      => esc_html__( 'Email', 'neom' ),
					'subtitle'   => esc_html__( 'support@example.com', 'neom' ),
					'text'       => '',
				),
				array(
					'icon_value' => 'fa fa-map-marker',
					'title'      => esc_html__( 'Address', 'neom' ),
					'subtitle'   => esc_html__( '25, Mia Drive, Calibry Florida 890012.USA', 'neom' ),
					'text'       => '',
				),
				array(
					'icon_value' => 'fa fa-clock-o',
					'title'      => esc_html__( 'Our Opening Hours', 'neom' ),
					'subtitle'   => esc_html__( 'Monday-Friday 8.00am - 6.00pm', 'neom' ),
					'text'       => esc_html__( 'Saturday 9.00am - 2.00pm', 'neom' ),
				),
			)
		)
	);

