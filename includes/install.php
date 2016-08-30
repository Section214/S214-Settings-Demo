<?php
/**
 * Install
 *
 * @package     S214_Settings_Demo\Install
 * @since       1.0.0
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Install
 *
 * @since       1.0.0
 * @return void
 */
function s214_settings_demo_install() {
	global $s214_settings_demo_options;

	// Setup some default options
	$options = array();

	// Pull options from WP, not our global
	$current_options = get_option( 's214_settings_demo_options', array() );

	// Populate some default values
	foreach( edd_get_registered_settings() as $tab => $sections ) {
		foreach( $sections as $section => $settings) {

			// Check for backwards compatibility
			$tab_sections = edd_get_settings_tab_sections( $tab );
			if( ! is_array( $tab_sections ) || ! array_key_exists( $section, $tab_sections ) ) {
				$section = 'main';
				$settings = $sections;
			}

			foreach ( $settings as $option ) {

				if( 'checkbox' == $option['type'] && ! empty( $option['std'] ) ) {
					$options[ $option['id'] ] = '1';
				}

			}
		}

	}

	$merged_options             = array_merge( $s214_settings_demo_options, $options );
	$s214_settings_demo_options = $merged_options;

	update_option( 's214_settings_demo_options', $merged_options );
}