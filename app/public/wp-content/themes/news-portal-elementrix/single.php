<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package News Portal Elementrix
 */

get_header(); ?>

<div class="mt-single-content-wrapper">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation();

			/**
		     * news_portal_elementrix_related_posts hook
		     *
		     * @hooked - news_portal_elementrix_related_posts_start - 5
		     * @hooked - news_portal_elementrix_related_posts_section - 10
		     * @hooked - news_portal_elementrix_related_posts_end - 15
		     *
		     * @since 1.0.0
		     */
		    do_action( 'news_portal_elementrix_related_posts' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php news_portal_elementrix_get_sidebar(); ?>

</div><!-- .mt-single-content-wrapper -->

<?php
get_footer();