<?php
/**
 * IDX_Power_Tools Test Bootstrapper.
 *
 * @since   0.0.1
 * @package IDX_Power_Tools
 */

// Get our tests directory.
$_tests_dir = ( getenv( 'WP_TESTS_DIR' ) ) ? getenv( 'WP_TESTS_DIR' ) : '/tmp/wordpress-tests-lib';

// Include our tests functions.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually require our plugin for testing.
 *
 * @since 0.0.1
 */
function _manually_load_idx_power_tools_plugin() {

	// Include the REST API main plugin file if we're using it so we can run endpoint tests.
	if ( class_exists( 'WP_REST_Controller' ) && file_exists( WP_PLUGIN_DIR . '/rest-api/plugin.php' ) ) {
		require WP_PLUGIN_DIR . '/rest-api/plugin.php';
	}

	// Require our plugin.
	require dirname( dirname( __FILE__ ) ) . '/idx-power-tools.php';
}

// Inject in our plugin.
tests_add_filter( 'muplugins_loaded', '_manually_load_idx_power_tools_plugin' );

// Include the main tests bootstrapper.
require $_tests_dir . '/includes/bootstrap.php';