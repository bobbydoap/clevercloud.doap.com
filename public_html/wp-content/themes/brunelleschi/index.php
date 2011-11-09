<?php get_header(); ?>
<?php if(brunelleschi_option('sidebar') === 'both'){ get_sidebar('secondary'); } ?>
		<div id="main" role="main" class="<?php brunelleschi_content_class(); ?>">
		
		<?php get_template_part( 'loop', 'index' ); ?>
		
		</div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
