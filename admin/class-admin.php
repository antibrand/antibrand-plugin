<?php
/**
 * Admin functiontionality and pages
 * @package    antibrand_plugin
 * @subpackage Admin
 *
 * @since      1.0.0
 */

namespace Antibrand_Site\Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Admin functiontionality and pages
 *
 * @since  1.0.0
 * @access public
 */
class Admin {

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

			// Require the class files.
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
	private function __construct() {

		// Enqueue the JavaScript for the admin area.
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		// Replace default post title placeholders.
		add_filter( 'enter_title_here', [ $this, 'title_placeholders' ] );

		// Add excerpts to pages for use in meta data.
        add_action( 'init', [ $this, 'add_page_excerpts' ] );

	}

	/**
	 * Class dependency files
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {}

	/**
	 * Enqueue the JavaScript for the admin area.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_scripts() {

		// Enqueue jQuery tabs.
		wp_enqueue_script( 'jquery-ui-tabs' );

		// Enqueue jQuery tooltips.
		wp_enqueue_script( 'jquery-ui-tooltip' );

		// Text swap scripts for removing brand name instances.
		wp_enqueue_script( 'text-swap', ABS_URL . 'admin/assets/js/text-swap.js', [ 'jquery' ], '', true );

	}

	/**
     * Replace default post title placeholders.
     *
     * @since  1.0.0
	 * @access public
     * @param  object $title Stores the 'Enter title here" placeholder.
	 * @return object Returns the title placeholder.
     * @throws Non-Object Throws an error on attachment edit screens since
     *         there is no placeholder, so that post type is nullified.
     *
     * @todo   Review this if or when a check becomes available for the
     *         new WordPress block editor (Gutenberg).
     */
    public function title_placeholders( $title ) {

        // Get the current screen as a variable.
		$screen = get_current_screen();

		// Post type: project.
        if ( 'project' == $screen->post_type ) {
			$post_title = esc_html__( 'Project Name', 'antibrand' );

		// Post type: snippet.
		} elseif ( 'snippet' == $screen->post_type ) {
			$post_title = esc_html__( 'Snippet Title', 'antibrand' );

        // Post type: post.
		} elseif ( 'post' == $screen->post_type ) {
            $post_title = esc_html__( 'Post Title', 'antibrand' );

        // Post type: page.
        } elseif ( 'page' == $screen->post_type ) {
            $post_title = esc_html__( 'Page Title', 'antibrand' );

        // Post type: attachment.
        } elseif ( $screen->post_type == 'attachment' ) {
            $post_title = null;

        // Post type: custom, unidentified.
        } else {
            $post_title = esc_html__( 'Enter Title', 'antibrand' );
        }

        // Apply a filter conditional modification.
        $title = apply_filters( 'abs_post_title_placeholders', $post_title );

        // Return the new placeholder.
        return $title;

    }

    /**
     * Add excerpts to pages for use in meta data.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function add_page_excerpts() {

        add_post_type_support( 'page', 'excerpt' );

    }

}

/**
 * Put an instance of the class into a function
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function abs_admin() {

	return Admin::instance();

}

// Run an instance of the class.
abs_admin();
