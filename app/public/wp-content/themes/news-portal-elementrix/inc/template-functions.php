<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package News Portal Elementrix
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function news_portal_elementrix_body_classes( $classes ) {

    global $post;
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    /**
     * Sidebar option for post/page/archive
     *
     * @since 1.0.0
     */
    if ( 'post' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'np_single_post_sidebar', true );
    }
    
    if ( 'page' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'np_single_post_sidebar', true );
    }
    
    if ( is_home() ) {
        $home_id = get_option( 'page_for_posts' );
        $sidebar_meta_option = get_post_meta( $home_id, 'np_single_post_sidebar', true );
    }
    
    if ( empty( $sidebar_meta_option ) || is_archive() || is_search() ) {
        $sidebar_meta_option = 'default_sidebar';
    }
    $archive_sidebar        = get_theme_mod( 'news_portal_elementrix_archive_sidebar', 'right_sidebar' );
    $post_default_sidebar   = get_theme_mod( 'news_portal_elementrix_default_post_sidebar', 'right_sidebar' );        
    $page_default_sidebar   = get_theme_mod( 'news_portal_elementrix_default_page_sidebar', 'right_sidebar' );
    if ( $sidebar_meta_option == 'default_sidebar' || $sidebar_meta_option == 'default-sidebar' ) {
        if ( is_single() ) {
            if ( $post_default_sidebar == 'right_sidebar' ) {
                $classes[] = 'right-sidebar';
            } elseif ( $post_default_sidebar == 'left_sidebar' ) {
                $classes[] = 'left-sidebar';
            } elseif ( $post_default_sidebar == 'no_sidebar' ) {
                $classes[] = 'no-sidebar';
            } elseif ( $post_default_sidebar == 'no_sidebar_center' ) {
                $classes[] = 'no-sidebar-center';
            }
        } elseif ( is_page() && !is_page_template( 'templates/home-template.php' ) ) {
            if ( $page_default_sidebar == 'right_sidebar' ) {
                $classes[] = 'right-sidebar';
            } elseif ( $page_default_sidebar == 'left_sidebar' ) {
                $classes[] = 'left-sidebar';
            } elseif ( $page_default_sidebar == 'no_sidebar' ) {
                $classes[] = 'no-sidebar';
            } elseif ( $page_default_sidebar == 'no_sidebar_center' ) {
                $classes[] = 'no-sidebar-center';
            }
        } elseif ( $archive_sidebar == 'right_sidebar' ) {
            $classes[] = 'right-sidebar';
        } elseif ( $archive_sidebar == 'left_sidebar' ) {
            $classes[] = 'left-sidebar';
        } elseif ( $archive_sidebar == 'no_sidebar' ) {
            $classes[] = 'no-sidebar';
        } elseif ( $archive_sidebar == 'no_sidebar_center' ) {
            $classes[] = 'no-sidebar-center';
        }
    } elseif ( $sidebar_meta_option == 'right_sidebar' ) {
        $classes[] = 'right-sidebar';
    } elseif ( $sidebar_meta_option == 'left_sidebar' ) {
        $classes[] = 'left-sidebar';
    } elseif ( $sidebar_meta_option == 'no_sidebar' ) {
        $classes[] = 'no-sidebar';
    } elseif ( $sidebar_meta_option == 'no_sidebar_center' ) {
        $classes[] = 'no-sidebar-center';
    }

    /**
     * option for web site layout 
     */
    $news_portal_elementrix_website_layout = esc_attr( get_theme_mod( 'news_portal_elementrix_site_layout', 'fullwidth_layout' ) );
    
    if ( !empty( $news_portal_elementrix_website_layout ) ) {
        $classes[] = $news_portal_elementrix_website_layout;
    }

    /**
     * Class for archive
     */
    if ( is_archive() ) {
        $news_portal_elementrix_archive_layout = get_theme_mod( 'news_portal_elementrix_archive_layout', 'classic' );
        if ( !empty( $news_portal_elementrix_archive_layout ) ) {
            $classes[] = 'archive-'.$news_portal_elementrix_archive_layout;
        }
    }

    return $classes;
}
add_filter( 'body_class', 'news_portal_elementrix_body_classes' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Register Google fonts for News Portal Elementrix.
 *
 * @return string Google fonts URL for the theme.
 * @since 1.0.0
 */
if ( ! function_exists( 'news_portal_elementrix_fonts_url' ) ) :
    function news_portal_elementrix_fonts_url() {
        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Poppins, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'news-portal-elementrix' ) ) {
            $font_families[] = 'Heebo:400,500,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'news-portal-elementrix' ) ) {
            $font_families[] = 'Roboto:300,400,400i,500,700';
        }
    

        if ( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles for only admin
 *
 * @since 1.0.0
 */
add_action( 'admin_enqueue_scripts', 'news_portal_elementrix_admin_scripts' );

function news_portal_elementrix_admin_scripts( $hook ) {

    global $news_portal_elementrix_version;

    if ( 'widgets.php' != $hook && 'customize.php' != $hook && 'edit.php' != $hook && 'post.php' != $hook && 'post-new.php' != $hook ) {
        return;
    }

    wp_enqueue_script( 'jquery-ui-button' );
    
    wp_enqueue_script( 'news-portal-admin-script', get_template_directory_uri() .'/assets/js/npe-admin-scripts.js', array( 'jquery' ), esc_attr( $news_portal_elementrix_version ), true );

    wp_enqueue_style( 'news-portal-admin-style', get_template_directory_uri() . '/assets/css/npe-admin-style.css', array(), esc_attr( $news_portal_elementrix_version ) );
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function news_portal_elementrix_scripts() {
    
    global $news_portal_elementrix_version;

    wp_enqueue_style( 'news-portal-elementrix-fonts', news_portal_elementrix_fonts_url(), array(), null );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

    wp_enqueue_style( 'news-portal-style', get_stylesheet_uri(), array(), esc_attr( $news_portal_elementrix_version ) );
    
    wp_enqueue_style( 'news-portal-responsive-style', get_template_directory_uri().'/assets/css/npe-responsive.css', array(), esc_attr( $news_portal_elementrix_version ) );

    wp_enqueue_script( 'news-portal-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), esc_attr( $news_portal_elementrix_version ), true );

    wp_enqueue_script( 'jquery-sticky', get_template_directory_uri(). '/assets/library/sticky/jquery.sticky.js', array( 'jquery' ), '20150416', true );

    wp_enqueue_script( 'news-portal-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), esc_attr( $news_portal_elementrix_version ), true );

    wp_enqueue_script( 'jquery-ui-tabs' );

    wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/sticky/theia-sticky-sidebar.min.js', array( 'jquery' ), '1.7.0', true );

    wp_register_script( 'news-portal-custom-script', get_template_directory_uri().'/assets/js/npe-custom-scripts.js', array('jquery'), esc_attr( $news_portal_elementrix_version ), true );

    $menu_sticky_option = get_theme_mod( 'news_portal_elementrix_menu_sticky_option', 'show' );
    $inner_sticky_option    = get_theme_mod( 'news_portal_elementrix_inner_sidebar_sticky_option', 'show' );

    wp_localize_script( 'news-portal-custom-script', 'mtObject', array(
        'menu_sticky'   => $menu_sticky_option,
        'inner_sticky'  => $inner_sticky_option
    ) );

    wp_enqueue_script( 'news-portal-custom-script' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'news_portal_elementrix_scripts' );

/*---------------------------------------------------------------------------------------------------------------*/

if ( !function_exists( 'news_portal_elementrix_social_media' ) ) :

    /**
     * Social media function
     *
     * @since 1.0.0
     */
    function news_portal_elementrix_social_media() {
        $get_social_media_icons     = get_theme_mod( 'social_media_icons', '' );
        $get_decode_social_media    = json_decode( $get_social_media_icons );
        if ( ! empty( $get_decode_social_media ) ) {
            echo '<div class="mt-social-icons-wrapper">';
            foreach ( $get_decode_social_media as $single_icon ) {
                $icon_class = $single_icon->social_icon_class;
                $icon_url = $single_icon->social_icon_url;
                if ( !empty( $icon_url ) ) {
                    echo '<span class="social-link"><a href="'. esc_url( $icon_url ) .'" target="_blank"><i class="'. esc_attr( $icon_class ) .'"></i></a></span>';
                }
            }
            echo '</div><!-- .mt-social-icons-wrapper -->';
        }
    }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if ( !function_exists( 'news_portal_elementrix_categories_lists' ) ) :

    /**
     * Category list
     *
     * @return array();
     */
    function news_portal_elementrix_categories_lists() {
        $news_portal_elementrix_categories = get_categories( array( 'hide_empty' => 1 ) );
        $news_portal_elementrix_categories_lists = array();
        foreach( $news_portal_elementrix_categories as $category ) {
            $news_portal_elementrix_categories_lists[absint( $category->term_id )] = esc_html( $category->name ) .' ('. absint( $category->count ) .')';
        }
        return $news_portal_elementrix_categories_lists;
    }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if ( !function_exists( 'news_portal_elementrix_categories_dropdown' ) ) :

    /**
     * Category dropdown
     *
     * @return array();
     */
    function news_portal_elementrix_categories_dropdown() {
        $news_portal_elementrix_categories = get_categories( array( 'hide_empty' => 1 ) );
        $news_portal_elementrix_categories_lists = array();
        $news_portal_elementrix_categories_lists['0'] = esc_html__( 'Select Category', 'news-portal-elementrix' );
        foreach( $news_portal_elementrix_categories as $category ) {
            $news_portal_elementrix_categories_lists[esc_attr( $category->term_id )] = esc_html( $category->name );
        }
        return $news_portal_elementrix_categories_lists;
    }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'news_portal_elementrix_css_strip_whitespace' ) ) :

    /**
     * Get minified css and removed space
     *
     * @since 1.0.0
     */
    function news_portal_elementrix_css_strip_whitespace( $css ) {
        $replace = array(
            "#/\*.*?\*/#s" => "",  // Strip C style comments.
            "#\s\s+#"      => " ", // Strip excess whitespace.
        );
        $search = array_keys( $replace );
        $css = preg_replace( $search, $replace, $css );

        $replace = array(
            ": "  => ":",
            "; "  => ";",
            " {"  => "{",
            " }"  => "}",
            ", "  => ",",
            "{ "  => "{",
            ";}"  => "}", // Strip optional semicolons.
            ",\n" => ",", // Don't wrap multiple selectors.
            "\n}" => "}", // Don't wrap closing braces.
            "} "  => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys( $replace );
        $css = str_replace( $search, $replace, $css );

        return trim( $css );
    }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'news_portal_elementrix_hover_color' ) ) :

    /**
     * Generate darker color
     * Source: http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
     *
     * @since 1.0.0
     */
    function news_portal_elementrix_hover_color( $hex, $steps ) {
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max( -255, min( 255, $steps ) );

        // Normalize into a six character long hex string
        $hex = str_replace( '#', '', $hex );
        if ( strlen( $hex ) == 3) {
            $hex = str_repeat( substr( $hex,0,1 ), 2 ).str_repeat( substr( $hex, 1, 1 ), 2 ).str_repeat( substr( $hex,2,1 ), 2 );
        }

        // Split into three parts: R, G and B
        $color_parts = str_split( $hex, 2 );
        $return = '#';

        foreach ( $color_parts as $color ) {
            $color   = hexdec( $color ); // Convert to decimal
            $color   = max( 0, min( 255, $color + $steps ) ); // Adjust color
            $return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code
        }

        return $return;
    }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

add_action( 'wp_head', 'news_portal_elementrix_dynamic_styles', 9999 );

if ( ! function_exists( 'news_portal_elementrix_dynamic_styles' ) ) :

    /**
     * Dynamic style about template
     *
     * @since 1.0.0
     */
    function news_portal_elementrix_dynamic_styles() {

        $get_categories = get_categories( array( 'hide_empty' => 1 ) );
        $news_portal_elementrix_theme_color = get_theme_mod( 'news_portal_elementrix_theme_color', '#870306' );
        $news_portal_elementrix_theme_secondary_color = get_theme_mod( 'news_portal_elementrix_theme_secondary_color', '#FFD600' );

        $news_portal_elementrix_site_title_option = get_theme_mod( 'news_portal_elementrix_site_title_option', 'true' );        
        $news_portal_elementrix_site_title_color = get_theme_mod( 'news_portal_elementrix_site_title_color', '#870306' );

        $output_css = '';

        foreach( $get_categories as $category ) {

            $cat_color          = get_theme_mod( 'news_portal_elementrix_category_color_'.strtolower( $category->slug ), '#870306' );

            $cat_hover_color    = news_portal_elementrix_hover_color( $cat_color, '-50' );
            $cat_id             = $category->term_id;
            
            if ( ! empty( $cat_color ) ) {
                $output_css .= ".category-button.np-cat-". esc_attr( $cat_id ) ." a { background: ". esc_attr( $cat_color ) ."}";

                $output_css .= ".category-button.np-cat-". esc_attr( $cat_id ) ." a:hover { background: ". esc_attr( $cat_hover_color ) ."}";

                $output_css .= ".np-block-title .np-cat-". esc_attr( $cat_id ) ." { color: ". esc_attr( $cat_color ) ."}";
            }
        }

        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.widget_search .search-submit,.edit-link .post-edit-link,.reply .comment-reply-link,.np-top-header-wrap,.np-header-menu-wrapper,#site-navigation ul.sub-menu,#site-navigation ul.children,.np-header-menu-wrapper::before,.np-header-menu-wrapper::after,.np-header-search-wrapper .search-form-main .search-submit,.widget-title::before,.np-related-title:before,.widget_block .wp-block-group__inner-container>h1:before,.widget_block .wp-block-group__inner-container>h2:before,.widget_block .wp-block-group__inner-container>h3:before,.widget_block .wp-block-group__inner-container>h4:before,.widget_block .wp-block-group__inner-container>h5:before,.widget_block .wp-block-group__inner-container>h6:before,.wp-block-search__label:before,.widget-title::after,.np-related-title:after,.widget_block .wp-block-group__inner-container>h1:after,.widget_block .wp-block-group__inner-container>h2:after,.widget_block .wp-block-group__inner-container>h3:after,.widget_block .wp-block-group__inner-container>h4:after,.widget_block .wp-block-group__inner-container>h5:after,.widget_block .wp-block-group__inner-container>h6:after,.wp-block-search__label:after,.np-archive-more .np-button:hover,.error404 .page-title,#np-scrollup,div.wpforms-container-full .wpforms-form input[type='submit'],div.wpforms-container-full .wpforms-form button[type='submit'],div.wpforms-container-full .wpforms-form .wpforms-page-button,div.wpforms-container-full .wpforms-form input[type='submit']:hover,div.wpforms-container-full .wpforms-form button[type='submit']:hover,div.wpforms-container-full .wpforms-form .wpforms-page-button:hover,.cvmm-block-title::before,.cvmm-block-title::after,.widget_tag_cloud .tagcloud a:hover,.widget.widget_tag_cloud a:hover{ background: ". esc_attr( $news_portal_elementrix_theme_color ) ."}\n";

        $output_css .= ".home .np-home-icon a, .np-home-icon a:hover, #site-navigation ul li:hover > a, #site-navigation ul li.current-menu-item > a, #site-navigation ul li.current_page_item > a, #site-navigation ul li.current-menu-ancestor > a, #site-navigation ul li.focus > a,.live-button-wrap a{ background: ". esc_attr( $news_portal_elementrix_theme_secondary_color ) ."}\n";

        $output_css .= "a,a:hover,a:focus,a:active,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.entry-footer a:hover,.comment-author .fn .url:hover,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,#top-footer .widget a:hover,#top-footer .widget a:hover:before,#top-footer .widget li:hover:before,#footer-navigation ul li a:hover,.np-post-meta span:hover,.np-post-meta span a:hover,.np-post-title.small-size a:hover,.entry-title a:hover,.entry-meta span a:hover,.entry-meta span:hover{ color: ". esc_attr( $news_portal_elementrix_theme_color ) ."}\n";
        
        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.widget_search .search-submit,.np-archive-more .np-button:hover,
        .widget_tag_cloud .tagcloud a:hover,.widget.widget_tag_cloud a:hover{ border-color: ". esc_attr( $news_portal_elementrix_theme_color ) ."}\n";

        $output_css .= ".comment-list .comment-body,.np-header-search-wrapper .search-form-main { border-top-color: ". esc_attr( $news_portal_elementrix_theme_color ) ."}\n";
        
        $output_css .= ".np-header-search-wrapper .search-form-main:before { border-bottom-color: ". esc_attr( $news_portal_elementrix_theme_color ) ."}\n";

        $output_css .= "@media (max-width: 768px) { #site-navigation,.main-small-navigation li.current-menu-item > .sub-toggle i { background: ". esc_attr( $news_portal_elementrix_theme_color ) ." !important } }\n";

        if ( $news_portal_elementrix_site_title_option == 'false' ) {
            $output_css .=".site-title, .site-description {
                        position: absolute;
                        clip: rect(1px, 1px, 1px, 1px);
                    }\n";
        } else {
            $output_css .=".site-title a, .site-description {
                        color:". esc_attr( $news_portal_elementrix_site_title_color ) .";
                    }\n";
        }

        $refine_output_css = news_portal_elementrix_css_strip_whitespace( $output_css );

        echo "<!--News Portal Elementrix CSS -->\n<style type=\"text/css\">\n". $refine_output_css ."\n</style>";
    }

