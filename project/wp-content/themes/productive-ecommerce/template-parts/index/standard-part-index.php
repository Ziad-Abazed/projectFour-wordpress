<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */

?>

<main id="site-content" class="site-content">
	
	<?php get_template_part( 'template-parts/index/standard-part-index-top', 'top' ); ?>
	
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
				<h1>
					<?php echo wp_kses_post( get_the_archive_title() ); ?>
    			</h1>
    			<?php get_template_part( 'template-parts/index/index-part-loop' ); ?>
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