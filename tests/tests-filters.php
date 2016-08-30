<?php


/**
 * @group s214_settings_filters
 */
class Tests_Filters extends WP_UnitTestCase {
	public function setUp() {
		parent::setUp();
	}

	public function test_admin_init() {
		global $wp_filter;
		$this->assertarrayHasKey( 's214_settings_demo_register_settings', $wp_filter['admin_init'][10] );
	}
}
