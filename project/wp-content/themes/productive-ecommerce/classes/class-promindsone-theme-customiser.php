<?php
/**
 * Theme Customiser
 *
 * This file is used to customise theme features, including
 * Homepage content
 * Footer copyright
 * Search box visibility in header
 * Layout options
 * number of columns per row to display in archive pages
 *
 * @package productive-ecommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
    die();
}

if ( ! class_exists( 'PromindsOne_Theme_Customiser' ) ) {
    
    /**
     * PromindsOne_Theme_Customiser
     */
    class PromindsOne_Theme_Customiser {
        
        /**
         * Register the customizer
         *
         * @param WP_Customize_Manager $wp_customise Param.
         */
        public static function register( $wp_customise ) {
            
            // first, add a productive_ecommerce_theme_options panel for the theme.
            $wp_customise->add_panel(
                'productive_ecommerce_theme_options',
                array(
                    'title' => esc_html__( 'Theme Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Customisable theme options', 'productive-ecommerce' ),
                    'priority' => 20,
                )
                );
            
            // first, add a productive_ecommerce_go_pro for the theme.
            $wp_customise->add_section(
                'productive_ecommerce_go_pro',
                array(
                    'title' => esc_html__( 'Get Pro Version', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Get Pro Version', 'productive-ecommerce' ),
                    'priority' => 10,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a productive_ecommerce_theme_header for the theme.
            $wp_customise->add_section(
                'productive_ecommerce_theme_header',
                array(
                    'title' => esc_html__( 'Header Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Header options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 10,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a productive_ecommerce_footer_options for the theme.
            $wp_customise->add_section(
                'productive_ecommerce_footer_options',
                array(
                    'title' => esc_html__( 'Footer Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Footer options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 20,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a productive_ecommerce_homepage_options for the theme.
            $wp_customise->add_section(
                'productive_ecommerce_homepage_options',
                array(
                    'title' => esc_html__( 'Homepage Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Homepage options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 30,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a productive_ecommerce_layout_options for the theme.
            $wp_customise->add_section(
                'productive_ecommerce_layout_options',
                array(
                    'title' => esc_html__( 'Layout Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Layout options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 40,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // first, add a productive_ecommerce_archive_options for the theme.
            $wp_customise->add_section(
                'productive_ecommerce_archive_options',
                array(
                    'title' => esc_html__( 'Archive Page(s) Options', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Archive page(s) options', 'productive-ecommerce' ),
                    'panel' => 'productive_ecommerce_theme_options',
                    'priority' => 50,
                    'capability' => 'edit_theme_options',
                )
                );
            
            // add a setting for productive_ecommerce_enable_header_search control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_enable_header_search',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_checkbox'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_enable_header_search',
                array(
                    'type' => 'checkbox',
                    'priority' => 10,
                    'section' => 'productive_ecommerce_theme_header',
                    'label' => esc_html__( 'Enable Header Search?', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Enable search box in the header', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
            // add a setting for productive_ecommerce_items_per_row_to_display, below.
            $wp_customise->add_setting(
                'productive_ecommerce_items_per_row_to_display',
                array(
                    'type' => 'theme_mod',
                    'default' => '4',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_absint'),
                )
                );
            
            // add control.
            $wp_customise->add_control(
                'productive_ecommerce_items_per_row_to_display',
                array(
                    'type' => 'number',
                    'priority' => 20,
                    'section' => 'productive_ecommerce_archive_options',
                    'label' => esc_html__( 'Number of posts/pages per row', 'productive-ecommerce' ),
                    'description' => esc_html__( '3 or more for best result', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page'
                )
                );
            
            // add a setting for productive_ecommerce_posts_placeholder_image control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_posts_placeholder_image',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_image'),
                )
                );
            
            // add control.
            $wp_customise->add_control(
                new WP_Customize_Media_Control(
                    $wp_customise,
                    'productive_ecommerce_posts_placeholder_image',
                    array(
                        'priority' => 30,
                        'section' => 'productive_ecommerce_archive_options',
                        'label' => esc_html__( 'Placeholder image', 'productive-ecommerce' ),
                        'description' => esc_html__( 'An image that shows as thumbnail if a post does not have one', 'productive-ecommerce' ),
                        // 'active_callback' => 'is_front_page'
                    )
                    )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_image control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_usp_image',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_image'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                new WP_Customize_Media_Control(
                    $wp_customise,
                    'productive_ecommerce_homepage_usp_image',
                    array(
                        'priority' => 10,
                        'section' => 'productive_ecommerce_homepage_options',
                        'label' => esc_html__( 'Homepage baackground image', 'productive-ecommerce' ),
                        'description' => esc_html__( 'The main background image in the homepage', 'productive-ecommerce' ),
                    )
                    )
                );
            
            // add a setting for productive_ecommerce_is_homepage_usp_scroll control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_is_homepage_usp_scroll',
                array(
                    'type' => 'theme_mod',
                    'default' => false,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_checkbox'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_is_homepage_usp_scroll',
                array(
                    'type' => 'checkbox',
                    'priority' => 20,
                    'section' => 'productive_ecommerce_homepage_options',
                    'label' => esc_html__( 'Scroll background image?', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Image scrolls or behaves fixed as in parallax effect.', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
            // add a setting for productive_ecommerce_show_homepage_blog_excerpts control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_show_homepage_blog_excerpts',
                array(
                    'type' => 'theme_mod',
                    'default' => true,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_checkbox'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_show_homepage_blog_excerpts',
                array(
                    'type' => 'checkbox',
                    'priority' => 25,
                    'section' => 'productive_ecommerce_homepage_options',
                    'label' => esc_html__( 'Show Homepage Posts?', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Show latest blog posts in homepage', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page',
                )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_textarea_1, below.
            $blog_name = get_bloginfo( 'name' );
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_usp_textarea_1',
                array(
                    'type' => 'theme_mod',
                    'default' => $blog_name,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_usp_textarea_1',
                array(
                    'type' => 'textarea',
                    'priority' => 30,
                    'section' => 'productive_ecommerce_homepage_options',
                    'label' => esc_html__( 'Homepage text 1 (above search box)', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Leave empty for blank', 'productive-ecommerce' ),
                    // 'active_callback' => 'is_front_page'
                )
                );
            
            // add a setting for productive_ecommerce_homepage_usp_textarea_2, below.
            $blog_desc = get_bloginfo( 'description' );
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_usp_textarea_2',
                array(
                    'type' => 'theme_mod',
                    'default' => $blog_desc,
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_usp_textarea_2',
                array(
                    'type' => 'textarea',
                    'priority' => 40,
                    'section' => 'productive_ecommerce_homepage_options',
                    'label' => esc_html__( 'Homepage text 2 (below search box)', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Leave empty for blank', 'productive-ecommerce' ),
                )
                );
            
            // add a setting for productive_ecommerce_footer_copyright_textarea control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_footer_copyright_textarea',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( 'A WordPress theme by ', 'productive-ecommerce' ) . '<a target="_blank" href="' . esc_url( PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_WEBSITE ) . '">' . esc_attr( PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_NAME ) . '</a>',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                )
                );
            
            if ( PRODUCTIVE_ECOMMERCE_PRODUCT_DOWNLOAD_TYPE != 'product' ) {
                
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_footer_copyright_textarea',
                    array(
                        'type' => 'hidden',
                        'priority' => 10,
                        'section' => 'productive_ecommerce_footer_options',
                        'label' => esc_html__( 'Pro only feature', 'productive-ecommerce' ),
                        'description' => '<a href="' . esc_url( PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_WEBSITE ) . '">' . esc_html__( 'Get Pro here', 'productive-ecommerce' ) . '</a> ' . esc_html__( ' to remove or change the Copyright text', 'productive-ecommerce' ),
                    )
                    );
            } else {
                
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_footer_copyright_textarea',
                    array(
                        'type' => 'textarea',
                        'priority' => 10,
                        'section' => 'productive_ecommerce_footer_options',
                        'label' => esc_html__( 'Footer copyright content', 'productive-ecommerce' ),
                        'description' => esc_html__( 'Leave blank for no copyright info', 'productive-ecommerce' ),
                    )
                    );
                
            }
            
            // add a setting for productive_ecommerce_template_layout_options control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_template_layout_options',
                array(
                    'type' => 'theme_mod',
                    'default' => 'one_column',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_select'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_template_layout_options',
                array(
                    'type' => 'radio',
                    'priority' => 10,
                    'section' => 'productive_ecommerce_layout_options',
                    'label' => esc_html__( 'Layout options for templates', 'productive-ecommerce' ),
                    'description' => '',
                    'choices' => array(
                        'one_column' => esc_html__( 'One Column', 'productive-ecommerce' ),
                        'two_columns_left' => esc_html__( 'Two Column Left Sidebar', 'productive-ecommerce' ),
                        'two_columns_right' => esc_html__( 'Two Column Right Sidebar', 'productive-ecommerce' ),
                        'three_columns' => esc_html__( 'Three columns', 'productive-ecommerce' ),
                    ),
                )
                );
            
            // add a setting for productive_ecommerce_sidebar_left_header_text control, below.
            $wp_customise->add_setting(
                'productive_ecommerce_sidebar_left_header_text',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Info',
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_no_html'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_sidebar_left_header_text',
                array(
                    'type' => 'text',
                    'priority' => 20,
                    'section' => 'productive_ecommerce_layout_options',
                    'label' => 'Small screen left sidebar header',
                    'description' => 'Text to display on small screens left sidebar header',
                    // 'active_callback' => 'is_front_page'
                )
                );
            
            
            // add a setting for productive_ecommerce_homepage_usp_textarea_2, below.
            $wp_customise->add_setting(
                'productive_ecommerce_homepage_blog_heading',
                array(
                    'type' => 'theme_mod',
                    'default' => esc_html__( 'Latest Blog', 'productive-ecommerce' ),
                    'theme_supports' => '',
                    'transport' => 'refresh',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_no_html'),
                )
                );
            
            // add control..
            $wp_customise->add_control(
                'productive_ecommerce_homepage_blog_heading',
                array(
                    'type' => 'text',
                    'priority' => 44,
                    'section' => 'productive_ecommerce_homepage_options',
                    'label' => esc_html__( 'Homepage Blog Heading', 'productive-ecommerce' ),
                    'description' => esc_html__( 'Homepage blog excerpts heading', 'productive-ecommerce' ),
                )
                );
            
            
            
            
            // start callouts
            // add a setting for productive_ecommerce_pro_callout_1, below.
            $productive_ecommerce_pro_callout_1_label = esc_attr( 'Get more features with PRO', 'productive-ecommerce' );
            $productive_ecommerce_pro_callout_1_desc = '<a target="_blank" class="get-pro-button" href="' .
                esc_url( PRODUCTIVE_ECOMMERCE_THEME_DEVELOPER_WEBSITE_URL ) . '">' .
                esc_html__( 'PRO Version Features...', 'productive-ecommerce' ) . '</a> ';
            $productive_ecommerce_pro_callout_1_demo = '<a target="_blank" class="get-pro-button" href="' .
                esc_url( PRODUCTIVE_ECOMMERCE_THEME_DEMO_URL ) . '">' .
                esc_html__( 'See a Live Demo', 'productive-ecommerce' ) . '</a> ';
            
             $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_header',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_header',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_theme_header',
                        'label' => $productive_ecommerce_pro_callout_1_label,
                        'description' => $productive_ecommerce_pro_callout_1_desc,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_header_demo',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_header_demo',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_theme_header',
                        'label' => '',
                        'description' => $productive_ecommerce_pro_callout_1_demo,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_homepage_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_homepage_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_homepage_options',
                        'label' => $productive_ecommerce_pro_callout_1_label,
                        'description' => $productive_ecommerce_pro_callout_1_demo,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_footer_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_footer_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_footer_options',
                        'label' => $productive_ecommerce_pro_callout_1_label,
                        'description' => $productive_ecommerce_pro_callout_1_desc,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_layout_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_layout_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_layout_options',
                        'label' => $productive_ecommerce_pro_callout_1_label,
                        'description' => $productive_ecommerce_pro_callout_1_demo,
                    )
                    );
                
                $wp_customise->add_setting(
                    'productive_ecommerce_pro_callout_archive_options',
                    array(
                        'type' => 'theme_mod',
                        'default' => '',
                        'theme_supports' => '',
                        'transport' => 'refresh',
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => array(__CLASS__, 'productive_ecommerce_sanitize_html'),
                    )
                    );
                // add control..
                $wp_customise->add_control(
                    'productive_ecommerce_pro_callout_archive_options',
                    array(
                        'type' => 'hidden',
                        'priority' => 200,
                        'section' => 'productive_ecommerce_archive_options',
                        'label' => $productive_ecommerce_pro_callout_1_label,
                        'description' => $productive_ecommerce_pro_callout_1_desc,
                    )
                    );
                // end callouts
                
                
        }
        
        /**
         * Method productive_ecommerce_sanitize_checkbox ''.
         *
         * @param boolean $checked ''.
         *
         * @return boolean ''.
         */
        public static function productive_ecommerce_sanitize_checkbox( $checked ) {
            return ( ( isset( $checked ) && true == $checked ) ?  true : false );
        }
        
        /**
         * Method productive_ecommerce_sanitize_select ''.
         *
         * @param string $input ''.
         * @param object $setting ''.
         *
         * @return string Input or default.
         */
        public static function productive_ecommerce_sanitize_select( $input, $setting ) {
            $input = sanitize_key( $input );
            $choices = $setting->manager->get_control( $setting->id )->choices;
            return ( ( array_key_exists( $input, $choices ) ) ? $input : $setting->default );
        }
        
        /**
         * Method productive_ecommerce_sanitize_html ''.
         *
         * @param string $html ''.
         *
         * @return string Sanitized version of the $html param.
         */
        public static function productive_ecommerce_sanitize_html( $html ) {
            return wp_filter_post_kses( $html );
        }
        
        /**
         * Method productive_ecommerce_sanitize_no_html ''.
         *
         * @param string $text ''.
         *
         * @return string ''.
         */
        public static function productive_ecommerce_sanitize_no_html( $text ) {
            return wp_filter_nohtml_kses( $text );
        }
        
        /**
         * Method productive_ecommerce_sanitize_url ''.
         *
         * @param string $url ''.
         *
         * @return string Sanitized version of the $url param.
         */
        public static function productive_ecommerce_sanitize_url( $url ) {
            return esc_url_raw( $url );
        }
        
        /**
         * Method productive_ecommerce_sanitize_absint ''.
         *
         * @param int $number ''.
         * @param object $setting ''.
         *
         * @return string Sanitized version of the $number or setting default.
         */
        public static function productive_ecommerce_sanitize_absint( $number, $setting ) {
            $number = absint( $number );
            
            return ( $number ? $number : $setting->default );
        }
        
        /**
         * Method productive_ecommerce_sanitize_image ''.
         *
         * @param string $image ''.
         * @param object $setting ''.
         *
         * @return string ''.
         */
        public static function productive_ecommerce_sanitize_image( $image, $setting ) {
            
            $mimes = array(
                'jpg|jpeg|jpe'    => 'image/jpeg',
                'png'             => 'image/png',
                'gif'             => 'image/gif',
                'bmp'             => 'image/bmp',
                'tif/tiff'        => 'image/tiff',
                'ico'             => 'image/x-icon'
            );
            
            $file = wp_check_filetype( $image, $mimes );
            
            if ( null != $file && array_key_exists('ext', $file) ) {
                return $image;
            } else {
                return $setting->default;
            }
            
        }
        
        
    } // end of class.
    
    // add hook for the class.
    add_action( 'customize_register', array( 'PromindsOne_Theme_Customiser', 'register' ) );
    
}
