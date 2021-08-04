<?php

register_post_type( 'idt_project', array(
	'labels' => array(
		'name'               => __( 'Проекти', 'crb' ),
		'singular_name'      => __( 'Проект', 'crb' ),
		'add_new'            => __( 'Добави нов', 'crb' ),
		'add_new_item'       => __( 'Добави нов проект', 'crb' ),
		'view_item'          => __( 'Виж проект', 'crb' ),
		'edit_item'          => __( 'Редактирай проект', 'crb' ),
		'new_item'           => __( 'Нов проект', 'crb' ),
		'view_item'          => __( 'Виж проект', 'crb' ),
		'search_items'       => __( 'Търси проекти', 'crb' ),
		'not_found'          => __( 'Не са намерени проекти', 'crb' ),
		'not_found_in_trash' => __( 'Не са намерени проекти в кошчето', 'crb' ),
	),
	'public'                => true,
	'has_archive'           => 'projects',
	'exclude_from_search'   => false,
	'show_ui'               => true,
	'capability_type'       => 'post',
	'hierarchical'          => false,
	'_edit_link'            => 'post.php?post=%d',
	'rewrite'               => array(
		'slug' => 'project',
		'with_front' => false,
	),
	'query_var'             => true,
	'menu_icon'             => 'dashicons-admin-multisite',
	'supports'              => array( 'title', 'thumbnail', 'editor' ),
) );
