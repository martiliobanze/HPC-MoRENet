<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package News Portal Elementrix
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="np-article-thumb">
		<?php the_post_thumbnail( 'full' ); ?>
	</div><!-- .np-article-thumb -->

	<header class="entry-header">
		<?php 
			the_title( '<h1 class="entry-title">', '</h1>' );
			news_portal_elementrix_single_post_categories_list();
		?>
		<div class="entry-meta">
			<?php news_portal_elementrix_inner_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'news-portal-elementrix' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'news-portal-elementrix' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php news_portal_elementrix_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->