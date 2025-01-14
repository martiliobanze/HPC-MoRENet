<?php
/**
 * Custom hooks functions are define about header section.
 *
 * @package News Portal Elementrix
 */

/*-----------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'news_portal_elementrix_top_header_start' ) ) :

	/**
	 * Top header start
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_top_header_start() {
		echo '<div class="np-top-header-wrap">';
		echo '<div class="mt-container">';
	}

endif;

if ( ! function_exists( 'news_portal_elementrix_top_left_section' ) ) :

	/**
	 * Top header left section
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_top_left_section() {
		$news_portal_elementrix_date_option = get_theme_mod( 'news_portal_elementrix_top_date_option', 'show' );
?>
		<div class="np-top-left-section-wrapper">
			<?php
				if ( $news_portal_elementrix_date_option == 'show' ) {
					echo '<div class="date-section">'. esc_html( date_i18n('l, F d, Y') ) .'</div>';
				}
			?>

			<?php if ( has_nav_menu( 'news_portal_elementrix_top_menu' ) ) { ?>
				<nav id="top-navigation" class="top-navigation" role="navigation">
					<?php
						wp_nav_menu( 
							array( 
								'theme_location' => 'news_portal_elementrix_top_menu', 
								'fallback_cb' => false, 
								'menu_id' => 'top-menu' 
							) 
						);
					?>
				</nav><!-- #site-navigation -->
			<?php } ?>
		</div><!-- .np-top-left-section-wrapper -->
<?php
	}

endif;

if ( ! function_exists( 'news_portal_elementrix_top_right_section' ) ) :

	/**
	 * Top header right section
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_top_right_section() {
?>
		<div class="np-top-right-section-wrapper">
			<?php
				$news_portal_elementrix_top_social_option = get_theme_mod( 'news_portal_elementrix_top_social_option', 'show' );
				if ( $news_portal_elementrix_top_social_option == 'show' ) {
					news_portal_elementrix_social_media();
				}
			?>
		</div><!-- .np-top-right-section-wrapper -->
<?php
	}

endif;

if ( ! function_exists( 'news_portal_elementrix_top_header_end' ) ) :

	/**
	 * Top header end
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_top_header_end() {
		echo '</div><!-- .mt-container -->';
		echo '</div><!-- .np-top-header-wrap -->';
	}

endif;

/**
 * Managed functions for top header hook
 *
 * @since 1.0.0
 */
add_action( 'news_portal_elementrix_top_header', 'news_portal_elementrix_top_header_start', 5 );
add_action( 'news_portal_elementrix_top_header', 'news_portal_elementrix_top_left_section', 10 );
add_action( 'news_portal_elementrix_top_header', 'news_portal_elementrix_top_right_section', 15 );
add_action( 'news_portal_elementrix_top_header', 'news_portal_elementrix_top_header_end', 20 );

