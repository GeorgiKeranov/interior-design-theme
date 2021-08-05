<?php

/**
 * Get related posts by given post id and taxonomy
 *
 * If there are no enough posts by the given taxonomy terms from the current post
 * get the rest without applying filters for taxonomy terms
 */
function idt_get_related_posts( $post_id, $taxonomy, $max_number_of_posts = 3 ) {
	$post_type = get_post_type( $post_id );
	$post_terms = wp_get_object_terms( $post_id, $taxonomy, array('fields' => 'ids') );

	$related_posts = array();

	if ( !empty( $post_terms ) ) {
		$tax_query = array( 'relation' => 'OR' );

		/**
		 * Get posts that have all of the terms from the current post
		 */
		$tax_query[] = array(
			'taxonomy' => $taxonomy,
			'field' => 'id',
			'terms' => $post_terms
		);

		/**
		 * Get posts that have at least one of the terms from the current post
		 */
		foreach ( $post_terms as $term_id ) {
			$tax_query[] = array(
				'taxonomy' => $taxonomy,
				'field' => 'id',
				'terms' => array( $term_id )
			);
		}

		$related_posts = get_posts( array(
			'post_type' => $post_type,
			'post_status' => 'publish',
			'post__not_in' => array( $post_id ),
			'posts_per_page' => $max_number_of_posts,
			'fields' => 'ids',
			'orderby' => 'rand',
			'tax_query' => $tax_query
		) );
	}

	$related_posts_count = count( $related_posts );

	/**
	 * If they are less than the max number of posts get the 
	 * rest posts without applying the tax_query
	 */
	if ( $related_posts_count < $max_number_of_posts ) {
		$remaining_posts_count = $max_number_of_posts - $related_posts_count;

		$excluded_posts = array_merge( $related_posts, array( $post_id ) );

		$remaining_posts = get_posts( array(
			'post_type' => $post_type,
			'post_status' => 'publish',
			'post__not_in' => $excluded_posts,
			'posts_per_page' => $remaining_posts_count,
			'fields' => 'ids',
			'orderby' => 'rand'
		) );

		$related_posts = array_merge( $related_posts, $remaining_posts );
	}

	return $related_posts;
}
