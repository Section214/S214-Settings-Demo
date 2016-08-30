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

		/** Check Library Exist **/
		$this->assertFileExists( S214_SETTINGS_DEMO_DIR . 'includes/libraries/S214-Settings/source/class.s214-settings.php' );
	}
}
