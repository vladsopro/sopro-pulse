<?php

/**
 *
 *
 * @link              https://sopro.io
 * @since             1.0.0
 * @package           Sopro_Pulse
 *
 * @wordpress-plugin
 * Plugin Name:       Sopro Pulse
 * Plugin URI:        https://sopro.io
 * Description:       Installs the required code for tracking Sopro campaigns.
 * Version:           1.0.0
 * Author:            Vladimir Cvetkoski
 * Author URI:        https://sopro.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sopro-pulse
 * Domain Path:       /languages
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
define( 'SOPRO_PULSE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sopro-pulse-activator.php
 */
function activate_sopro_pulse() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sopro-pulse-activator.php';
	Sopro_Pulse_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sopro-pulse-deactivator.php
 */
function deactivate_sopro_pulse() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sopro-pulse-deactivator.php';
	Sopro_Pulse_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sopro_pulse' );
register_deactivation_hook( __FILE__, 'deactivate_sopro_pulse' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sopro-pulse.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_sopro_pulse() {

	$plugin = new Sopro_Pulse();
	$plugin->run();

}
run_sopro_pulse();
