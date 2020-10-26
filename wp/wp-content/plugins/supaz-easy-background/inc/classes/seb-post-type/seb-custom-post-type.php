<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/* 
 * Supaz Easy Background - Custom Post Type 
 */

$singular = __( 'Supaz Easy Background', 'supaz-easy-background' );
$plural = __( 'Supaz Easy Backgrounds', 'supaz-easy-background' );
//Used for the rewrite slug below.
$plural_slug = str_replace( ' ', '_', $plural );

//Setup all the labels to accurately reflect this post type.
$labels = array(
	'name' => $plural,
	'singular_name' => $singular,
	'add_new' => __( 'Add New ', 'supaz-easy-background' ),
	'add_new_item' => __( 'Add New ', 'supaz-easy-background' ) . $singular,
	'edit' => __( 'Edit ', 'supaz-easy-background' ),
	'edit_item' => __( 'Edit ', 'supaz-easy-background' ) . $singular,
	'new_item' => __( 'New ', 'supaz-easy-background' ) . $singular,
	'view' => __( 'View ', 'supaz-easy-background' ) . $singular,
	'view_item' => __( 'View ', 'supaz-easy-background' ) . $singular,
	'search_term' => __( 'Search ', 'supaz-easy-background' ) . $plural,
	'parent' => __( 'Parent ', 'supaz-easy-background' ) . $singular,
	'not_found' => __( 'No ', 'supaz-easy-background' ) . $plural . __( ' found', 'supaz-easy-background' ),
	'not_found_in_trash' => __( 'No ', 'supaz-easy-background' ) . $plural . __( ' in Trash', 'supaz-easy-background' )
);

//Define all the arguments for this post type.
$args = array(
	'labels' => $labels,
	'public' => false,	
	'publicly_queryable' => false,
	'exclude_from_search' => true,
	'show_in_nav_menus' => false,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_admin_bar' => true,
	'menu_position' => 70,
	'menu_icon' => 'dashicons-format-image',
	'can_export' => true,
	'delete_with_user' => false,
	'hierarchical' => false,
	'has_archive' => false,
	'query_var' => false,
	'capability_type' => 'page',
	'map_meta_cap' => true,
	// 'capabilities' => array(),
	'rewrite' => array(
		'slug' => strtolower( $plural_slug ),
		'with_front' => true,
		'pages' => true,
		'feeds' => false,
	),
	'supports' => array(
		'title'
	)
);
register_post_type( 'seb_posts', $args );

