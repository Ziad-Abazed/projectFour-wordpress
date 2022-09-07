<?php
/**
 * Part template
 *
 * @package productive-ecommerce
 */

$blog_name = get_bloginfo( 'name' );
$blog_desc = get_bloginfo( 'description' );
$productive_ecommerce_homepage_usp_textarea_1 = esc_textarea( get_theme_mod( 'productive_ecommerce_homepage_usp_textarea_1', $blog_name ) );
$productive_ecommerce_homepage_usp_textarea_2 = esc_textarea( get_theme_mod( 'productive_ecommerce_homepage_usp_textarea_2', $blog_desc ) );

$productive_ecommerce_homepage_usp_image = '';
$attachment_id = get_theme_mod( 'productive_ecommerce_homepage_usp_image', false );
$productive_ecommerce_homepage_usp_image = productive_ecommerce_get_attachment_by_thumbnail_id($attachment_id);

$productive_ecommerce_is_homepage_usp_scroll = get_theme_mod( 'productive_ecommerce_is_homepage_usp_scroll', false );
$parallax = '';
if ( ! $productive_ecommerce_is_homepage_usp_scroll ) {
    $parallax = 'parallax';
}

$homepage_page = '';
if ( is_home() ) {
    $homepage_page = ' home ';
}
?>

	 <?php // start customiser ?>
	 <div class="productive_ecommerce_hero_container <?php echo esc_attr( $homepage_page ); ?> <?php echo esc_attr( $parallax ); ?>"  style="background-image: url(<?php echo esc_url( $productive_ecommerce_homepage_usp_image ); ?>)">
		<div class="productive_ecommerce_hero_container_content">
			<?php if ( is_home() ) { ?>
				<div class="productive_ecommerce_hero_container_content_text top">
					<?php 
					if ( !empty($productive_ecommerce_homepage_usp_textarea_1) && $blog_name != $productive_ecommerce_homepage_usp_textarea_1 ) {
					  echo esc_html( $productive_ecommerce_homepage_usp_textarea_1 );
					} else {
					    echo esc_html( $blog_name );
					}
					?>
				</div>
				<div class="clear_min"></div>
				<div class="productive_ecommerce_hero_container_content_text bottom">
					<?php
					if ( !empty($productive_ecommerce_homepage_usp_textarea_2) && $blog_desc != $productive_ecommerce_homepage_usp_textarea_2 ) {
					    echo esc_html( $productive_ecommerce_homepage_usp_textarea_2 );
					} else {
					    echo esc_html( $blog_desc );
					}
					?>
				</div>
			<?php } else { ?>
				<div class="productive_ecommerce_hero_container_content_text top">
					<?php echo wp_kses_post( get_the_archive_title() ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php // end customiser ?>

<div class="site-container">
	
	<?php
      // homepage top sidebar widget.
	  do_action( 'display_homepage_content_widget_top', 'homepage_content_widget_top' );
	?>
	
	<?php // start blog loop on home page 
        get_template_part( 'template-parts/index/index-part-loop' ); 
    ?>
	
	<?php
	   // homepage bottom sidebar widget.
	   do_action( 'display_homepage_content_widget_bottom', 'homepage_content_widget_bottom' );
	?> 
</div>
	   
