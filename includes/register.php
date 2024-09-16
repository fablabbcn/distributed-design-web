<?php

/*
// Register menus.
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main' => 'Main',
		)
	);
}
*/

/*
// Post formats.
add_theme_support( 'post-formats', array( 'video' ) );
add_post_type_support( 'post', 'post-formats' );
*/

// Register post types & taxonomies.
if ( ! function_exists( 'llos_custom_types_register' ) ) {
	function llos_custom_types_register() {
		/*
		// Taxonomies.
		$labels = array(
			'name'                => _x( 'Cities', 'taxonomy general name', 'nug' ),
			'singular_name'       => _x( 'City', 'taxonomy singular name', 'nug' ),
			'search_items'        => __( 'Search Cities', 'nug' ),
			'popular_items'       => __( 'Popular Cities', 'nug' ),
			'all_items'           => __( 'All Cities', 'nug' ),
			'parent_item'         => __( 'Parent City', 'nug' ),
			'edit_item'           => __( 'Edit City', 'nug' ),
			'update_item'         => __( 'Update City', 'nug' ),
			'add_new_item'        => __( 'Add City', 'nug' ),
			'new_item_name'       => __( 'New City', 'nug' ),
			'add_or_remove_items' => __( 'Add or remove City', 'nug' ),
		);

		$args = array(
			'label'             => __( 'City', 'nug' ),
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => true,
			'query_var'         => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'city',
				'with_front' => false,
			),
		);

		register_taxonomy( 'city', 'director', $args );
		*/

		
		// Custom post types.
		$labels = array(
			'name'               => _x( 'Services', 'post type general name', 'nug' ),
			'singular_name'      => _x( 'Service', 'post type singular name', 'nug' ),
			'add_new'            => _x( 'Add New', 'service', 'nug' ),
			'add_new_item'       => __( 'Add New Service', 'nug' ),
			'edit_item'          => __( 'Edit Service', 'nug' ),
			'new_item'           => __( 'New Service', 'nug' ),
			'view_item'          => __( 'View Service', 'nug' ),
			'search_items'       => __( 'Search Services', 'nug' ),
			'not_found'          => __( 'No Services found', 'nug' ),
			'not_found_in_trash' => __( 'No Services found in Trash', 'nug' ),
		);

		$args = array(
			// 'menu_icon'         => 'dashicons-id',
			'labels'            => $labels,
			'public'            => true,
			'query_var'         => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'has_archive'       => true,
			'menu_position'     => 5,
			'capability_type'   => 'page',
			'supports'          => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'excerpt' ),
			'rewrite'           => array(
				'slug'       => 'service',
				'with_front' => true,
			),
		);

		register_post_type( 'service', $args );

		// Custom post types.
		$labels = array(
			'name'               => _x( 'Members', 'post type general name', 'nug' ),
			'singular_name'      => _x( 'Member', 'post type singular name', 'nug' ),
			'add_new'            => _x( 'Add New', 'member', 'nug' ),
			'add_new_item'       => __( 'Add New Member', 'nug' ),
			'edit_item'          => __( 'Edit Member', 'nug' ),
			'new_item'           => __( 'New Member', 'nug' ),
			'view_item'          => __( 'View Member', 'nug' ),
			'search_items'       => __( 'Search Members', 'nug' ),
			'not_found'          => __( 'No Members found', 'nug' ),
			'not_found_in_trash' => __( 'No Members found in Trash', 'nug' ),
		);

		$args = array(
			// 'menu_icon'         => 'dashicons-id',
			'labels'            => $labels,
			'public'            => true,
			'query_var'         => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'has_archive'       => true,
			'menu_position'     => 5,
			'capability_type'   => 'page',
			'supports'          => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'rewrite'           => array(
				'slug'       => 'member',
				'with_front' => true,
			),
		);

		register_post_type( 'member', $args );

		// Custom post types.
		$labels = array(
			'name'               => _x( 'Authors', 'post type general name', 'nug' ),
			'singular_name'      => _x( 'Author', 'post type singular name', 'nug' ),
			'add_new'            => _x( 'Add New', 'author', 'nug' ),
			'add_new_item'       => __( 'Add New Author', 'nug' ),
			'edit_item'          => __( 'Edit Author', 'nug' ),
			'new_item'           => __( 'New Author', 'nug' ),
			'view_item'          => __( 'View Author', 'nug' ),
			'search_items'       => __( 'Search Authors', 'nug' ),
			'not_found'          => __( 'No Authors found', 'nug' ),
			'not_found_in_trash' => __( 'No Authors found in Trash', 'nug' ),
		);

		$args = array(
			// 'menu_icon'         => 'dashicons-id',
			'labels'            => $labels,
			'public'            => true,
			'query_var'         => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'has_archive'       => true,
			'menu_position'     => 5,
			'capability_type'   => 'page',
			'supports'          => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'rewrite'           => array(
				'slug'       => 'author',
				'with_front' => true,
			),
		);

		register_post_type( 'author', $args );
		
		// Taxonomies.
		$labels = array(
			'name'                => _x( 'Categories', 'taxonomy general name', 'nug' ),
			'singular_name'       => _x( 'Category', 'taxonomy singular name', 'nug' ),
			'search_items'        => __( 'Search Categories', 'nug' ),
			'popular_items'       => __( 'Popular Categories', 'nug' ),
			'all_items'           => __( 'All Categories', 'nug' ),
			'parent_item'         => __( 'Parent Category', 'nug' ),
			'edit_item'           => __( 'Edit Category', 'nug' ),
			'update_item'         => __( 'Update Category', 'nug' ),
			'add_new_item'        => __( 'Add Category', 'nug' ),
			'new_item_name'       => __( 'New Category', 'nug' ),
			'add_or_remove_items' => __( 'Add or remove Category', 'nug' ),
		);

		$args = array(
			'label'             => __( 'Category', 'nug' ),
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => true,
			'query_var'         => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'category',
				'with_front' => false,
			),
		);

		register_taxonomy( 'category_author', 'author', $args );

		// Taxonomies.
		$labels = array(
			'name'                => _x( 'Cities', 'taxonomy general name', 'nug' ),
			'singular_name'       => _x( 'City', 'taxonomy singular name', 'nug' ),
			'search_items'        => __( 'Search Cities', 'nug' ),
			'popular_items'       => __( 'Popular Cities', 'nug' ),
			'all_items'           => __( 'All Cities', 'nug' ),
			'parent_item'         => __( 'Parent City', 'nug' ),
			'edit_item'           => __( 'Edit City', 'nug' ),
			'update_item'         => __( 'Update City', 'nug' ),
			'add_new_item'        => __( 'Add City', 'nug' ),
			'new_item_name'       => __( 'New City', 'nug' ),
			'add_or_remove_items' => __( 'Add or remove City', 'nug' ),
		);

		$args = array(
			'label'             => __( 'City', 'nug' ),
			'labels'            => $labels,
			'public'            => true,
			'hierarchical'      => true,
			'query_var'         => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'city',
				'with_front' => false,
			),
		);

		register_taxonomy( 'city_post', 'post', $args );
		
		
	} add_action( 'init', 'llos_custom_types_register' );
}


