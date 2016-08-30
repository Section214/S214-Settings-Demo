<?php
/**
 * Handle actions
 *
 * @package     S214_Settings_Demo\Actions
 * @since       1.0.0
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Hooked function for the 'hook' field type demo
 *
 * @since       1.0.0
 * @return      void
 */
function s214_settings_demo_thanks() {
	$html  = '<p>' . sprintf( __( 'The S214 Settings library is significantly inspired by and based on the awesome word done by %s and the team from %s, so we owe them a <strong>huge</strong> thank you!', 's214-settings-demo' ), '<a href="http://pippinsplugins.com" target="_blank">Pippin Williamson</a>', '<a href="https://easydigitaldownloads.com">Easy Digital Downloads</a>' ) . '</p>';
	$html .= '<hr />';
	$html .= '<p>' . sprintf( __( 'By the way, even though this <em>looks</em> like a %s field, it\'s actually an example of a \'hook\' field. It is created by attaching an action to the hook %s (in our case, %s).', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#descriptive_text-implements-a-descriptive-text-field" target="_blank"><code>descriptive_text</code></a>', '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#hook-implements-a-custom-field-through-a-wordpress-action" target="_blank">hook</a>', '<code>{your_plugin}_{field_id}</code>', '<code>s214_settings_demo_thanks</code>' ) . '</p>';
	$html .= '<p>' . sprintf( __( 'You\'ll also note that this tab doesn\'t have a save button. This is achieved by filtering %s, and adding the slug of the tab to the returned array.', 's214-settings-demo' ), '<code>{your_plugin}_unsavable_tabs</code>' ) . '</p>';

	echo $html;
}
add_action( 's214_settings_demo_thanks', 's214_settings_demo_thanks' );
