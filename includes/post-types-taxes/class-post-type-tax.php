<?php
/**
 * Post types and taxonomies.
 *
 * @package    antibrand_plugin
 * @subpackage Includes\Post_Types_Taxes
 *
 * @since      1.0.0
 */

namespace Antibrand_Site\Includes\Post_Types_Taxes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Post types and taxonomies class.
 *
 * @since  1.0.0
 * @access public
 */
class Post_Types_Taxes {

	/**
	 * Get an instance of the class.
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
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void Constructor method is empty.
	 *              Change to `self` if used.
	 */
	public function __construct() {}

	/**
     * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
     */
	public function dependencies() {

		// Resister cutsom post types.
		require_once ABS_PATH . 'includes/post-types-taxes/class-register-post-types.php';

		// Resister cutsom taxonomies.
		require_once ABS_PATH . 'includes/post-types-taxes/class-register-taxonomies.php';

		// Functions related to post types and taxonomies.
		require_once ABS_PATH . 'includes/post-types-taxes/class-post-type-tax-functions.php';

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function abs_types_taxes() {

	return Post_Types_Taxes::instance();

}

// Run an instance of the class.
abs_types_taxes();