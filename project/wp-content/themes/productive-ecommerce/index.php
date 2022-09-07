<?php
/**
 * Index Page
 *
 * @package    productive-ecommerce
 */

?>

<?php get_header(); ?>

	<?php if ( is_home() ) { ?>
	
		<main id="site-content" class="site-content home">
			<?php get_template_part( 'template-parts/index/home-part-index' ); ?>
		</main>
		
	<?php } else { ?>
	
			<?php get_template_part( 'template-parts/index/standard-part-index' ); ?>
			
	<?php } ?>
	
<?php get_footer(); ?>
