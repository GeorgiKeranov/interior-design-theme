<?php

register_taxonomy(
	'idt_project_category',
	array( 'idt_project' ),
	array(
		'labels'            => array(
			'name'              => __( 'Категории', 'crb' ),
			'singular_name'     => __( 'Категория', 'crb' ),
			'search_items'      => __( 'Търси категории', 'crb' ),
			'all_items'         => __( 'Всички категории', 'crb' ),
			'parent_item'       => __( 'Родителска категория', 'crb' ),
			'parent_item_colon' => __( 'Родителска категория:', 'crb' ),
			'view_item'         => __( 'Виж категория', 'crb' ),
			'edit_item'         => __( 'Редактирай категория', 'crb' ),
			'update_item'       => __( 'Обнови Категория', 'crb' ),
			'add_new_item'      => __( 'Добави нова категория', 'crb' ),
			'new_item_name'     => __( 'Нова Категория', 'crb' ),
			'menu_name'         => __( 'Категории', 'crb' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-categories' ),
	)
);
