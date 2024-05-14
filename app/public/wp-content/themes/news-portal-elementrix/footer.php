<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News Portal Elementrix
 */

?>
	</div> <!-- mt-container -->
	</div><!-- #content -->

	<?php
		/**
	     * news_portal_elementrix_footer hook
	     * @hooked - news_portal_elementrix_footer_start - 5
	     * @hooked - news_portal_elementrix_footer_widget_section - 10
	     * @hooked - news_portal_elementrix_bottom_footer_start - 15
	     * @hooked - news_portal_elementrix_footer_site_info_section - 20
	     * @hooked - news_portal_elementrix_footer_menu_section - 25
	     * @hooked - news_portal_elementrix_bottom_footer_end - 30
	     * @hooked - news_portal_elementrix_footer_end - 35
	     *
	     * @since 1.0.0
	     */
	    do_action( 'news_portal_elementrix_footer' );
	?>
</div><!-- #page -->

<?php

	/**
     * news_portal_elementrix_after_page hook
     *
     * @since 1.0.0
     */
    do_action( 'news_portal_elementrix_after_page' );

    wp_footer();

?>

</body>
</html>