<?php
/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */

add_action( 'tgmpa_register', 'retro_theme_register_required_plugins' );

function retro_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// Require Organic Customizer Widgets from Github.
		// array(
		// 	'name'      => 'Organic Customizer Widgets',
		// 	'slug'      => 'organic-widgets',
		// 	'required'  => true,
		// 	'source'    => 'https://github.com/Invulu/organic-widgets/archive/master.zip',
		// ),
		// // Reccommend Organic Shortcodes from Github.
		// array(
		// 	'name'      => 'Organic Shortcodes',
		// 	'slug'      => 'organic-shortcodes',
		// 	'required'  => false,
		// 	'source'    => 'https://github.com/Invulu/organic-shortcodes/archive/master.zip',
		// ),
		// array(
		// 	'name'      => 'Customize Posts',
		// 	'slug'      => 'customize-posts',
		// 	'required'  => false,
		// ),
	);

	// Array of configuration settings. Amend each line as needed.
	$config = array(
		'id'           => '90s-retro',     	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
