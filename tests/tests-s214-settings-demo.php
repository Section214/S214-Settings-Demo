<?php


class Tests_S214_Settings_Demo extends WP_UnitTestCase {
	protected $object;

	public function setUp() {
		parent::setUp();
		$this->object = S214_Settings_Demo();
	}

	public function tearDown() {
		parent::tearDown();
	}

	public function test_s214_settings_demo_instance() {
		$this->assertClassHasStaticAttribute( 'instance', 'S214_Settings_Demo' );
	}

	/**
	 * @covers S214_Settings_Demo::setup_constants
	 */
	public function test_constants() {
		// Plugin Folder URL
		$path = str_replace( 'tests/', '', plugin_dir_url( __FILE__ ) );
		$this->assertSame( S214_SETTINGS_DEMO_URL, $path );

		// Plugin Folder Path
		$path = str_replace( 'tests/', '', plugin_dir_path( __FILE__ ) );
		$path = substr( $path, 0, -1 );
		$demo  = substr( S214_SETTINGS_DEMO_DIR, 0, -1 );
		$this->assertSame( $demo, $path );
	}

	/**
	 * @covers S214_Settings_Demo::includes
	 */
	public function test_includes() {
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/actions.php' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/settings.php' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/install.php' );

		/** Check Library Exist **/
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/class.s214-settings.php' );

		/** Check Licensing Module Exist **/
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/modules/licensing/class.s214-license.php' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/modules/licensing/S214_Plugin_Updater.php' );

		/** Check Sysinfo Module Exist **/
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/modules/sysinfo/class.s214-sysinfo.php' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/modules/sysinfo/browser.php' );

		/** Check Assets Exist **/
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/assets/css/admin.css' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/assets/css/admin.min.css' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/assets/css/jquery-ui-classic.min.css' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/assets/css/jquery-ui-fresh.min.css' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/assets/js/admin.js' );
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/assets/js/admin.min.js' );
	}
}
