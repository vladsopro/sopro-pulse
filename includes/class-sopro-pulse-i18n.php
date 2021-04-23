<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sopro.io
 * @since      1.0.0
 *
 * @package    Sopro_Pulse
 * @subpackage Sopro_Pulse/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sopro_Pulse
 * @subpackage Sopro_Pulse/includes
 * @author     Vladimir Cvetkoski <vladimir@sopro.io>
 */
class Sopro_Pulse_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sopro-pulse',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
