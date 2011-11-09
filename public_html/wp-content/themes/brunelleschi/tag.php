<?php get_header(); ?>
		<?php if(brunelleschi_option('sidebar') === 'both'){ get_sidebar('secondary'); } ?>
		<div id="main" role="main" class="<?php brunelleschi_content_class(); ?>">

			<h1 class="page-title"><?php
				printf( __( 'Tag Archives: %s', 'brunelleschi' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
			</h1>

			<?php get_template_part( 'loop', 'tag' ); ?>
		</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
