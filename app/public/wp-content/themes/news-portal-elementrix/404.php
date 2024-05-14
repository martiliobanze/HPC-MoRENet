<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package News Portal Elementrix
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'news-portal-elementrix' ); ?></h1>
				</header><!-- .page-header -->
				<div class="error-num"> <?php esc_html_e( '404', 'news-portal-elementrix' ); ?> <span><?php esc_html_e( 'error', 'news-portal-elementrix' );?></span> </div>
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'news-portal-elementrix' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();