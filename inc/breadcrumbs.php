<?php

/**
 * Prints dynamic html breadcrumbs based on the type of the current page
 */
function idt_the_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	$pages = array();
	
	/**
	 * Add home page before all other pages
	 */
	$home_page_id = get_option('page_on_front');
	if ( !empty( $home_page_id ) ) {
		$pages[] = array(
			'title' => get_the_title( $home_page_id ),
			'link' => get_the_permalink( $home_page_id )
		);
	}

	/**
	 * If current page is from post type page get all parent pages of current page
	 */
	if ( is_page() ) {
		$current_page_id = get_the_ID();

		$parent_pages = get_post_ancestors( $current_page_id );

		if ( !empty( $parent_pages ) ) {
			foreach ( $parent_pages as $parent_page_id ) {
				$pages[] = array(
					'title' => get_the_title( $parent_page_id ),
					'link' => get_the_permalink( $parent_page_id )
				);
			}
		}

		$pages[] = array(
			'title' => get_the_title(),
		);
	}

	/**
	 * If current page is single for 'post' or custom post type add archive page for that post type
	 */
	if ( is_single() ) {
		$current_post_type = get_post_type();

		$post_type_archive_page_link = get_post_type_archive_link( $current_post_type );

		if ( $post_type_archive_page_link ) {
			$post_type_object = get_post_type_object( $current_post_type );
			$post_type_label = $post_type_object->label;

			$pages[] = array(
				'title' => $post_type_label,
				'link' => $post_type_archive_page_link
			);
		}

		$pages[] = array(
			'title' => get_the_title(),
		);
	}

	if ( is_archive() ) {
		$current_post_type = get_post_type();
		$post_type_object = get_post_type_object( $current_post_type );
		$post_type_label = $post_type_object->label;

		$pages[] = array(
			'title' => $post_type_label,
		);		
	}

	$html = '<div class="breadcrumbs">';
	
	foreach ( $pages as $index => $page ) {
		if ( $index > 0 ) {
			$html .= ' <span>/</span> ';
		}

		if ( empty( $page['link'] ) ) {
			$html .= esc_html( $page['title'] );
		} else {
			$html .= '<a href="' . esc_url( $page['link'] ) . '">' . esc_html( $page['title'] ) . '</a>';
		}

	}

	$html .= '</div>';

	echo $html;
}
