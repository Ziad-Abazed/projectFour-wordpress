/**
 * Form ajax js
 *
 * @package productive-ecommerce
 */

/*
$ = jQuery.noConflict();
$( document ).ready(
		function() {
			$( '.todo_dom' ).on(
					'click',
					function(e) {
						e.preventDefault();
						var id = $( this ).attr( 'todo_id' );
						$.ajax(
								{
									type : 'POST',
									data : {
										action : 'todo_action',
										id : id,
									},
									url : productive_ecommerce_admin_js_url_name.ajax_admin_url,
									success : function(data, status, xhr) {
										var response = JSON.parse( data );
										if ( response.response == 'success' ) {
											// coming soon
										} else {
											// coming soon
										}

									}
								}
						);
					}
			);

		}
);
*/
