<?php
/**
 * The core plugin class
 *
 * @package    antibrand_plugin
 * @subpackage Includes
 *
 * @since      1.0.0
 */

namespace Antibrand_Site\Includes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Get plugins path to check for active plugins.
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Define the core functionality of the plugin.
 *
 * @since  1.0.0
 * @access public
 */
final class Init {

	/**
	 * Instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Get class dependencies.
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access private
	 * @return self
	 */
	private function __construct() {}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		// antibrand plugin settings class.
		require_once ABS_PATH . 'includes/class-settings.php';

		// Admin/backend functionality, scripts and styles.
		require_once ABS_PATH . 'admin/class-admin.php';

		// Frontend functionality, scripts and styles.
		require_once ABS_PATH . 'frontend/class-frontend.php';

		// Post types and taxonomies.
		require_once ABS_PATH . 'includes/post-types-taxes/class-post-type-tax.php';

		// Translation functionality.
		require_once ABS_PATH . 'includes/class-i18n.php';

	}

	/**
	 * Load classes to extend plugins.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function plugin_support() {

		// Add Advanced Custom Fields Support.
		if ( abs_acf() ) {
			include_once ABS_PATH . 'includes/acf/class-extend-acf.php';
		}

		// Add Beaver Builder support.
		if ( class_exists( 'FLBuilder' ) ) {
			include_once ABS_PATH . 'includes/beaver/class-beaver-builder.php';
		}

		// Add Elementor support.
		if ( class_exists( '\Elementor\antibrand plugin' ) ) {
			include_once ABS_PATH . 'includes/elementor/class-elementor.php';
		}

	}

}

/**
 * Put an instance of the class into a function
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function abs_init() {

	return Init::instance();

}

// Run an instance of the class.
abs_init();
