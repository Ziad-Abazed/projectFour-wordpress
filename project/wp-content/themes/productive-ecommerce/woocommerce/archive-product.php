<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;
?>

<?php get_header( 'shop' ); ?>

<main id="site-content" class="site-content">
	<div class="site-container">
		<div class="flex-content-container">
		
		<?php
		$productive_ecommerce_template_layout_options = get_theme_mod( 'productive_ecommerce_template_layout_options', 'one_column' );
		$main_css_class = 'flex-content-100';
		$side_css_class = 'flex-content-20';

		if ( 'two_columns_left' == $productive_ecommerce_template_layout_options ) {

			$main_css_class = 'flex-content-70';
			$side_css_class = 'flex-content-30';
			$productive_ecommerce_template_layout_options = 'two_columns_left';

		} else if ( 'two_columns_right' == $productive_ecommerce_template_layout_options ) {

			$main_css_class = 'flex-content-70';
			$side_css_class = 'flex-content-30';
			$productive_ecommerce_template_layout_options = 'two_columns_right';

		} else if ( 'three_columns' == $productive_ecommerce_template_layout_options ) {

			$main_css_class = 'flex-content-60';
			$side_css_class = 'flex-content-20';
			$productive_ecommerce_template_layout_options = 'three_columns';

		}

		?>
			
			<?php
			// left sidebar.
			if ( 'two_columns_left' == $productive_ecommerce_template_layout_options || 'three_columns' == $productive_ecommerce_template_layout_options ) {
				do_action( 'display_sidebar_left', $side_css_class );
			}
			?>
			
			<!-- main content -->
			<div class="<?php echo esc_attr( $main_css_class ); ?>">
				<?php get_template_part( 'woocommerce/page-part-product-archive' ); ?>
			</div>
			
			<?php
			// right sidebar.
			if ( 'two_columns_right' == $productive_ecommerce_template_layout_options || 'three_columns' == $productive_ecommerce_template_layout_options ) {
				do_action( 'display_sidebar_right', $side_css_class );
			}
			?>
			
		</div>
	</div>
</main>

<?php get_footer( 'shop ' ); ?>

