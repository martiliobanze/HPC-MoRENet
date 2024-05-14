<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package News Portal Elementrix
 */

$extra_post_class = '';
if ( ! has_post_thumbnail() ) {
	$extra_post_class = 'no-image';
}

$post_details = news_portal_elementrix_get_posts_details();
$post_current_count = $post_details['post_current_count'];

if ( $post_current_count % 5 == 0 ) {
	echo '<div class="np-archive-classic-post-wrapper">';
} else {
	if ( $post_current_count %5 == 1 ) {
		echo '<div class="np-archive-grid-post-wrapper np-clearfix">';
	}
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $extra_post_class ) ); ?>>	

	<div class="np-article-thumb">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'full' ); ?>
		</a>
	</div><!-- .np-article-thumb -->

	<div class="np-archive-post-content-wrapper">
		<header class="entry-header">
			<?php			
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				if ( 'post' === get_post_type() ) :
			?>
					<div class="entry-meta">
						<?php news_portal_elementrix_inner_posted_on(); ?>
					</div><!-- .entry-meta -->
			<?php
				endif;
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_excerpt();
				news_portal_elementrix_archive_read_more_button();
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php news_portal_elementrix_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .np-archive-post-content-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( $post_current_count % 5 == 0 ) {
	echo '</div><!-- .np-archive-classic-post-wrapper -->';
} else {
	if ( $post_current_count %5 == 4 || $post_current_count == $post_details['page_posts_count']-1 ) {
		echo '</div><!-- .np-archive-grid-post-wrapper -->';
	}
}