endif;

/*---------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'news_portal_elementrix_get_sidebar' ) ) :

    /**
     * Function define about page/post/archive sidebar
     *
     * @since 1.0.0
     */
    function news_portal_elementrix_get_sidebar() {
        global $post;

        if ( 'post' === get_post_type() ) {
            $sidebar_meta_option = get_post_meta( $post->ID, 'np_single_post_sidebar', true );
        }

        if ( 'page' === get_post_type() ) {
            $sidebar_meta_option = get_post_meta( $post->ID, 'np_single_post_sidebar', true );
        }
         
        if ( is_home() ) {
            $set_id = get_option( 'page_for_posts' );
            $sidebar_meta_option = get_post_meta( $set_id, 'np_single_post_sidebar', true );
        }
        
        if ( empty( $sidebar_meta_option ) || is_archive() || is_search() ) {
            $sidebar_meta_option = 'default_sidebar';
        }
        
        $archive_sidebar      = get_theme_mod( 'news_portal_elementrix_archive_sidebar', 'right_sidebar' );
        $post_default_sidebar = get_theme_mod( 'news_portal_elementrix_default_post_sidebar', 'right_sidebar' );
        $page_default_sidebar = get_theme_mod( 'news_portal_elementrix_default_page_sidebar', 'right_sidebar' );
        
        if ( $sidebar_meta_option == 'default_sidebar' || $sidebar_meta_option == 'default-sidebar' ) {
            if ( is_single() ) {
                if ( $post_default_sidebar == 'right_sidebar' ) {
                    get_sidebar();
                } elseif ( $post_default_sidebar == 'left_sidebar' ) {
                    get_sidebar( 'left' );
                }
            } elseif ( is_page() ) {
                if ( $page_default_sidebar == 'right_sidebar' ) {
                    get_sidebar();
                } elseif ( $page_default_sidebar == 'left_sidebar' ) {
                    get_sidebar( 'left' );
                }
            } elseif ( $archive_sidebar == 'right_sidebar' ) {
                get_sidebar();
            } elseif ( $archive_sidebar == 'left_sidebar' ) {
                get_sidebar( 'left' );
            }
        } elseif ( $sidebar_meta_option == 'right_sidebar' ) {
            get_sidebar();
        } elseif ( $sidebar_meta_option == 'left_sidebar' ) {
            get_sidebar( 'left' );
        }
    }

