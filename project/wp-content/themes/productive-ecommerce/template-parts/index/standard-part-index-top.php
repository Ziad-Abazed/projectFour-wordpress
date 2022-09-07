<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */
?>

<?php
$post_thumbnail_id = get_theme_mod( 'productive_ecommerce_homepage_usp_image' );
$thumbnail_image = productive_ecommerce_get_attachment_by_thumbnail_id( $post_thumbnail_id, 'full', PRODUCTIVE_ECOMMERCE_HOMEPAGE_USP_IMAGE_REMOTE );

$productive_ecommerce_is_homepage_usp_scroll = get_theme_mod( 'productive_ecommerce_is_homepage_usp_scroll', false );
$parallax = '';
if ( ! $productive_ecommerce_is_homepage_usp_scroll ) {
	$parallax = 'parallax';
}
?>

<div class="productive_ecommerce_hero_container <?php echo esc_html( $parallax ); ?>"  style="background-image: url(<?php echo esc_url( $thumbnail_image ); ?>)">
	<div class="productive_ecommerce_hero_container_content">
	
	<div class="productive_ecommerce_hero_container_content_text top">
		<?php //echo wp_kses_post( get_the_archive_title() ); ?>
	</div>
		
	</div>
</div>
