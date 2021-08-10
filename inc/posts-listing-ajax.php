<?php

add_action( 'wp_ajax_nopriv_get_projects_ajax', 'idt_get_projects_ajax' );
add_action( 'wp_ajax_get_projects_ajax', 'idt_get_projects_ajax' );
function idt_get_projects_ajax() {
	$query_args = array(
		'post_type' => 'idt_project',
		'post_status' => 'publish',
		'posts_per_page' => '12',
		'fields' => 'ids',
	);

	if ( !empty( $_GET['page'] ) ) {
		$query_args['paged'] = $_GET['page'];
	}

	if ( !empty( $_GET['term_id'] ) ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'idt_project_category',
				'field' => 'id',
				'terms' => array( $_GET['term_id'] )
			)
		);
	}

	$projects_query = new WP_Query( $query_args );

	ob_start();

	get_template_part( 'template-parts/projects-from-listing', null, $projects_query->posts );

	$html = ob_get_clean();
	
	wp_send_json_success( array(
		'html' => $html,
		'max_num_pages' => $projects_query->max_num_pages
	) );
}