// Change Posts labels in sidebar admin menu.
// if ( ! function_exists( 'llos_custom_post_menu_label' ) ) {
// 	function llos_custom_post_menu_label() {
// 		global $menu;
// 		global $submenu;
// 		$menu[5][0]                 = 'Projects';
// 		$submenu['edit.php'][5][0]  = 'Project';
// 		$submenu['edit.php'][10][0] = 'Add Project';
// 	}
// 	add_action( 'admin_menu', 'llos_custom_post_menu_label' );
// }

// Change Posts labels in other admin area.
if ( ! function_exists( 'llos_custom_post_object_label' ) ) {
	function llos_custom_post_object_label() {
		global $wp_post_types;
		$labels       = &$wp_post_types['post']->labels;
		$labels->name = 'Blog';
		// $labels->singular_name      = 'Project';
		// $labels->add_new            = 'Add Project';
		// $labels->add_new_item       = 'Add Project';
		// $labels->edit_item          = 'Edit Project';
		// $labels->new_item           = 'Projects';
		// $labels->view_item          = 'View Project';
		// $labels->search_items       = 'Search Project';
		// $labels->not_found          = 'No results on Project';
		// $labels->not_found_in_trash = 'No Projects in Trash';
		// $labels->name_admin_bar     = 'Add Project';
		// $wp_post_types['post']->menu_icon = 'dashicons-album';
	}

	remove_action( 'wp_head', 'rsd_link' );
	add_action( 'init', 'llos_custom_post_object_label' );
}

/*
// Add separator in given position.
if ( ! function_exists( 'llos_set_admin_menu_separator' ) ) {
	function llos_set_admin_menu_separator() {
		global $menu;
		$position = 9;
		// Space between Custom Post Types and Media.
		$menu[ $position ] = array(
			0 => '',
			1 => 'read',
			2 => 'separator' . $position,
			3 => '',
			4 => 'wp-menu-separator',
		);
	} add_action( 'admin_menu', 'llos_set_admin_menu_separator' );
}
*/

// .
if ( ! function_exists( 'make_urls_prettier' ) ) {
	function make_urls_prettier ($args, $post_type) {
		if ($post_type == 'af_entry') {
			$args['rewrite'] = array(
				'slug'       => 'awards/entries',
				'with_front' => false,
			);
		}
		return $args;
	} add_filter( 'register_post_type_args', 'make_urls_prettier', 10, 2 );
}
