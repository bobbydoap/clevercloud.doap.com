<?php
$settings_prefix = 'brunelleschi_options';
add_action( 'admin_init', $settings_prefix.'_init' );
add_action( 'admin_menu', $settings_prefix.'_add_page' );

function brunelleschi_options_init(){
	global $settings_prefix;
	register_setting( $settings_prefix.'_group', $settings_prefix, $settings_prefix.'_sanitize' );
}

function brunelleschi_options_add_page() {
	global $settings_prefix;
	add_theme_page( __( 'Brunelleschi Options', 'brunelleschi' ), __( 'Brunelleschi Options', 'brunelleschi' ), 'edit_theme_options', $settings_prefix, $settings_prefix.'_render' );
}

$brunelleschi_options_fields = array(
	'start' => array(
		'type' => 'start'
	),
	'icon' => array(
		'type' => 'icon'
	),
	'title' => array(
		'type' => 'title',
		'value' => __('Brunelleschi Theme Settings','brunelleschi')
	),
	'form-start' => array(
		'type' => 'form-start'
	),
	'section-start' => array(
		'type' => 'section-start',
		'heading' => __('Display Settings','brunelleschi')
	),
	'fonts' => array(
		'type' => 'checkbox',
		'name' => 'fonts',
		'label' => __('Use Alternative Fonts?','brunelleschi'),
		'description' => __('Check to use alternative fonts.','brunelleschi'),
		'std' => ''
	),
	'site-title' => array(
		'type' => 'checkbox',
		'name' => 'site-title',
		'label' => __('Hide Site Title?','brunelleschi'),
		'description' => __('Check to hide the Site Title.','brunelleschi'),
		'std' => ''
	),
	'site-description' => array(
		'type' => 'checkbox',
		'name' => 'site-description',
		'label' => __('Hide Site Description?','brunelleschi'),
		'description' => __('Check to hide the Site Description.','brunelleschi'),
		'std' => ''
	),
	'left-heading' => array(
		'type' => 'checkbox',
		'name' => 'left-heading',
		'label' => __('Use Left Aligned Header Text?','brunelleschi'),
		'description' => __('Check to left align header text.','brunelleschi'),
		'std' => ''
	),
	'use-header-image' => array(
		'type' => 'checkbox',
		'name' => 'use-header-image',
		'label' => __('Enable Header Image?','brunelleschi'),
		'description' => __('Check to include a Header Image.','brunelleschi'),
		'std' => ''
	),
	'header-order' => array(
		'type' => 'select',
		'name' => 'header-order',
		'label' => __('Header Text or Banner Image on Top?','brunelleschi'),
		'description' => __('Choose the order you want the header to display.','brunelleschi'),
		'options' => array(
			__('Text on Top','brunelleschi'),
			__('Text on the Left','brunelleschi'),
			__('Text on the Right','brunelleschi'),
			__('Text on the Bottom','brunelleschi')
		),
		'std' => __('Text on Top','brunelleschi')
	),
	'hide-navigation' => array(
		'type' => 'checkbox',
		'name' => 'hide-navigation',
		'label' => __('Hide Navigation?','brunelleschi'),
		'description' => __('Check to add a hide the primary navigation','brunelleschi'),
		'std' => ''
	),
	'sidebar' => array(
		'type' => 'select',
		'name' => 'sidebar',
		'label' => __('Left, Right, None, or Both Sidebars?','brunelleschi'),
		'description' => __('Pick which side you want the sidebar on. Choose none for no sidebar.','brunelleschi'),
		'options' => array(
			__('left','brunelleschi'),
			__('right','brunelleschi'),
			__('none','brunelleschi'),
			__('both','brunelleschi')
		),
		'std' => __('right','brunelleschi')
	),
	'sidebar-width' => array(
		'type' => 'select',
		'name' => 'sidebar-width',
		'label' => __('How Many Columns Should the Sidebar Occupy?','brunelleschi'),
		'description' => __('Pick a number between two and four.','brunelleschi'),
		'options' => array(
			__('two','brunelleschi'),
			__('three','brunelleschi'),
			__('four','brunelleschi')
		),
		'std' => __('three','brunelleschi')
	),
	'content-width' => array(
		'type' => 'select',
		'name' => 'content-width',
		'label' => __('Content Width:','brunelleschi'),
		'description' => __('Choose the overall Content Width in pixels.','brunelleschi'),
		'std' => '960',
		'options' => array(
			'800',
			'960',
			'1024',
			'1140'
		)
	),
	'box-shadow' => array(
		'type' => 'checkbox',
		'name' => 'box-shadow',
		'label' => __('Use box shadow?','brunelleschi'),
		'description' => __('Check to add a groovy box shadow (new browsers only)','brunelleschi'),
		'std' => ''
	),
	'extra-css' => array(
		'type' => 'textarea',
		'name' => 'extra-css',
		'label' => __('Enter additional CSS here:','brunelleschi'),
		'description' => __('Caution! CSS is very powerful!','brunelleschi'),
		'std' => ''
	),
	array(
		'type' => 'section-end'
	),
	array(
		'type' => 'form-end'
	),
	array(
		'type' => 'end'
	)
);

