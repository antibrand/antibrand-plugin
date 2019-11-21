<?php
/**
 * Register post types.
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
 * Register post types.
 *
 * @since  1.0.0
 * @access public
 */
final class Post_Types_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register project types.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register project types.
     *
     * Note for WordPress 5.0 or greater:
     * If you want your post type to adopt the block edit_form_image_editor
     * rather than using the classic editor then set `show_in_rest` to `true`.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Post Type: Project
         */

        $labels = [
            'name'                  => __( 'Projects', 'antibrand' ),
            'singular_name'         => __( 'Project', 'antibrand' ),
            'menu_name'             => __( 'Projects', 'antibrand' ),
            'all_items'             => __( 'All Projects', 'antibrand' ),
            'add_new'               => __( 'Add New', 'antibrand' ),
            'add_new_item'          => __( 'Add New Project', 'antibrand' ),
            'edit_item'             => __( 'Edit Project', 'antibrand' ),
            'new_item'              => __( 'New Project', 'antibrand' ),
            'view_item'             => __( 'View Project', 'antibrand' ),
            'view_items'            => __( 'View Projects', 'antibrand' ),
            'search_items'          => __( 'Search Projects', 'antibrand' ),
            'not_found'             => __( 'No Projects Found', 'antibrand' ),
            'not_found_in_trash'    => __( 'No Projects Found in Trash', 'antibrand' ),
            'parent_item_colon'     => __( 'Parent Project', 'antibrand' ),
            'featured_image'        => __( 'Featured image for this project', 'antibrand' ),
            'set_featured_image'    => __( 'Set featured image for this project', 'antibrand' ),
            'remove_featured_image' => __( 'Remove featured image for this project', 'antibrand' ),
            'use_featured_image'    => __( 'Use as featured image for this project', 'antibrand' ),
            'archives'              => __( 'Project archives', 'antibrand' ),
            'insert_into_item'      => __( 'Insert into Project', 'antibrand' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Project', 'antibrand' ),
            'filter_items_list'     => __( 'Filter Projects', 'antibrand' ),
            'items_list_navigation' => __( 'Projects list navigation', 'antibrand' ),
            'items_list'            => __( 'Projects List', 'antibrand' ),
            'attributes'            => __( 'Project Attributes', 'antibrand' ),
            'parent_item_colon'     => __( 'Parent Project', 'antibrand' ),
        ];

        // Apply a filter to labels for customization.
        $labels = apply_filters( 'abs_project_labels', $labels );

        $options = [
            'label'               => __( 'Projects', 'antibrand' ),
            'labels'              => $labels,
            'description'         => __( 'Custom post type description.', 'antibrand' ),
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => false,
            'rest_base'           => 'project_rest_api',
            'has_archive'         => true,
            'show_in_menu'        => true,
			'exclude_from_search' => false,
			// Sets user role levels, accepts array: 'capabilities'        => [],
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => [
                'slug'       => 'projects',
                'with_front' => true
            ],
            'query_var'           => 'project',
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-archive',
            'supports'            => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'author',
                'page-attributes',
                'post-formats'
            ],
            'taxonomies'          => [
				'project_type',
                'post_tag'
            ],
        ];

        // Apply a filter to arguments for customization.
        $options = apply_filters( 'abs_project_args', $options );

        /**
         * Register the post type
         *
         * Maximum 20 characters, cannot contain capital letters or spaces.
         */
        register_post_type(
            'project',
            $options
        );

    }

}

// Run the class.
$projects = new Post_Types_Register;