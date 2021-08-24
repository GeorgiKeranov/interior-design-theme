<?php

register_taxonomy(
	'idt_project_category',
	array( 'idt_project' ),
	array(
		'labels'            => array(
			'name'              => __( 'Категории', 'idt' ),
			'singular_name'     => __( 'Категория', 'idt' ),
			'search_items'      => __( 'Търси категории', 'idt' ),
			'all_items'         => __( 'Всички категории', 'idt' ),
			'parent_item'       => __( 'Родителска категория', 'idt' ),
			'parent_item_colon' => __( 'Родителска категория:', 'idt' ),
			'view_item'         => __( 'Виж категория', 'idt' ),
			'edit_item'         => __( 'Редактирай категория', 'idt' ),
			'update_item'       => __( 'Обнови Категория', 'idt' ),
			'add_new_item'      => __( 'Добави нова категория', 'idt' ),
			'new_item_name'     => __( 'Нова Категория', 'idt' ),
			'menu_name'         => __( 'Категории', 'idt' ),
		),
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-categories' ),
	)
);
