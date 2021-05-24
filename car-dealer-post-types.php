<?php
/*
Plugin Name: Car Dealer Post Types
Description: Add custom post types for your car dealership website.
Version: 1.0
Author: Leonardo da Costa
Author URI: https://github.com/costaleonardo
*/

function register_cpts() {

	/**
	 * Post Type: Vehicles.
	 */

	$labels = [
		"name" => __( "Vehicles", "twentytwentyone" ),
		"singular_name" => __( "Vehicle", "twentytwentyone" ),
	];

	$args = [
		"label" => __( "Vehicles", "twentytwentyone" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "vehicle", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-car",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "author", "page-attributes" ],
		"taxonomies" => [ "category", "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "vehicle", $args );

	/**
	 * Post Type: Dealerships.
	 */

	$labels = [
		"name" => __( "Dealerships", "twentytwentyone" ),
		"singular_name" => __( "dealership", "twentytwentyone" ),
	];

	$args = [
		"label" => __( "Dealerships", "twentytwentyone" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "dealerships", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-home",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "author", "page-attributes" ],
		"show_in_graphql" => false,
	];

	register_post_type( "dealerships", $args );
}

add_action( 'init', 'register_cpts' );

function register_tax() {

	/**
	 * Taxonomy: Manufactures.
	 */

	$labels = [
		"name" => __( "Manufactures", "twentytwentyone" ),
		"singular_name" => __( "Manufacture", "twentytwentyone" ),
	];

	
	$args = [
		"label" => __( "Manufactures", "twentytwentyone" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'manufactures', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "manufactures",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
  ];
  
	register_taxonomy( "manufactures", [ "vehicle" ], $args );
}

add_action( 'init', 'register_tax' );

?>