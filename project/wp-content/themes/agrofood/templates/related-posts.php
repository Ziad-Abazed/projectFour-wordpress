<?php 
global $post;
$blog_thumb_size = 'agrofood_blog_thumb';

$cat_list = get_the_category($post->ID);
$cat_ids = array();
foreach( $cat_list as $cat ){
	$cat_ids[] = $cat->term_id;
}
$cat_ids = implode(',', $cat_ids);

if( strlen($cat_ids) > 0 ){
	$args = array(
		'post_type' => $post->post_type
		,'cat' => $cat_ids
		,'post__not_in' => array($post->ID)
		,'posts_per_page'	=> 5
	);
}
else{
	$args = array(
		'post_type' => $post->post_type
		,'post__not_in' => array($post->ID)
		,'posts_per_page'	=> 5
	);
}

/* Remove the quote post format */
$args['tax_query'] = array(
	array(
		'taxonomy'	=> 'post_format'
		,'field'	=> 'slug'
		,'terms'    => array( 'post-format-quote' )
		,'operator'	=> 'NOT IN'
	)
);

$related_posts = new WP_Query($args);
	
if( $related_posts->have_posts() ){
	$is_slider = true;
	if( isset($related_posts->post_count) && $related_posts->post_count <= 1 ){
		$is_slider = false;
	}
?>
	<div class="ts-blogs ts-shortcode related-posts related ts-slider <?php echo esc_attr($is_slider?'loading':''); ?>">
		<header class="theme-title">
			<h3 class="heading-title"><?php esc_html_e('Related posts', 'agrofood'); ?></h3>
		</header>
		<div class="content-wrapper">
			<div class="blogs items">
				<?php 
				while( $related_posts->have_posts() ): $related_posts->the_post();
				
				$post_format = get_post_format(); /* Video, Audio, Gallery, Quote */
				if( $is_slider && $post_format == 'gallery' ){ /* Remove Slider in Slider */
					$post_format = false;
				}
				$show_thumbnail = in_array($post_format, array('gallery', 'standard', 'video', 'audio', 'quote', false));
				?>
				<article class="item <?php echo esc_attr($post_format); ?> <?php echo has_post_thumbnail()?'has-post-thumbnail':'';?>">
					<div class="article-content">
						<?php if( $show_thumbnail ): ?>
						<div class="thumbnail-content">
						
							<?php if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' ){ ?>
								<a class="thumbnail <?php echo esc_attr($post_format); ?> <?php echo ('gallery' == $post_format)?'loading':''; ?>" href="<?php echo ('gallery' == $post_format)?'javascript: void(0)':get_permalink() ?>">
									<figure>
									<?php 
									
									if( $post_format == 'gallery' ){
										$gallery = get_post_meta($post->ID, 'ts_gallery', true);
										$gallery_ids = explode(',', $gallery);
										if( is_array($gallery_ids) && has_post_thumbnail() ){
											array_unshift($gallery_ids, get_post_thumbnail_id());
										}
										foreach( $gallery_ids as $gallery_id ){
											echo wp_get_attachment_image( $gallery_id, $blog_thumb_size );
										}
										if( empty($gallery_ids) ){
											$show_thumbnail = false;
										}
									}
									
									if( $post_format === false || $post_format == 'standard' ){
										if( has_post_thumbnail() ){
											the_post_thumbnail($blog_thumb_size); 
										}
										else{
											$show_thumbnail = false;
										}
									}
											
									?>
									</figure>
								</a>
							<?php 
							}
							
							if( $post_format == 'video' ){
								$video_url = get_post_meta($post->ID, 'ts_video_url', true);
								if( $video_url ){
									echo do_shortcode('[ts_video src="'.$video_url.'"]');
								}
								else{
									$show_thumbnail = false;
								}
							}
							
							if( $post_format == 'audio' ){
								$audio_url = get_post_meta($post->ID, 'ts_audio_url', true);
								if( strlen($audio_url) > 4 ){
									$file_format = substr($audio_url, -3, 3);
									if( in_array($file_format, array('mp3', 'ogg', 'wav')) ){
										echo do_shortcode('[audio '.$file_format.'="'.$audio_url.'"]');
									}
									else{
										echo do_shortcode('[ts_soundcloud url="'.$audio_url.'" width="100%" height="122"]');
									}
								}
								else{
									$show_thumbnail = false;
								}
							}
							?>
							
							<?php $tags_list = get_the_tag_list('', ' ');
							if( $tags_list ): ?>
								<div class="entry-meta-top">
									<!-- Blog Tags -->
									<div class="tags-link">
										<?php echo trim($tags_list); ?>
									</div>
								</div>	
							<?php endif; ?>
							
						</div>
						<?php endif; ?>
					
						<div class="entry-content <?php echo !$show_thumbnail?'no-featured-image':'' ?>">
						
							<div class="entry-meta-middle">
								<!-- Blog Comment -->
								<span class="comment-count">
									<?php
									$comment_count = agrofood_get_post_comment_count();
									echo sprintf( _n('%d comment', '%d comments', $comment_count, 'agrofood'), $comment_count );
									?>
								</span>
							</div>
							
							<header>
								<h4 class="heading-title entry-title">
									<a class="post-title" href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
								</h4>
							</header>
							
							<div class="entry-meta-bottom">
								<!-- Blog Author -->
								<span class="vcard author">
									<?php 
									$author_email	= get_the_author_meta( 'user_email' );
									$avatar_url		= get_avatar_url( $author_email );	
									?>
									<img class="author-photo" alt="<?php echo esc_attr( get_the_author() ); ?>" src="<?php echo esc_url( $avatar_url ); ?>" />
									<?php the_author_posts_link();?>
								</span>
								
								<!-- Blog Date Time -->
								<span class="date-time">
									<?php echo get_the_time( get_option('date_format') ); ?>
								</span>
							</div>
							
						</div>
					</div>
					
				</article>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	
<?php 
}
wp_reset_postdata();
?>