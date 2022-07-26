<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/thierrycharriot
 * @since      1.0.0
 *
 * @package    Plugin_Metabox
 * @subpackage Plugin_Metabox/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Plugin_Metabox
 * @subpackage Plugin_Metabox/includes
 * @author     Thierry Charriot <thierrycharriot@chez.lui>
 */
class Plugin_Metabox_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'plugin-metabox',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
