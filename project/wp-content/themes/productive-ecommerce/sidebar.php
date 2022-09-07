<?php
/**
 * The function php file contain all theme-based customisation and functions
 * 
 * @package    productive-ecommerce
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
