<?php
/**
 * Register project types.
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
 * Register project types.
 *
 * @since  1.0.0
 * @access public
 */
final class Taxes_Register {

    /**
	 * Constructor magic method.
     *
     * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

        // Register custom project types.
		add_action( 'init', [ $this, 'register' ] );

	}

    /**
     * Register custom project types.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

        /**
         * Taxonomy: Project Type
         *
         * Renaming:
         * Search case "Project Type" and replace with your post type singular name.
         * Search case "Project Types" and replace with your post type plural name.
         * Search case "project_type" and replace with your taxonomy database name.
         * Search case "project types" and replace with your taxonomy permalink slug.
         */

        $labels = [
            'name'                       => __( 'Project Types', 'antibrand-plugin' ),
            'singular_name'              => __( 'Project Type', 'antibrand-plugin' ),
            'menu_name'                  => __( 'Project Type', 'antibrand-plugin' ),
            'all_items'                  => __( 'All Project Types', 'antibrand-plugin' ),
            'edit_item'                  => __( 'Edit Project Type', 'antibrand-plugin' ),
            'view_item'                  => __( 'View Project Type', 'antibrand-plugin' ),
            'update_item'                => __( 'Update Project Type', 'antibrand-plugin' ),
            'add_new_item'               => __( 'Add New Project Type', 'antibrand-plugin' ),
            'new_item_name'              => __( 'New Project Type', 'antibrand-plugin' ),
            'parent_item'                => __( 'Parent Project Type', 'antibrand-plugin' ),
            'parent_item_colon'          => __( 'Parent Project Type', 'antibrand-plugin' ),
            'popular_items'              => __( 'Popular Project Types', 'antibrand-plugin' ),
            'separate_items_with_commas' => __( 'Separate Project Types with commas', 'antibrand-plugin' ),
            'add_or_remove_items'        => __( 'Add or Remove Project Types', 'antibrand-plugin' ),
            'choose_from_most_used'      => __( 'Choose from the most used Project Types', 'antibrand-plugin' ),
            'not_found'                  => __( 'No Project Types Found', 'antibrand-plugin' ),
            'no_terms'                   => __( 'No Project Types', 'antibrand-plugin' ),
            'items_list_navigation'      => __( 'Project Types List Navigation', 'antibrand-plugin' ),
            'items_list'                 => __( 'Project Types List', 'antibrand-plugin' )
        ];

        $options = [
            'label'                 => __( 'Project Types', 'antibrand-plugin' ),
            'labels'                => $labels,
            'public'                => true,
            'hierarchical'          => false,
            'label'                 => 'Project Types',
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'query_var'             => true,
            'rewrite'               => [
                'slug'         => 'project types',
                'with_front'   => true,
                'hierarchical' => false,
            ],
            'show_admin_column'     => true,
            'show_in_rest'          => false,
			'rest_base'             => 'project types',
			'rest_controller_class' => '',
            'show_in_quick_edit'    => true
        ];

        /**
         * Register the taxonomy
         */
        register_taxonomy(
            'project_type',
            [
                'project'
            ],
            $options
        );

    }

}

// Run the class.
$abs_taxes = new Taxes_Register;