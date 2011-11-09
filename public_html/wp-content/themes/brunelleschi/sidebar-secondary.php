	<?php if(brunelleschi_option('sidebar') !== 'none'): ?>
		<div id="sidebar" class="widget-area <?php brunelleschi_sidebar_class(); ?>" role="complementary">
			<ul class="xoxo">
				<!-- Unified into one widget area, as of 1.1.8 -->
				<?php if ( is_active_sidebar( 'ternary-widget-area' ) ) : ?>
						
					<div class="widget-area" role="complementary">
						<ul class="xoxo">
							<?php dynamic_sidebar( 'ternary-widget-area' ); ?>
						</ul>
					</div><!-- #secondary .widget-area -->
				
				<?php endif; ?>
			</ul>
			
			<!-- Unified into one widget area, as of 1.1.8 -->
			<?php if ( is_active_sidebar( 'quaternary-widget-area' ) ) : ?>
					
				<div class="widget-area" role="complementary">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'quaternary-widget-area' ); ?>
					</ul>
				</div><!-- #secondary .widget-area -->
			
			<?php endif; ?>
		</div><!-- #primary .widget-area -->
	<?php endif; ?>