/*-----------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'news_portal_elementrix_header_section_start' ) ) :

	/**
	 * header section start
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_header_section_start() {
		echo '<header id="masthead" class="site-header" role="banner">';
	}

endif;

if ( ! function_exists( 'news_portal_elementrix_header_logo_ads_section_start' ) ) :

	/**
	 * header logo and ads section start
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_header_logo_ads_section_start() {
		$news_portal_elementrix_header_bg_image = get_theme_mod( 'news_portal_elementrix_header_bg_image', '' );
		$header_style = '';
	    $header_class = '';
	    if( !empty( $news_portal_elementrix_header_bg_image ) ) {
	        $header_style = 'style="background-image:url('. esc_url( $news_portal_elementrix_header_bg_image ) .')"';
	        $header_class = 'has-bg-image';
	    }
		echo '<div class="np-logo-section-wrapper '. esc_attr( $header_class ) .' " '. $header_style .'>';
		echo '<div class="mt-container">';
	}

endif;

if ( ! function_exists( 'news_portal_elementrix_site_branding_section' ) ) :

	/**
	 * site branding section
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_site_branding_section() {
?>
		<div class="site-branding">

			<?php if ( the_custom_logo() ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div><!-- .site-logo -->
			<?php } ?>

			<?php
			if ( is_front_page() || is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
			
		</div><!-- .site-branding -->
<?php
	}

endif;

if ( ! function_exists( 'news_portal_elementrix_header_ads_section' ) ) :

	/**
	 * header ads area
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_header_ads_section() {
?>
		<div class="np-header-ads-area">
			<?php
				if ( is_active_sidebar( 'news_portal_elementrix_header_ads_area' ) ) {
					dynamic_sidebar( 'news_portal_elementrix_header_ads_area' );
				}
			?>
		</div><!-- .np-header-ads-area -->
<?php
	}

endif;

if ( ! function_exists( 'news_portal_elementrix_header_logo_ads_section_end' ) ) :

	/**
	 * header logo and ads section end
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_header_logo_ads_section_end() {
		echo '</div><!-- .mt-container -->';
		echo '</div><!-- .np-logo-section-wrapper -->';
	}

endif;


if ( ! function_exists( 'news_portal_elementrix_primary_menu_section' ) ) :

	/**
	 * header primary menu section
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_primary_menu_section() {
?>
		<div id="np-menu-wrap" class="np-header-menu-wrapper">
			<div class="np-header-menu-block-wrap">
				<div class="mt-container">
					<?php
						$news_portal_elementrix_home_icon_option = get_theme_mod( 'news_portal_elementrix_home_icon_option', 'show' );
						if ( $news_portal_elementrix_home_icon_option == 'show' ) {
					?>
							<div class="np-home-icon">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <i class="fa fa-home"> </i> </a>
							</div><!-- .np-home-icon -->
					<?php } ?>
					<div class="mt-header-menu-wrap">
						<a href="javascript:void(0)" class="menu-toggle hide"><i class="fa fa-navicon"> </i> </a>
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php
								wp_nav_menu( 
									array( 
										'theme_location' => 'news_portal_elementrix_primary_menu',
										'menu_id' => 'primary-menu'
									)
								);
							?>
						</nav><!-- #site-navigation -->
					</div><!-- .mt-header-menu-wrap -->
					<div class="mt-search-live-wrapper">
						<?php
							$news_portal_elementrix_search_icon_option = get_theme_mod( 'news_portal_elementrix_search_icon_option', 'show' );
							if ( $news_portal_elementrix_search_icon_option == 'show' ) {
						?>
							<div class="np-header-search-wrapper">
				                <span class="search-main"><a href="javascript:void(0)"><i class="fa fa-search"></i></a></span>
				                <div class="search-form-main np-clearfix">
					                <?php get_search_form(); ?>
					            </div>
							</div><!-- .np-header-search-wrapper -->
						<?php
							}

							$news_portal_elementrix_live_button_option = get_theme_mod( 'news_portal_elementrix_live_button_option', 'show' );
							if ( $news_portal_elementrix_live_button_option == 'show' ) {
								$news_portal_elementrix_live_button_label = get_theme_mod( 'news_portal_elementrix_live_button_label', __( 'live Now', 'news-portal-elementrix' ) );
								$news_portal_elementrix_live_button_url = get_theme_mod( 'news_portal_elementrix_live_button_url', '#' );
								if ( ! empty( $news_portal_elementrix_live_button_url ) ) {
						?>
									<div class="live-button-wrap">
										<a href="<?php echo esc_url( $news_portal_elementrix_live_button_url ); ?>"><?php echo esc_html( $news_portal_elementrix_live_button_label ); ?> <i class="fa fa-play"> </i></a>
									</div><!-- .live-button-wrap -->
						<?php
								}
							}
						?>
					</div>
				</div>
			</div>
		</div><!-- .np-header-menu-wrapper -->
<?php
	}

endif;

if ( ! function_exists( 'news_portal_elementrix_header_section_end' ) ) :

	/**
	 * header section end
	 *
	 * @since 1.0.0
	 */
	function news_portal_elementrix_header_section_end() {
		echo '</header><!-- .site-header -->';
	}

endif;

/**
 * Managed functions for header section
 *
 * @since 1.0.0
 */
add_action( 'news_portal_elementrix_header_section', 'news_portal_elementrix_header_section_start', 5 );
add_action( 'news_portal_elementrix_header_section', 'news_portal_elementrix_header_logo_ads_section_start', 10 );
add_action( 'news_portal_elementrix_header_section', 'news_portal_elementrix_site_branding_section', 15 );
add_action( 'news_portal_elementrix_header_section', 'news_portal_elementrix_header_ads_section', 20 );
add_action( 'news_portal_elementrix_header_section', 'news_portal_elementrix_header_logo_ads_section_end', 25 );
add_action( 'news_portal_elementrix_header_section', 'news_portal_elementrix_primary_menu_section', 30 );
add_action( 'news_portal_elementrix_header_section', 'news_portal_elementrix_header_section_end', 35 );