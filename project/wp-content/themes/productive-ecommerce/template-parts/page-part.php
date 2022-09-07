<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */

while ( have_posts() ) : ?>

	<?php the_post(); ?>
	
	<?php if ( has_post_thumbnail() ) : ?>
		
		<?php
    		$thumbnail_image = productive_ecommerce_get_attachment_by_thumbnail_id( get_post_thumbnail_id(), 'full', PRODUCTIVE_ECOMMERCE_HOMEPAGE_USP_IMAGE_REMOTE );
		?>
		<div class="main-top-featured-content">
		   <div class="main-top-featured-image" style="background-image: url(<?php echo esc_url( $thumbnail_image ); ?>)">
				  <div>
					  <h1><span class="main-product-title"><?php esc_html( the_title() ); ?></span></h1>
				  </div>
		   </div>
	   </div>
	   <div class="breadcrumb-container-standard">
			<?php
			     do_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			?>
	   </div>
	   <?php else : ?>
	   <div class="breadcrumb-container-standard">
			<?php
			   do_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			?>
			<h1 class="wc-page-title"><?php esc_html( the_title() ); ?></h1>
		</div>
	<?php endif; ?>
	
	<?php // post attributes. ?>
	<?php if ( is_single() && get_post_type() == 'post' ) { ?>
		<div class="blog-post-attributes">
			
			<div class="blog-post-attributes-author">    			
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" ><?php echo esc_html( get_the_author() ); ?></a>
				- <?php esc_html( the_date() ); ?>
			</div>
			
			<?php if ( has_category() ) { ?>
			<div class="blog-post-attributes-category">
				<?php echo 'Posted in '; ?>
				<?php the_category( ' | ' ); ?>
			</div>
			<?php } ?>
		</div> 
	<?php } ?>
	
	
	<div <?php post_class(); ?> id="post-<?php echo esc_attr( the_ID() ); ?>">
		<?php the_content(); ?>
	</div>
	
	<?php
	  // hide pagination & comments for woocommerce product details.
	if ( ! productive_ecommerce_is_product() ) {

		   wp_link_pages();

		if ( is_single() ) {
			get_template_part( 'template-parts/prev-next' );
		}

		if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
			comments_template( '/comments.php' );
		}
	}
	?>

<?php endwhile; ?>
