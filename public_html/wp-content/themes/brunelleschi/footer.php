			</div><!-- #container -->
			<footer id="footer" role="contentinfo" class="row">
				<div id="footerbar" class="twelvecol last">
					<?php get_sidebar( 'footer' ); ?>
				</div><!-- #footerbar -->
				<div id="colophon" class="twelvecol last">
					<div id="site-info" class="sixcol">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div><!-- #site-info -->
					<div id="site-generator" class="sixcol last">
						<?php do_action( 'brunelleschi_credits' ); ?>
						<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'brunelleschi' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'brunelleschi' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'brunelleschi' ), 'WordPress' ); ?></a>
					</div><!-- #site-generator -->
				</div><!-- #colophon -->
			</footer><!-- #footer -->
		</div><!-- #wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>
