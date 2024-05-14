<?php
/**
 * Customizer callbacks functions. 
 * 
 * @package News Portal Elementrix
 */




if ( ! function_exists( 'news_portal_elementrix_cb_live_button' ) ) :

    /**
     * Check if live button switch are show or hide.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function news_portal_elementrix_cb_live_button( $control ) {
        if ( 'hide' !== $control->manager->get_setting( 'news_portal_elementrix_live_button_option' )->value() ) {
            return true;
        } else {
            return false;
        }
    }
    
endif;

if ( ! function_exists( 'news_portal_elementrix_cb_footer_widget' ) ) :

    /**
     * Check footer widget switch are show or hide.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function news_portal_elementrix_cb_footer_widget( $control ) {
        if ( 'hide' !== $control->manager->get_setting( 'news_portal_elementrix_footer_widget_option' )->value() ) {
            return true;
        } else {
            return false;
        }
    }
    
endif;