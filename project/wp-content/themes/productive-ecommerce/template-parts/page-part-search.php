<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */

?>
<?php $productive_ecommerce_get_items_per_row_to_display = productive_ecommerce_get_items_per_row_to_display(); ?>

<div class="homepage-block-container">
	<div class="productive_ecommerce_section columns-<?php echo esc_attr( $productive_ecommerce_get_items_per_row_to_display ); ?>">
		<div class="products-grid products columns-<?php echo esc_attr( $productive_ecommerce_get_items_per_row_to_display ); ?>">
            <?php while ( have_posts() ) : ?>
            	<?php the_post(); ?>
            	<div class="product search-result-page">
                	<div class="the_search_item">
                		  <div class="the_search_thumbnail search-result-post-type-container">
                			<a href="<?php echo esc_url( get_permalink() ); ?>">
                    			<?php
                    			if ( has_post_thumbnail() ) {
                    				the_post_thumbnail( 'thumbnail' );
                    			} else {
                    				do_action( 'display_placeholder_image' );
                    			}
                    			?>
                    		</a>
                    		<div class="search-result-post-type">
                    			<?php echo get_post_type(); ?>
                    		</div>
                		</div>
                		<?php
                        	$post_format = get_post_format();
                        	if ( 'status' != $post_format && 'aside' != $post_format ) {
                        		?>
                        		<div class="the_search_title">
                        			<?php
                        			 echo '<h3><a href="' . esc_url( get_permalink() ) . '">' . esc_html( wp_trim_words( get_the_title(), 4 ) ) . '</a></h3>';
                        			?>
                        		</div>
                        		<?php
                        	}
                        ?>			
                		<div class="the_search_excerpt">
                			<?php
                				echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) );
                			?>
                		</div>
                	</div>
                </div>
            <?php endwhile; ?>
            <div class="clear_min"></div>
		</div>
		<div class="clear_min"></div>
	</div> 
</div>