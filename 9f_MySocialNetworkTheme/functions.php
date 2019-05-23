<?php

//adding the css and js files

function setup()
{
	wp_enqueue_style("google-fonts", "//fonts.googleapis.com/css?family=Raleway");
	wp_enqueue_style("style", get_stylesheet_uri(), NULL, "1.0.0", "all");
	wp_enqueue_script("main", get_theme_file_uri("/js/main.js"), NULL, "1.0.0", true);
}

add_action("wp_enqueue_scripts", "setup");

require_once get_template_directory() . '/class-tgm-plugin-activation.php';

function mysocialnetwork_register_required_plugins()
{
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * 
	 */
	$plugins = array(


		// These include all necessary plugins from the WordPress repository
		array(
			'name'      => 'Font Awesome',
			'slug'      => 'font-awesome',
			'required'  => true,
		),

		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),

		array(
			'name'      => 'jQuery Updater',
			'slug'      => 'jquery-updater',
			'required'  => true,
		),


	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'mysocialnetwork',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'mysocialnetwork_register_required_plugins');
