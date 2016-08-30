<?php
/**
 * Plugin Name:     S214 Settings Demo
 * Plugin URI:      https://section214.com
 * Description:     Demo plugin for the S214 Settings library
 * Version:         1.0.0
 * Author:          Daniel J Griffiths
 * Author URI:      https://section214.com
 * Text Domain:     s214-settings-demo
 *
 * @package         S214_Settings_Demo
 * @author          Daniel J Griffiths <dgriffiths@section214.com>
 * @copyright       Copyright (c) 2016, Daniel J Griffiths
 */


// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	exit;
}


if( ! class_exists( 'S214_Settings_Demo' ) ) {


	/**
	 * Main S214_Settings_Demo class
	 *
	 * @since       1.0.0
	 */
	class S214_Settings_Demo {


		/**
		 * @var         S214_Settings_Demo $instance The one true S214_Settings_Demo
		 * @since       1.0.0
		 */
		private static $instance;


		/**
		 * Get active instance
		 *
		 * @access      public
		 * @since       1.0.0
		 * @return      self::$instance The one true S214_Settings_Demo
		 */
		public static function instance() {
			if( ! self::$instance ) {
				self::$instance = new S214_Settings_Demo();
				self::$instance->setup_constants();
				self::$instance->includes();
			}

			return self::$instance;
		}


		/**
		 * Setup plugin constants
		 *
		 * @access      private
		 * @since       1.0.0
		 * @return      void
		 */
		private function setup_constants() {
			// Plugin version
			define( 'S214_SETTINGS_DEMO_VER', '1.0.0' );

			// Plugin path
			define( 'S214_SETTINGS_DEMO_DIR', plugin_dir_path( __FILE__ ) );

			// Plugin URL
			define( 'S214_SETTINGS_DEMO_URL', plugin_dir_url( __FILE__ ) );
		}


		/**
		 * Include necessary files
		 *
		 * @access      private
		 * @since       1.0.0
		 * @global		array $s214_settings_demo_options The S214_Settings_Demo options array
		 * @return      void
		 */
		private function includes() {
			global $s214_settings_demo_options;

			if( ! class_exists( 'S214_Settings' ) ) {
				require_once S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/class.s214-settings.php';
			}

			$settings = new S214_Settings( 's214-settings-demo', 'welcome' );
			$s214_settings_demo_options = $settings->get_settings();

			require_once S214_SETTINGS_DEMO_DIR . 'includes/actions.php';
			require_once S214_SETTINGS_DEMO_DIR . 'includes/settings.php';

			// Install file is only for unit tests
			require_once S214_SETTINGS_DEMO_DIR . 'includes/install.php';
		}
	}
}


/**
 * The main function responsible for returning the one true S214_Settings_Demo
 * instance to functions everywhere
 *
 * @since	   1.0.0
 * @return	  S214_Settings_Demo The one true S214_Settings_Demo
 */
function s214_settings_demo() {
	return S214_Settings_Demo::instance();
}
add_action( 'plugins_loaded', 's214_settings_demo' );