/* Render Options Page */
function brunelleschi_options_render() {
	global $brunelleschi_options_fields,$settings_prefix;
	foreach ( $brunelleschi_options_fields as $key => $field ) {
		if(isset($field['name'])){ $slug = $settings_prefix.'['.$field['name'].']'; }
		$options = get_option($settings_prefix);
		switch( $field['type'] ) {
			case 'start':?>
				<div class="wrap">
				<?php if ( isset( $_GET['settings-updated'] ) && 'true' == esc_attr( $_GET['settings-updated'] ) ) echo '<div class="updated fade below-h2" style="padding: 5px 10px; margin: 15px 0 0 0;"><strong>' . __( 'Settings saved.', 'brunelleschi') . '</strong></div>'; ?>
				<?php
				break;
			case 'end':?>
				</div><!-- .wrap --><?php
				break;
			case 'icon':?>
				<div id="icon-options-general" class="icon32">
					<br />
				</div><?php
				break;
			case 'title':?>
				<h2><?php echo $field['value']; ?></h2><?php
				break;
			case 'form-start':?>
				<div class="metabox-holder">
				<form method="post" action="options.php">
				<?php
				settings_fields($settings_prefix . '_group');
				break;
			case 'form-end':?>
					<p class="submit">
						<input type="submit" class="button-primary" value="Save Changes" />
					</p>
				</form>
				</div><!-- .metabox-holder --><?php
				break;
			case 'section-start':?>
				<div class="postbox-container" style="width:100%">
					<div class="meta-box-sortables">
						<div class="postbox " > 
							<div class="handlediv" title="Click to toggle">
								<br />
							</div><!-- .handlediv -->
							<h3 class='hndle'><?php echo $field['heading']; ?></h3> 
							<div class="inside">
   								<table class="form-table"><tbody><?php
				break;
			case 'section-end':?>
				</tbody></table></div><!-- .inside --></div><!-- .postbox --></div><!-- .meta-box-sortables --></div><!-- postbox-container --><?php
				break;
 			case 'checkbox':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $slug; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<?php if(isset($options[$key]['name'])){$opt = $options[$key]['name']; } else { $opt = $field['std']; } ?>
						<input type="checkbox" class="checkbox" value="1" name="<?php echo esc_attr($slug); ?>" id="<?php echo esc_attr($field['name']); ?>" <?php checked( '1', $opt); ?> />
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
			case 'select':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $slug; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<select class="select" name="<?php echo $slug; ?>" id="<?php echo $field['name']; ?>" />
							<?php echo $options[$key]['name'];?>
							<?php foreach($field['options'] as $option){ ?>
								<option value="<?php echo $option; ?>" <?php selected( $option, $options[$key] ); ?>><?php echo $option; ?></option>
							<?php } ?>
						</select>
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
			case 'textarea':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $slug; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<?php if(isset($options[$key])){$opt = $options[$key]; } else { $opt = $field['std']; } ?>
						<textarea class="text-area" name="<?php echo esc_attr($slug); ?>" id="<?php echo esc_attr($field['name']); ?>" cols="50" rows="4"><?php echo esc_textarea($opt); ?></textarea>
						<br/>
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
			case 'text':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $slug; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<input type="text" class="regular-text" value="<?php if ( isset($options['name'])){ echo esc_att($opt); } else { echo esc_attr($field['std']); } ?>" name="<?php echo esc_attr($slug); ?>" id="<?php echo esc_attr($field['name']); ?>" />
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
		}
	}
}

