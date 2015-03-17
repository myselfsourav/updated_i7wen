<aside class="sidebar c-4-12">
	<div id="sidebars" class="sidebar">
		<div class="sidebar_list">
<div class="image-logo2"><a href="<?php echo home_url(); ?>"><img src="http://i7wen.com/wp/wp-content/uploads/2014/09/logo2_x60.png" width="159px" height="60px"></a></div> <?php /* RLEE */ ?>
			<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
				<div id="sidebar-search" class="widget">
					<h3><?php _e('Search', 'mythemeshop'); ?></h3>
					<div class="widget-wrap">
						<?php get_search_form(); ?>
					</div>
				</div>
				<div id="sidebar-archives" class="widget">
					<h3><?php _e('Archives', 'mythemeshop') ?></h3>
					<div class="widget-wrap">
						<ul>
							<?php wp_get_archives( 'type=monthly' ); ?>
						</ul>
					</div>
				</div>
				<div id="sidebar-meta" class="widget">
					<h3><?php _e('Meta', 'mythemeshop') ?></h3>
					<div class="widget-wrap">
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div><!--sidebars-->
</aside>
