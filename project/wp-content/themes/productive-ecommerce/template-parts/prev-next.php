<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */

?>
<?php
	$prev = get_previous_post();
	$next = get_next_post();

if ( $prev || $next ) {
	?>

	<div class="flex-content-container-fixed fifty_top_bottom_padding">
		<div class="flex-content-fixed-50 prev-post-link">
		<?php
		if ( $prev ) {
               $fallback_image = productive_ecommerce_get_placeholder_image();
               $thumbnail_image = productive_ecommerce_get_attachment_by_thumbnail_id( get_post_thumbnail_id( $prev->ID ), 'thumbnail', $fallback_image );
    		?>
				<a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>">
					<span class="">
						<i class="material-icons-round txt_three_rem darkgreyed">west</i>
						<img src="<?php echo esc_url( $thumbnail_image ); ?>" alt="" />
					</span>
				</a>
			<?php } ?>
		</div>
		
		<div class="flex-content-fixed-50 next-post-link righted">
			<?php
			if ( $next ) {
				$fallback_image = productive_ecommerce_get_placeholder_image();
				$thumbnail_image_next = productive_ecommerce_get_attachment_by_thumbnail_id( get_post_thumbnail_id( $next->ID ), 'thumbnail', $fallback_image );
				?>
				<a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
					<span class="">
						<img src="<?php echo esc_url( $thumbnail_image_next ); ?>" alt="" /> 
						<i class="material-icons-round txt_three_rem darkgreyed">east</i>
					</span>
				</a>
			<?php } ?>
		</div>
	
	</div>

	<?php
}
?>
