<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */

while ( have_posts() ) : ?>

	<?php the_post(); ?>
	
	<?php
	   do_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	?>
	
	<h1 class="wc-page-title"><?php esc_html( the_title() ); ?></h1>
	
	<div <?php post_class(); ?> id="post-<?php echo esc_attr( the_ID() ); ?>">
		<?php the_content(); ?>
	</div>
	
<?php endwhile; ?>
