<?php

add_action( 'wp_ajax_nopriv_get_projects_ajax', 'idt_get_projects_ajax' );
add_action( 'wp_ajax_get_projects_ajax', 'idt_get_projects_ajax' );
function idt_get_projects_ajax() {
	$posts_query = idt_get_posts_query( 'idt_project', 'idt_project_category' );
	
	ob_start();

	get_template_part( 'template-parts/projects-from-listing', null, $posts_query->posts );

	$html = ob_get_clean();

	wp_send_json_success( array(
		'html' => $html,
		'max_num_pages' => $posts_query->max_num_pages
	) );
}

add_action( 'wp_ajax_nopriv_get_posts_ajax', 'idt_get_posts_ajax' );
add_action( 'wp_ajax_get_posts_ajax', 'idt_get_posts_ajax' );
function idt_get_posts_ajax() {
	$posts_query = idt_get_posts_query( 'post', 'category' );
	
	ob_start();

	get_template_part( 'template-parts/posts-from-listing', null, $posts_query->posts );

	$html = ob_get_clean();

	wp_send_json_success( array(
		'html' => $html,
		'max_num_pages' => $posts_query->max_num_pages
	) );
}

function idt_get_posts_query( $post_type, $taxonomy ) {
	$query_args = array(
		'post_type' => $post_type,
		'post_status' => 'publish',
		'posts_per_page' => '12'
	);

	if ( $post_type === 'post' ) {
		$query_args['posts_per_page'] = get_option( 'posts_per_page' );
	}

	if ( $post_type === 'idt_project' ) {
		$query_args['fields'] = 'ids';
	}

	if ( !empty( $_GET['page'] ) ) {
		$query_args['paged'] = $_GET['page'];
	}

	if ( !empty( $_GET['term_id'] ) ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'id',
				'terms' => array( $_GET['term_id'] )
			)
		);
	}

	return new WP_Query( $query_args );
}