endif;

/*------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'news_portal_elementrix_font_awesome_social_icon_array' ) ) :

    /**
     * Define font awesome social media icons
     *
     * @return array();
     * @since 1.0.0
     */
    function news_portal_elementrix_font_awesome_social_icon_array() {
        return array(
            "fa fa-facebook-square","fa fa-facebook-f","fa fa-facebook","fa fa-facebook-official","fa fa-twitter-square","fa fa-twitter","fa fa-yahoo","fa fa-google","fa fa-google-wallet","fa fa-google-plus-circle","fa fa-google-plus-official","fa fa-instagram","fa fa-linkedin-square","fa fa-linkedin","fa fa-pinterest-p","fa fa-pinterest","fa fa-pinterest-square","fa fa-google-plus-square","fa fa-google-plus","fa fa-youtube-square","fa fa-youtube","fa fa-youtube-play","fa fa-vimeo","fa fa-vimeo-square", "fa fa-github", "fa fa-github-alt", "fa fa-github-square", "fa fa-skype", "fa fa-vk", "fa fa-whatsapp", "fa fa-slack"
        );
    }

endif;

/*---------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'news_portal_elementrix_archive_read_more_button' ) ) :

    /**
     * function to show the read more button
     */
    function news_portal_elementrix_archive_read_more_button() {
        $news_portal_elementrix_archive_read_more_text = get_theme_mod( 'news_portal_elementrix_archive_read_more_text', __( 'Continue Reading', 'news-portal-elementrix' ) );
        if ( !empty( $news_portal_elementrix_archive_read_more_text ) ) {
            echo '<span class="np-archive-more"><a href="'. esc_url( get_the_permalink() ) .'" class="np-button"><i class="fa fa-arrow-circle-o-right"></i>'. esc_html( $news_portal_elementrix_archive_read_more_text ) .'</a></span>';
        }
    }

endif;

/*---------------------------------------------------------------------------------------------------------------*/

add_filter( 'wp_kses_allowed_html', 'news_portal_elementrix_required_data_attributes' , 10, 4 );

if ( ! function_exists( 'news_portal_elementrix_required_data_attributes' ) ) :
    
    /**
     * Added required attributes while using wp_kses by using `wp_kses_allowed_html` filter.
     *
     * @since 1.1.19
     */
    function news_portal_elementrix_required_data_attributes( $required_attributes, $context ) {

        $required_attributes['time']['class'] = true;
        $required_attributes['time']['datetime'] = true;

        return $required_attributes;
    }

endif;

if ( ! function_exists( 'news_portal_elementrix_get_posts_details' ) ) {
    
    /**
     * function to return post's details for manage the archive layout
     *
     * @return array
     *
     * @since 1.2.8
     */
    function news_portal_elementrix_get_posts_details() {
        global $wp_query;
        $total_posts_count = $wp_query->found_posts;
        $page_posts_count = $wp_query->post_count;
        $post_current_count = $wp_query->current_post;
        return array(
            'total_posts_count' => $total_posts_count,
            'page_posts_count'  => $page_posts_count,
            'post_current_count' => $post_current_count
        );
    }

}