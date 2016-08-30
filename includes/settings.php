<?php
/**
 * Settings
 *
 * @package     S214_Settings_Demo\Settings
 * @since       1.0.0
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Add the plugin menu item
 *
 * @since       1.0.0
 * @param       array $menu The default menu settings
 * @return      array $menu Our customized settings
 */
function s214_settings_demo_add_menu( $menu ) {
	$menu['page_title']   = __( 'S214 Settings Demo', 's214-settings-demo' ); // Can be set to 'submenu' or 'menu'. Defaults to 'menu'.
	//$menu['parent']     = 'options-general.php';                            // If 'type' is set to 'submenu', defines the parent menu to place our menu under. Defaults to 'options-general.php'
	$menu['page_title']   = __( 'S214 Settings Demo', 's214-settings-demo' ); // The page title. Defaults to 'Section214 Settings'.
	$menu['show_title']   = true;                                             // Whether or not to display the title at the top of the page.
	$menu['menu_title']   = __( 'S214 Settings', 's214-settings-demo' );      // The menu title. Defaults to 'Section214 Settings'.
	//$menu['capability'] = 'manage_options';                                 // The minimum capability required to access the settings panel. Defaults to 'manage_options'.
	$menu['icon']         = 'dashicons-warning';                              // An (optional) icon for your menu item. Follows the same standards as the add_menu_item() function in WordPress.
	//$menu['position']   = null;                                             // Where in the menu to display our new menu. Defaults to 'null' (bottom of the menu).

	return $menu;
}
add_filter( 's214_settings_demo_menu', 's214_settings_demo_add_menu' );


/**
 * Define the tabs for the settings panel
 *
 * @since       1.0.0
 * @param       array $tabs The default settings tabs
 * @return      array $tabs Our customized tabs
 */
function s214_settings_demo_settings_tabs( $tabs ) {
	$tabs = array(
		'welcome' => __( 'Welcome', 's214-settings-demo' ),
		'fields'  => __( 'Fields', 's214-settings-demo' )
	);

	return $tabs;
}
add_filter( 's214_settings_demo_settings_tabs', 's214_settings_demo_settings_tabs' );


/**
 * Define the unsavable tabs for the settings panel
 *
 * @since       1.0.0
 * @param       array $tabs The default unsavable tabs
 * @return      array $tabs Our customized tabs
 */
function s214_settings_demo_unsavable_tabs( $tabs ) {
	$tabs = array(
		'welcome'
	);

	return $tabs;
}
add_filter( 's214_settings_demo_unsavable_tabs', 's214_settings_demo_unsavable_tabs' );


/**
 * Define the settings sections for the each tab
 *
 * @since       1.0.0
 * @param       array $tabs The default settings sections
 * @return      array $tabs Our customized sections
 */
function s214_settings_demo_settings_sections( $sections ) {
	$sections = array(
		'welcome' => array(
			'main' => __( 'Welcome Aboard!', 's214-settings-demo' )
		),
		'fields' => array(
			'text'     => __( 'Text Fields', 's214-settings-demo' ),
			'option'   => __( 'Option Fields', 's214-settings-demo' ),
			'misc'     => __( 'Misc Fields', 's214-settings-demo' ),
			'advanced' => __( 'Advanced Fields', 's214-settings-demo' )
		)
	);

	return $sections;
}
add_filter( 's214_settings_demo_registered_settings_sections', 's214_settings_demo_settings_sections' );


/**
 * Define the settings for the settings panel
 *
 * @since       1.0.0
 * @param       array $settings The default settings
 * @return      array $settings Our customized settings
 */
