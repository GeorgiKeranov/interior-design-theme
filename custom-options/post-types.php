<?php

register_post_type( 'idt_project', array(
	'labels' => array(
		'name'               => __( 'Проекти', 'idt' ),
		'singular_name'      => __( 'Проект', 'idt' ),
		'add_new'            => __( 'Добави нов', 'idt' ),
		'add_new_item'       => __( 'Добави нов проект', 'idt' ),
		'view_item'          => __( 'Виж проект', 'idt' ),
		'edit_item'          => __( 'Редактирай проект', 'idt' ),
		'new_item'           => __( 'Нов проект', 'idt' ),
		'view_item'          => __( 'Виж проект', 'idt' ),
		'search_items'       => __( 'Търси проекти', 'idt' ),
		'not_found'          => __( 'Не са намерени проекти', 'idt' ),
		'not_found_in_trash' => __( 'Не са намерени проекти в кошчето', 'idt' ),
	),
	'public'                => true,
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
