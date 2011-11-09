<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6" <?php echo language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" <?php echo language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" <?php echo language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php echo language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php brunelleschi_title(); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			#wrapper { max-width: <?php echo brunelleschi_option('content-width'); ?>px !important;
			<?php if( brunelleschi_option('box-shadow') ) : ?>
				-webkit-box-shadow: 0 .7em 2em -10px #000;
				-moz-box-shadow: 0 .7em 2em -10px #000;
				-o-box-shadow: 0 .7em 2em -10px #000;
				box-shadow: 0 .7em 2em -10px #000;
			<?php endif; ?> }
			<?php if( brunelleschi_option('fonts') ) : ?>
				body,
				h1, h2, h3, h4, h5, h6,
				input,
				textarea,
				.page-title span,
				.pingback a.url,
				#site-title,
				.entry-title {
					font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
					font-weight: 300;
				}
				h3#comments-title,
				h3#reply-title,
				#access .menu,
				#access div.menu ul,
				#cancel-comment-reply-link,
				.form-allowed-tags,
				#site-info,
				#wp-calendar,
				.comment-meta,
				.comment-body tr th,
				.comment-body thead th,
				.entry-content label,
				.entry-content tr th,
				.entry-content thead th,
				.entry-meta,
				.entry-utility,
				#respond label,
				.navigation,
				.page-title,
				.pingback p,
				.reply,
				.widget-title,
				.wp-caption-text,
				.home .hentry.format-aside:before,
				.home .hentry.category-asides:before {
					font-family: "Times New Roman", Times, serif;
					letter-spacing: .2em;
				}
				input[type=submit] {
					font-family: "Times New Roman", Times, serif;
				}
			<?php endif; ?>
			<?php if( brunelleschi_option('left-heading')) : ?>
				#branding { text-align: left; }
			<?php endif; ?>
			<?php if( brunelleschi_option('left-heading') || brunelleschi_option('header-order') === 'Text on the Left' || brunelleschi_option('header-order') === 'Text on the Right') : ?>
				#site-title { font-size: 20px; }
			<?php endif; ?>
			<?php if( brunelleschi_option('sidebar') === 'left' ){ ?> #main { float: right !important } <?php } ?>
			<?php if(brunelleschi_option('extra-css')){ echo brunelleschi_option('extra-css'); }?>
		</style>
		<?php
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			wp_head();
		?>
	</head>
	<body <?php body_class(); ?>>
	<div id="wrapper" class="hfeed container">
		<header id="header" class="row clearfix">
			<?php if(brunelleschi_option('header-order') === 'Text on Top' || brunelleschi_option('header-order') === 'Text on the Left' || ! brunelleschi_option('header-order') ) : ?>
				<div id="branding" class="<?php if( brunelleschi_option('header-order') === 'Text on the Left' ) { echo 'threecol'; } else { echo 'twelvecol last'; } ?>">
					<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
					<<?php echo $heading_tag; ?> id="site-title" <?php if( brunelleschi_option('site-title') ) { echo 'class="hidden"'; } ?>>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</<?php echo $heading_tag; ?>>
					<div id="site-description" <?php if( brunelleschi_option('site-description') ) { echo 'class="hidden"'; } ?>><?php bloginfo( 'description' ); ?></div>
				</div><!-- #branding -->
			<?php endif; ?>
			<?php if( brunelleschi_option('use-header-image')): ?>
				<?php
				// Check if this is a post or page, if it has a thumbnail, and if it's a big one
				if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
						has_post_thumbnail( $post->ID ) &&
						( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
						$image[1] >= HEADER_IMAGE_WIDTH ) :
					// Houston, we have a new header image!
					echo get_the_post_thumbnail( $post->ID, array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT ), array( 'id' => 'headerimg') );
				elseif ( get_header_image() ) : ?>
					<a href="<?php echo home_url( '/' ); ?>" class="<?php if( brunelleschi_option('header-order') === 'Text on the Left' || brunelleschi_option('header-order') === 'Text on the Right' ) { echo 'ninecol '; if(brunelleschi_option('header-order') === 'Text on the Left'){ echo 'last';} } else { echo 'twelvecol last'; } ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" id="headerimg" />
					</a>
				<?php endif; ?>	
			<?php endif; ?>
			<?php if(brunelleschi_option('header-order') === 'Text on the Bottom' || brunelleschi_option('header-order') === 'Text on the Right') : ?>
				<div id="branding" class="<?php if( brunelleschi_option('header-order') === 'Text on the Right' ) { echo 'threecol last'; } else { echo 'twelvecol last'; } ?>">
					<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
					<<?php echo $heading_tag; ?> id="site-title" <?php if( brunelleschi_option('site-title') ) { echo 'class="hidden"'; } ?>>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</<?php echo $heading_tag; ?>>
					<div id="site-description" <?php if( brunelleschi_option('site-description') ) { echo 'class="hidden"'; } ?>><?php bloginfo( 'description' ); ?></div>
				</div><!-- #branding -->
			<?php endif; ?>
			<?php if(!brunelleschi_option('hide-navigation')): ?>
				<div id="access" role="navigation" class="twelvecol last clearfix">
					<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'brunelleschi' ); ?>"><?php _e( 'Skip to content', 'brunelleschi' ); ?></a></div>
					<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
				</div><!-- #access -->
			<?php endif; ?>
		</header><!-- #header -->
		<div id="container" class="row">