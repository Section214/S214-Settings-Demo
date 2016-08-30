<?php


/**
 * @group s214_settings_demo_activation
 */
class Tests_Activation extends WP_UnitTestCase {

	/**
	 * Setup test class.
	 */
	public function setUp() {
		parent::setUp();
	}

	/**
	 * Test if the global settings are set.
	 */
	public function test_settings() {
		global $s214_settings_demo_options;

		$this->assertArrayHasKey( 'text', $s214_settings_demo_options );
		$this->assertEquals( 'This is a text field', $s214_settings_demo_options['text'] );
		$this->assertArrayHasKey( 'number', $s214_settings_demo_options );
		$this->assertEquals( 1227, $s214_settings_demo_options['number'] );
		$this->assertArrayHasKey( 'color', $s214_settings_demo_options );
		$this->assertEquals( '#000000', $s214_settings_demo_options['color'] );
	}
}