/* Sanitize Options for Database */
function brunelleschi_options_sanitize($input){
	$valid_input = get_option('brunelleschi_options');
	$valid_input['fonts'] = (isset($input['fonts']) ? '1' : '');
	$valid_input['site-title'] = (isset($input['site-title']) ? '1' : '');
	$valid_input['site-description'] = (isset($input['site-description']) ? '1' : '');
	$valid_input['left-heading'] = (isset($input['left-heading']) ? '1' : '');
	$valid_input['use-header-image'] = (isset($input['use-header-image']) ? '1' : '');
	$valid_input['header-order'] = ('Text on Top' || 'Text on the Left' || 'Text on the Right' || 'Text on the Bottom' === $input['header-order'] ? $input['header-order'] : $valid_input['header-order']);
	$valid_input['hide-navigation'] = (isset($input['hide-navigation']) ? '1' : '');
	$valid_input['sidebar'] = ('left' || 'right' || 'none' || 'both' === $input['sidebar'] ? $input['sidebar'] : $valid_input['sidebar']);
	$valid_input['sidebar-width'] = ('two' || 'three' || 'four' === $input['sidebar-width'] ? $input['sidebar-width'] : $valid_input['sidebar-width']);
	$valid_input['content-width'] = ('800' || '960' || '1024' || '1140' === $input['content-width'] ? $input['content-width'] : $valid_input['content-width']);
	$valid_input['box-shadow'] = (isset($input['box-shadow']) ? '1' : '');
	$valid_input['extra-css'] = mysql_real_escape_string($input['extra-css']);
	return $valid_input;
}

/* Sucessful Update Message */
function brunelleschi_update_message(){
	if( isset($_GET['activated']) ){
		echo '<div id="message2" class="updated"><p>';
		$theme_data = $theme_data = get_theme_data( trailingslashit( TEMPLATEPATH ) . 'style.css' );
		printf( __('Thank you for using Brunelleschi version %s. Edit your theme options <a href="%s">here</a>.'), $theme_data['Version'], admin_url( 'themes.php?page=brunelleschi_options' ) );
		echo '</p></div>';
	}
}

/* Temporary Update Migration Code */
/* Necessary for theme_options overhaul */
function brunelleschi_update_migration(){
	global $settings_prefix;
	$defaults = array(
		'fonts' => '',
		'site-title' => '',
		'site-description' => '',
		'left-heading' => '',
		'use-header-image' => '',
		'header-order' => 'Text on Top',
		'hide-navigation' => '',
		'sidebar' => 'right',
		'sidebar-width' => 'three',
		'content-width' => '960',
		'box-shadow' => '',
		'extra-css' => ''
	);
	if(!get_option('brunelleschi_options')){
		add_option( 'brunelleschi_options', $defaults );
	}
	$new_options = get_option('brunelleschi_options');
	foreach($defaults as $option => $val){
		if( get_option('brunelleschi_settings_'.$option) ){
			$temp = get_option('brunelleschi_settings_'.$option);
			if($temp === 'checked'){ $temp = '1'; }
			delete_option('brunelleschi_settings_'.$option);
			$new_options[$option] = $temp;
		}
	}
	update_option('brunelleschi_options',$new_options);
	add_action('validate_current_theme','brunelleschi_update_message');
}
add_action('after_setup_theme','brunelleschi_update_migration');
