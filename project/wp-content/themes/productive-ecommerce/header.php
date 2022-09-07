<?php
/**
 * Header page.
 *
 * @package    productive-ecommerce
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	
	<?php wp_body_open(); ?>
	<?php productive_ecommerce_body_open(); ?>
	
	<?php
		$show_mini_cart = false;
		$flex_full = ' flex-content-100 ';
		$flex_header_nav_searchbox = ' flex-content-100 ';
		$flex_header_nav_cart = ' ';
    	if ( productive_ecommerce_is_woocommerce_activated() ) {
    		$show_mini_cart = true;
    		$flex_full  = ' flex-content-100 ';
    		$flex_header_nav_cart = ' flex-content-30 ';
    		$flex_header_nav_searchbox = ' flex-content-70 ';
    	}
    	
    	$site_container_no_logo = '';
    	if ( !has_custom_logo() ) {
    	    $site_container_no_logo = 'site-container-no-logo';
    	}
	?>
	
	<header class="site-header">
	
		<div class="site-container <?php echo esc_attr( $site_container_no_logo );?>">
			
			 <div class="site-header-logo">
				
				 <div class="float_left">
				 	<?php if ( !has_custom_logo() ) { ?>
    					<div class="site-header-logo-text-name">
        					<a class="logo" href="<?php echo esc_url( home_url() ); ?>" >
        						<?php bloginfo( 'name' ); ?>
        					</a>
    					</div>
    					<div class="site-header-logo-text-desc">
        					<a class="logo" href="<?php echo esc_url( home_url() ); ?>" >
        						<?php bloginfo( 'description' ); ?>
        					</a>
    					</div>
					<?php } else { ?>
						
						<?php the_custom_logo(); ?>
						
					<?php } ?>
				</div>
				
				<div class="float_right"> 
				
    				<?php if ( $show_mini_cart ) { ?>
    				<span class="show_in_small_screen_only header-minicart-mobile">
    					
    				 	<?php if ( is_user_logged_in() ) { ?>
    						<a title="<?php esc_attr_e( 'Logout', 'productive-ecommerce'); ?>" class="righted ten_right_padding" href="<?php echo esc_url( wp_logout_url( home_url() )); ?>">
    							<i class="material-icons-round minicart">logout</i> 
    						</a>
    					<?php } else { ?>
    						<a title="<?php esc_attr_e( 'Login', 'productive-ecommerce') ?>" class="righted ten_right_padding" href="<?php echo esc_url( wp_login_url() ); ?>">
    							<i class="material-icons-round minicart">account_circle</i>
    						</a>
    					<?php } ?>
    					
    					<a title="<?php esc_attr_e( 'Shopping Basket', 'productive-ecommerce'); ?>"  class="righted" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
    						<i class="material-icons-round minicart">shopping_cart</i>
    						<span class="minicart-count"><?php echo count( WC()->cart->get_cart() ); ?></span>
    					</a>
    					
    				</span>
    				<?php } ?>
    				
    				<!-- nav icon -->
    				<button class="site-header-menu-icon show_in_small_screen_only">
    					<i class="material-icons-round">menu</i>
    					<span class="screen-reader-text"><?php esc_html_e('Menu', 'productive-ecommerce'); ?></span>
    				</button>
    				
    				<div class="clear_min"></div>
				</div>
				
				<div class="clear_min"></div>
			 </div>
			
			 <div class="site-header-main">
				 <div class="flex-content-container">
    				
					<?php if ( $show_mini_cart ) { ?>
					
						<?php $header_search_enabled = get_theme_mod( 'productive_ecommerce_enable_header_search', true ); ?>
    					<?php if ( $header_search_enabled ) { ?>
    									
    						 <div class="<?php echo esc_attr( $flex_header_nav_searchbox ); ?> search-box">
    							<?php
    								get_search_form(
    									array( 
    									    'arial_label' => __( 'Search...', 'productive-ecommerce' ), 
    									)
    							    );
    							?>
    						</div>
    					<?php } else { ?>
    					
        					<div class="flex-content-70"></div>
    					
    					<?php } ?>
					
						 <div class="<?php echo esc_attr( $flex_header_nav_cart ); ?> header-minicart">
        						 	
						 	<?php if ( is_user_logged_in() ) { ?>
    							<a title="<?php esc_attr_e( 'Logout', 'productive-ecommerce'); ?>" class="righted" href="<?php echo esc_url( wp_logout_url( home_url() )); ?>">
    								<i class="material-icons-round minicart">logout</i> 
    							</a>
							<?php } else { ?>
    							<a title="<?php esc_attr_e( 'Login', 'productive-ecommerce') ?>" class="righted" href="<?php echo esc_url( wp_login_url() ); ?>">
    								<i class="material-icons-round minicart">account_circle</i>
    							</a>
							<?php } ?>
							 
							<a title="<?php esc_attr_e( 'Shopping Basket', 'productive-ecommerce'); ?>" class="righted" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
								<i class="material-icons-round minicart">shopping_cart</i>
								<span class="minicart-count"><?php echo count( WC()->cart->get_cart() ); ?></span>
							</a>
							
						 </div>
					<?php } else { ?>
						<div class="flex-content-70"></div>
					<?php } ?>
					
				 </div>
				 
			 	<div class="clear_min"></div>
			 </div>
			
			 <div class="clear_min"></div>
			
			 <div class="show_in_small_screen_only menu-nav">
				<?php do_action( 'display_productive_ecommerce_header_nav', 'site-header-nav site-header-nav-smallscreen' ); ?>
			 </div>
			
			<div class="clear_min"></div>
			
		</div>
        
        <div class="clear_min"></div>
        
        <div class="site-container site-container-no-grid">
        <?php do_action( 'display_productive_ecommerce_header_nav', $flex_full . ' site-header-nav site-header-nav-bigscreen' ); ?>
        </div>
        				
		<div class="clear_min"></div>
		
	</header>
	