function s214_settings_demo_settings( $settings ) {
	$plugin_settings = array(
		'welcome' => array(
			'main' => array(
				array(
					'id'   => 'welcome_header',
					'name' => __( 'Welcome Aboard!', 's214-settings-demo' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'            => 'welcome_note',
					'name'          => '',
					'desc'          => sprintf( __( 'This plugin will attempt to familiarize you with the various things this library is capable of. Just in case it wasn\'t obvious, the "Welcome Aboard" text above is an example of a %s field, and this field is a %s field. Remember, every field takes \'id\', \'name\', \'desc\' and \'type\' arguments!', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#header-implements-a-simple-header" target="_blank"><code>header</code></a>', '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#descriptive_text-implements-a-descriptive-text-field" target="_blank"><code>descriptive_text</code></a>' ),
					'type'          => 'descriptive_text',
					'tooltip_title' => __( 'Hi There!', 's214-settings-demo' ),
					'tooltip_desc'  => __( 'Other than the \'header\' and \'hook\' field types, all fields can display a tooltip. Do this by adding \'tooltip_title\' and \'tooltip_desc\' arguments to the field array.', 's214-settings-demo' )
				),
				array(
					'id'   => 'thanks',
					'name' => __( 'Thanks EDD!', 's214-settings-demo' ),
					'desc' => '',
					'type' => 'hook'
				)
			)
		),
		'fields' => array(
			'text' => array(
				array(
					'id'   => 'text_header',
					'name' => __( 'Text Field Examples', 's214-settings-demo' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'   => 'text',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'text' ),
					'desc' => sprintf( __( 'Text fields can take \'std\', \'readonly\' and \'size\' arguements. Read more about text fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#text-implements-a-text-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'text'
				),
				array(
					'id'   => 'textarea',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'textarea' ),
					'desc' => sprintf( __( 'Textarea fields can take a \'std\' arguement. Read more about textarea fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#textarea-implements-a-text-area" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'textarea'
				),
				array(
					'id'   => 'editor',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'editor' ),
					'desc' => sprintf( __( 'Editor fields can take \'std\', \'allow_blank\', \'size\', \'wpautop\', \'buttons\' and \'teeny\' arguements. Read more about editor fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#editor-implements-a-rich-text-editor" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'editor'
				),
				array(
					'id'   => 'html',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'html' ),
					'desc' => sprintf( __( 'HTML fields can take a \'std\' arguement. Read more about HTML fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#html-implements-a-codemirror-html-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'html'
				),
				array(
					'id'   => 'password',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'password' ),
					'desc' => sprintf( __( 'Password fields can take \'std\' and \'size\' arguements. Read more about password fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#password-implements-a-password-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'password'
				)
			),
			'option' => array(
				array(
					'id'   => 'option_header',
					'name' => __( 'Option Field Examples', 's214-settings-demo' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'   => 'checkbox',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'checkbox' ),
					'desc' => sprintf( __( 'Checkbox fields only take the basic arguements. Read more about checkbox fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#checkbox-implements-a-checkbox" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'checkbox'
				),
				array(
					'id'      => 'multicheck',
					'name'    => sprintf( __( '%s Field', 's214-settings-demo' ), 'multicheck' ),
					'desc'    => sprintf( __( 'Multicheck fields only take the basic arguements. Read more about multicheck fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#multicheck-implements-a-multicheck-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type'    => 'multicheck',
					'options' => array(
						'option1' => __( 'Option 1', 's214-settings-demo' ),
						'option2' => __( 'Option 2', 's214-settings-demo' ),
						'option3' => __( 'Option 3', 's214-settings-demo' )
					)
				),
				array(
					'id'      => 'radio',
					'name'    => sprintf( __( '%s Field', 's214-settings-demo' ), 'radio' ),
					'desc'    => sprintf( __( 'Radio fields can take a \'std\' arguement. Read more about radio fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#radio-implements-a-radio-button-list-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type'    => 'radio',
					'options' => array(
						'option1' => __( 'Option 1', 's214-settings-demo' ),
						'option2' => __( 'Option 2', 's214-settings-demo' ),
						'option3' => __( 'Option 3', 's214-settings-demo' )
					)
				),
				array(
					'id'      => 'select',
					'name'    => sprintf( __( '%s Field', 's214-settings-demo' ), 'select' ),
					'desc'    => sprintf( __( 'Select fields can take \'std\', \'placeholder\', \'select2\' and \'multiple\' arguements. Read more about select fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#select-implements-a-select-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type'    => 'select',
					'options' => array(
						'option1' => __( 'Option 1', 's214-settings-demo' ),
						'option2' => __( 'Option 2', 's214-settings-demo' ),
						'option3' => __( 'Option 3', 's214-settings-demo' )
					)
				)
			),
			'misc' => array(
				array(
					'id'   => 'misc_header',
					'name' => __( 'Misc Field Examples', 's214-settings-demo' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'   => 'color',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'color' ),
					'desc' => sprintf( __( 'Color fields can take a \'std\' arguement. Read more about color fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#color-implements-a-color-select-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'color'
				),
				array(
					'id'   => 'number',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'number' ),
					'desc' => sprintf( __( 'Number fields can take \'std\', \'max\', \'min\', \'step\', \'size\' and \'readonly\' arguements. Read more about number fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#number-implements-a-number-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'number'
				),
				array(
					'id'   => 'upload',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'upload' ),
					'desc' => sprintf( __( 'Upload fields can take \'std\' and \'size\' arguements. Read more about upload fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#upload-implements-an-upload-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'upload'
				)
			),
			'advanced' => array(
				array(
					'id'   => 'advanced_header',
					'name' => __( 'Advanced Field Examples', 's214-settings-demo' ),
					'desc' => '',
					'type' => 'header'
				),
				array(
					'id'   => 'sysinfo',
					'name' => sprintf( __( '%s Field', 's214-settings-demo' ), 'sysinfo' ),
					'desc' => sprintf( __( 'Sysinfo fields only take the basic arguements. Read more about sysinfo fields %s.', 's214-settings-demo' ), '<a href="https://github.com/Section214/S214-Settings/wiki/Settings-Reference#sysinfo-implements-a-system-info-display-field" target="_blank">' . __( 'here', 's214-settings-demo' ) . '</a>' ),
					'type' => 'sysinfo',
					'tab'  => 'advanced'
				)
			)
		)
	);

	return array_merge( $settings, $plugin_settings );
}
add_filter( 's214_settings_demo_registered_settings', 's214_settings_demo_settings' );
