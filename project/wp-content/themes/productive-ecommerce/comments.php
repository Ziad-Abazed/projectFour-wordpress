<?php
/**
 * Comments Page
 *
 * @package productive-ecommerce
 */

if ( post_password_required() ) {
	return;
}
?>

<?php
if ( $comments ) {
	$comments_number = absint( get_comments_number() );
	$comments_per_page = 5;
	?>
	<div class="post-comments" id="comments">
		
		<div class="comments-header">
			<h2 class="comments-title">
			<?php
			if ( ! have_comments() ) {
				echo esc_html_e( 'Leave a comment', 'productive-ecommerce' );
			} else {
				echo esc_html_e( 'Comments on ', 'productive-ecommerce' ) . esc_html( get_the_title() ) . ' (' . esc_html( number_format_i18n( $comments_number ) ) . ')';
			}
			?>
			</h2>
		</div>
		
		<div class="comments-body">
			<div class="comments-body-list">
			<?php
			wp_list_comments(
				array(
					'walker' => null,
					'avatar_size' => 100,
					'style' => 'div',
					'per_page' => $comments_per_page,
				)
			);
			?>
			</div>
			
			<?php
				$total = $comments_number / $comments_per_page;
			if ( $comments_number % $comments_per_page > 0 ) {
				++$total;
			}

			if ( $total > 0 ) {
				?>
				<div class="comments-body-nav">
				<?php
					$pagination = paginate_comments_links(
						array(
							'total' => $total,
							'end_size' => 0,
							'prev_text' => 'Older',
							'next_text' => 'Newer',
							'add_fragment' => '#comments',
							'echo' => false,
						)
					);
					echo wp_kses_post( $pagination );
				?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>


<div class="post-comments-reply" id="post-comments-reply">
	<?php
	if ( comments_open() || pings_open() ) {
		?>
	
		<?php comment_form( array() ); ?>
	
	<?php } else { ?>
	
		<div class=""><?php esc_html__( 'Comments are closed', 'productive-ecommerce' ); ?> </div>
	
	<?php } ?>
</div>
