<?php
/**
 * The woocommerce php file contain all woocommerce-based customisation and functions
 *
 * @package    productive-ecommerce
 */

/**
 * Method woocommerce functions.
 *
 * @return boolean
 */
function productive_ecommerce_is_woocommerce_activated() {
    return class_exists( 'woocommerce' );
}

/**
 * Method
 *
 * @return boolean
 */
function productive_ecommerce_is_shop() {
    if ( productive_ecommerce_is_woocommerce_activated() ) {
        return is_shop();
    } else {
        return false;
    }
}


/**
 * Method productive_ecommerce_is_product.
 *
 * @return boolean
 */
function productive_ecommerce_is_product() {
    if ( productive_ecommerce_is_woocommerce_activated() ) {
        return is_product();
    } else {
        return false;
    }
}


/**
 * Method productive_ecommerce_is_product_category.
 *
 * @return boolean
 */
function productive_ecommerce_is_product_category() {
    if ( productive_ecommerce_is_woocommerce_activated() ) {
        return is_product_category();
    } else {
        return false;
    }
}

/**
 * Method productive_ecommerce_is_woocommerce_page.
 *
 * @return boolean ''
 */
function productive_ecommerce_is_woocommerce_page() {
    if ( productive_ecommerce_is_woocommerce_activated() ) {
        return is_shop() || is_product() || is_product_category();
    } else {
        return false;
    }
}


if ( productive_ecommerce_is_woocommerce_activated() ) {
    /**
     * Woocommerce Support.
     */
    function productive_ecommerce_woocommerce_theme_support() {
        add_theme_support(
            'woocommerce',
            array(
                'product_grid'   => array(
                    'default_rows'    => 3,
                    'min_rows'        => 2,
                    'max_rows'        => 8,
                    'default_columns' => 5,
                    'min_columns'     => 2,
                    'max_columns'     => 5,
                ),
            )
            );
    }
    // hook for woocommerce support.
    // disable below hook to use custom templates completely.
    // when enabled, woocommerce's template hierarchy will be used.
    // add_action('after_setup_theme', 'productive_ecommerce_woocommerce_theme_support'); //.
    
    
    if ( ! function_exists( 'productive_ecommerce_get_output_related_products_args' ) ) {
        /**
         * Method get products - change number of related products to show.
         *
         * @param array $args ''.
         *
         * @return array
         */
        function productive_ecommerce_get_output_related_products_args( $args ) {
            
            $args['posts_per_page'] = productive_ecommerce_get_items_per_row_to_display(); // total number of related products to get.
            $args['columns'] = productive_ecommerce_get_items_per_row_to_display(); // number of column.
            return $args;
        }
    }
    add_action( 'woocommerce_output_related_products_args', 'productive_ecommerce_get_output_related_products_args', 20 );
    
    
    if ( ! function_exists( 'productive_ecommerce_get_woocommerce_upsell_display_args' ) ) {
        /**
         *
         * Method get products - change number of upsell products to show.
         *
         * @param array $args ''.
         *
         * @return array
         */
        function productive_ecommerce_get_woocommerce_upsell_display_args( $args ) {
            
            $args['posts_per_page'] = productive_ecommerce_get_items_per_row_to_display(); // total number of related products to get.
            $args['columns'] = productive_ecommerce_get_items_per_row_to_display(); // number of columns.
            return $args;
        }
    }
    add_action( 'woocommerce_upsell_display_args', 'productive_ecommerce_get_woocommerce_upsell_display_args', 20 );
    
    
    /**
     * Method enable featured image.
     */
    function productive_ecommerce_setup_woocommerce() {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
    add_action( 'after_setup_theme', 'productive_ecommerce_setup_woocommerce' );
    
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    
    add_action('woocommerce_before_main_content', 'productive_ecommerce_woocommerce_theme_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'productive_ecommerce_woocommerce_theme_wrapper_end', 10);
    
    function productive_ecommerce_woocommerce_theme_wrapper_start() {
        // Wrap in theme container for product details page only
        if ( productive_ecommerce_is_product() ) {
            echo '<div id="site-content" class="site-content">';
            echo '<div class="site-container">';
        }
    }
    
    function productive_ecommerce_woocommerce_theme_wrapper_end() {
        // Wrap in theme container for product details page only
        if ( productive_ecommerce_is_product() ) {
            echo '</div>';
            echo '</div>';
        }
    }
    
}








