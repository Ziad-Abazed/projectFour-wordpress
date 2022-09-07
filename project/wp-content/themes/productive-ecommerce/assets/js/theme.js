/**
 * Main theme js
 *
 * @package productive-ecommerce
 */

$ = jQuery.noConflict();

jQuery( document ).ready(
	function($) {

		// header menu on small screens.
		$( '.site-header-menu-icon' ).on(
			'click',
			function() {
				$( '.site-header-nav-smallscreen' ).slideToggle(
					"slow",
					function() {

					}
				);
			}
		);

		// when hovering on page list item.
		$( 'ul.products li' ).hover(
			function() {
				$( this ).addClass( "page-ul-products-hover", 1000 );
			},
			function() {
					$( this ).removeClass( "page-ul-products-hover", 1000 );
			}
		);

		// when hovering on page list item.
		$( 'ul.wc-block-grid__products li' ).hover(
			function() {
				$( this ).addClass( "page-ul-products-hover", 1000 );
			},
			function() {
				$( this ).removeClass( "page-ul-products-hover", 1000 );
			}
		);

		// left sidebar header.
		$( '.sidebar_left_header' ).on(
			'click',
			function() {
				$( '.sidebar_left' ).slideToggle(
					"slow",
					function() {
						$( '.sidebar_left_header .add_circle' ).toggle();
						$( '.sidebar_left_header .remove_circle' ).toggle();
					}
				);
			}
		);




		/**
		 * BIG_SCREEN HEADER MENU NAV
		 */
		
		/**
		 * Header menu, when '#promindsone-header-nav' set on parent ul.
		 */
		// initially hide menu children.
		$( '.site-header .site-header-nav-bigscreen ul#promindsone-header-nav > li' ).children( "ul" ).addClass( "noned" );
		$( '.site-header .site-header-nav-bigscreen ul#promindsone-header-nav > li > ul li' ).children( "ul" ).addClass( "noned" );
		// add arrow down as neccessary.
		$( '.site-header .site-header-nav-bigscreen ul#promindsone-header-nav > li > ul' ).parent().children( "a" ).append( '<button><i class="material-icons-round header-nav">expand_more</i><span class="screen-reader-text">Sub Menu</span></button>' );
		$( '.site-header .site-header-nav-bigscreen ul#promindsone-header-nav li > ul li > ul' ).parent().children( "a" ).append( '<button><i class="material-icons-round header-nav">chevron_right</i><span class="screen-reader-text">Sub Menu</span></button>' );
		
		$( '.site-header .site-header-nav-bigscreen ul#promindsone-header-nav > li a button' ).on('click',
				function(e) {
					e.preventDefault();
					$( this ).parent().parent().siblings().children( "ul" ).slideUp();
					$( this ).parent().parent().children( "ul" ).animate().slideToggle(
						"slow",
						function() {

						}
					);
				}
			);
		
		/**
		 * Header menu, when '#promindsone-header-nav' set on parent div.
		 */
		// initially hide menu children.
		$( '.site-header .site-header-nav-bigscreen div#promindsone-header-nav ul > li' ).children( "ul" ).addClass( "noned" );
		// add arrow down as neccessary.
		$( '.site-header .site-header-nav-bigscreen div#promindsone-header-nav ul > li > ul' ).parent().append( '<button class="site-header-menu-icon show_in_small_screen_only float_right"><i class="material-icons-round header-nav">expand_more</i><span class="screen-reader-text">Sub Menu</span></button>' );
		$( '.site-header .site-header-nav-bigscreen div#promindsone-header-nav ul li > ul li > ul' ).parent().append( '<button class="site-header-menu-icon show_in_small_screen_only float_right"><i class="material-icons-round header-nav">chevron_right</i><span class="screen-reader-text">Sub Menu</span></button>' );
			
		$( '.site-header .site-header-nav-bigscreen div#promindsone-header-nav ul > li a button' ).on('click',
			function(e) {
				e.preventDefault();
				$( this ).parent().parent().siblings().children( "ul" ).slideUp();
				$( this ).parent().parent().children( "ul" ).animate().slideToggle(
					"slow",
					function() {

					}
				);
			}
		);
		

		/**
		 * SMALL_SCREEN HEADER MENU NAV
		 */
		
		/**
		 * Header menu, when '#promindsone-header-nav' set on parent ul.
		 */
		// initially hide menu children.
		$( '.site-header .site-header-nav-smallscreen ul#promindsone-header-nav > li' ).children( "ul" ).addClass( "noned" );
		$( '.site-header .site-header-nav-smallscreen ul#promindsone-header-nav > li > ul li' ).children( "ul" ).addClass( "noned" );
		// add arrow down as neccessary.
		$( '.site-header .site-header-nav-smallscreen ul#promindsone-header-nav > li > ul' ).parent().children( "a" ).append( '<button><i class="material-icons-round header-nav">expand_more</i><span class="screen-reader-text">Sub Menu</span></button>' );
		$( '.site-header .site-header-nav-smallscreen ul#promindsone-header-nav li > ul li > ul' ).parent().children( "a" ).append( '<button><i class="material-icons-round header-nav">expand_more</i><span class="screen-reader-text">Sub Menu</span></button>' );
		
		$( '.site-header .site-header-nav-smallscreen ul#promindsone-header-nav > li a button' ).on('click',
				function(e) {
					e.preventDefault();
					$( this ).parent().parent().siblings().children( "ul" ).slideUp();
					$( this ).parent().parent().children( "ul" ).slideToggle(
						"slow",
						function() {

						}
					);
				}
			);
		
		/**
		 * Header menu, when '#promindsone-header-nav' set on parent div.
		 */
		// initially hide menu children.
		$( '.site-header .site-header-nav-smallscreen div#promindsone-header-nav ul > li' ).children( "ul" ).addClass( "noned" );
		// add arrow down as neccessary.
		$( '.site-header .site-header-nav-smallscreen div#promindsone-header-nav ul > li > ul' ).parent().append( '<button class="site-header-menu-icon show_in_small_screen_only float_right"><i class="material-icons-round header-nav">expand_more</i><span class="screen-reader-text">Sub Menu</span></button>' );
		$( '.site-header .site-header-nav-smallscreen div#promindsone-header-nav ul li > ul li > ul' ).parent().append( '<button class="site-header-menu-icon show_in_small_screen_only float_right"><i class="material-icons-round header-nav">expand_more</i><span class="screen-reader-text">Sub Menu</span></button>' );
			
		$( '.site-header .site-header-nav-smallscreen div#promindsone-header-nav ul > li a button' ).on('click',
			function(e) {
				e.preventDefault();
				$( this ).parent().parent().siblings().children( "ul" ).slideUp();
				$( this ).parent().parent().children( "ul" ).slideToggle(
					"slow",
					function() {

					}
				);
			}
		);
		
	}
);
