<?php get_header(); ?>
<?php $mts_options = get_option('point'); ?>
<div id="page" class="single">
	<div class="content">
		<!-- Start Article -->
		<article class="article">		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<div class="single_post">
						<header>
							<!-- Start Title -->
							<h1 class="title single-title"><?php the_title(); ?></h1>
							<!-- End Title -->
							<!-- Start Post Meta -->
							<div class="post-info"><span class="theauthor"><?php the_author_posts_link(); ?></span> | <span class="thetime"><?php the_time( get_option( 'date_format' ) ); ?></span> | <span class="thecategory"><?php the_category(', ') ?></span><!-- | <span class="thecomment"><a href="<?php comments_link(); ?>"><?php comments_number();?></a></span>--></div>
							<!-- End Post Meta -->
						</header>
						<!-- Start Content -->
						<div class="post-single-content box mark-links">
							<?php if ($mts_options['mts_posttop_adcode'] != '') { ?>
								<?php $toptime = $mts_options['mts_posttop_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$toptime day")), get_the_time("Y-m-d") ) >= 0) { ?>
									<div class="topad">
										<?php echo $mts_options['mts_posttop_adcode']; ?>
									</div>
								<?php } ?>
							<?php } ?>
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next','mythemeshop'), 'previouspagelink' => __('Previous','mythemeshop'), 'pagelink' => '%','echo' => 1 )); ?>
<?php if (fb_allowed()) {
echo '<div style="margin-bottom:8px;overflow:hidden;"><div style="display:inline-block;padding-right:5px;" class="fb-like" data-href="https://www.facebook.com/pages/&#x7231;&#x5947;&#x95fb;-i7wencom/399615256870590" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
<div class="fb-share-button" data-href="' . $_SERVER["REQUEST_URI"] . '" data-layout="button"></div></div>'; //Facebook
} //RLEE ?>
							<?php rlee_after_pagination(); //RLEE ?>
							<?php if ($mts_options['mts_postend_adcode'] != '') { ?>
								<?php $endtime = $mts_options['mts_postend_adcode_time']; if (strcmp( date("Y-m-d", strtotime( "-$endtime day")), get_the_time("Y-m-d") ) >= 0) { ?>
									<div class="bottomad">
										<?php echo $mts_options['mts_postend_adcode'];?>
									</div>
								<?php } ?>
							<?php } ?> 
							<?php if($mts_options['mts_tags'] == '1') { ?>
								<!-- Start Tags -->
								<div class="tags"><?php the_tags('<span class="tagtext">'.__('Tags','mythemeshop').':</span>',', ') ?></div>
								<!-- End Tags -->
							<?php } ?>
						</div>
                        
                        <!--Facebook Share-->
                        <a class="hoverable share-fb post-bot-fb" id="vdsShare scroll_pop_trigger-145753" rel="nofollow" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
                        <div class="share-wrapper">
                            <div class="share-inner-wrapper">
                            <img width="70" height="120" class="post-bot-fb-f" src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook.png"><span class="post-bot-fb-text">喜歡這篇嗎？快分享！</span>
                            </div>
                       </div>
                       </a>
                		<!--Facebook Like-->
                        <div id="fb-root"></div>
							<script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/zh_CN/sdk.js#xfbml=1&appId=1473328802955684&version=v2.0";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
							<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                           <!--Facebook Like End-->
                           <!--Facebook Like Popup-->
                           <div id="inline1" style="display: none; text-align:center">
                           <h3>喜歡這篇嗎？快分享！</h3>
								<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
							</div>
                           <!--Facebook Like POPUP End-->
                           
                           
						<!-- End Content -->
						<?php if($mts_options['mts_related_posts'] == '1') { ?>	
							<!-- Start Related Posts -->
							<?php $categories = get_the_category($post->ID); if ($categories) { $category_ids = array(); foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id; $args=array( 'category__in' => $category_ids, 'post__not_in' => array($post->ID), 'ignore_sticky_posts' => 1, 'showposts'=>4,'orderby' => 'rand' );
							$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
								echo '<div class="related-posts"><h3>'.__('Related Posts','mythemeshop').'</h3><div class="postauthor-top"><ul>';
								$pexcerpt=1; $j = 0; $counter = 0; while( $my_query->have_posts() ) { ++$counter; if($counter == 4) { $postclass = 'last'; $counter = 0; } else { $postclass = ''; } $my_query->the_post();?>
								<li class="<?php echo $postclass; ?> rpexcerpt<?php echo $pexcerpt ?> <?php echo (++$j % 2 == 0) ? 'last' : ''; ?>">
<?php if($postclass == 'last'): //RLEE ?>
<a rel="nofollow" class="relatedthumb" href="http://pkxuan.com?ref=i7wen" rel="bookmark" title="想在這裡看到你的内容?">
<span class="rthumb">
<img width="140" height="100" src="http://i7wen.com/wp/wp-content/uploads/2015/02/pkxuan.jpg" class="attachment-smallthumb wp-post-image" alt="" title="" /></span>
<span>想在這裡看到你的内容?</span>
</a>
<?php else: ?>
									<a rel="nofollow" class="relatedthumb" href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
										<span class="rthumb">
											<?php if(has_post_thumbnail()): ?>
												<?php the_post_thumbnail('smallthumb', 'title='); ?>
											<?php else: ?>
												<img src="<?php echo get_template_directory_uri(); ?>/images/smallthumb.png" alt="<?php the_title(); ?>" class="wp-post-image" />
											<?php endif; ?>
										</span>
										<span>
											<?php the_title(); ?>
										</span>
									</a>
									<div class="meta">
										<!-- <a href="<?php comments_link(); ?>" rel="nofollow"><?php comments_number();?></a> | <span class="thetime"><?php the_time('Y/n/j'); ?></span>--> 
									</div> <!--end .entry-meta-->
<?php endif; //RLEE ?>
								</li>
								<?php $pexcerpt++;?>
								<?php } echo '</ul></div></div>'; }} wp_reset_query(); ?>
							<!-- End Related Posts -->
						<?php }?>  
						<?php if($mts_options['mts_author_box'] == '1') { ?>
							<!-- Start Author Box -->
							<div class="postauthor-container">
								<h4><?php _e('About The Author', 'mythemeshop'); ?></h4>
								<div class="postauthor">
									<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '100' );  } ?>
									<h5><?php the_author_meta( 'nickname' ); ?></h5>
									<p><?php the_author_meta('description') ?></p>
								</div>
							</div>
							<!-- End Author Box -->
						<?php }?>  
					</div>
				</div>
				<?php comments_template( '', true ); ?>
			<?php endwhile; ?>
		</article>
		<!-- End Article -->
		<!-- Start Sidebar -->
		<?php get_sidebar(); ?>
		<!-- End Sidebar -->
		<?php get_footer(); ?>
