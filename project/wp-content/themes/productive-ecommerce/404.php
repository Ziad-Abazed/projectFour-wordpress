<?php
/**
 * 404 Page
 *
 * @package productive-ecommerce
 *
 * .htaccess ErrorDocument 404 /wordpress/index.php?error=404
 */

?>

<?php get_header(); ?>

	<main id="site-content" class="site-content">
		<div class="site-container fifty_top_bottom_padding centered">
			   <h1 class="wc-page-title"><?php echo esc_html__( 'Page Not Found', 'productive-ecommerce' ); ?></h1>
				
			   <h2><?php echo esc_html__( 'We did not find the page you were looking for.', 'productive-ecommerce' ); ?></h2>
			
			   <h3><a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html__( 'Homepage', 'productive-ecommerce' ); ?></a></h3>
			
			   <div class="twenty_top_padding four-o-four-container">
				<?php
					get_search_form(
						array(
							'arial_label' => esc_html__( 'Search...', 'productive-ecommerce' ),
						)
					);
					?>
				
			   </div>
		</div>
	</main>
	
<?php get_footer(); ?>
