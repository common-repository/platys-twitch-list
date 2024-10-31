<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://scripts.platypusmuerte.com
 * @since			  1.0.0
 * @package           Platys_Twitch_List
 *
 * @wordpress-plugin
 * Plugin Name:       Platys Twitch List
 * Plugin URI:        https://scripts.platypusmuerte.com
 * Description:       Show a list of pre-defined Twitch channels (online and offline)
 * Version:           1.0.0
 * Author:            PlatypusMuerte Entertainment
 * Author URI:        https://platypusmuerte.com/community
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       platys_twitch_list
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLATYS_TWITCH_LIST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_platys_twitch_list() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/platys_twitch_list-activator.php';
	PlatysTwitchList_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_platys_twitch_list() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/platys_twitch_list-deactivator.php';
	PlatysTwitchList_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_platys_twitch_list' );
register_deactivation_hook( __FILE__, 'deactivate_platys_twitch_list' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/platys_twitch_list.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_platys_twitch_list() {

	$plugin = new PlatysTwitchList();
	$plugin->run();

}
run_platys_twitch_list();
