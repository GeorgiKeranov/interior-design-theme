<?php

/**
 * Get the main title, based on the current view.
 *
 * @return string The current title.
 */
function idt_get_title() {
	$title = '';

	if ( is_home() || ( is_single() && get_post_type() == 'post' ) ) {
		$blog_page_id = get_option( 'page_for_posts' );
		if ( $blog_page_id && $blog_page = get_post( $blog_page_id ) ) {
			$title = $blog_page->post_title;
		}
	} elseif ( is_search() ) {
		$title = sprintf( __( 'Резултати от търсенето за: %s', 'idt' ), get_search_query() );
	} elseif ( is_category() ) {
		$title = sprintf( __( 'Категория: %s', 'idt' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Таг: %s', 'idt' ), single_tag_title( '', false ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Ден: %s', 'idt' ), get_the_time( 'F jS, Y' ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Месец: %s', 'idt' ), get_the_time( 'F, Y' ) );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Година: %s', 'idt' ), get_the_time( 'Y' ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Постове от %s', 'idt' ), get_the_author() );
	} elseif ( is_archive() ) {
		$title = __( 'Архиви', 'idt' );
	} elseif ( is_404() ) {
		$title = __( 'Грешка 404 - Страницата не е открита', 'idt' );
	} elseif ( is_page() ) {
		$title = get_the_title();
	}

	return $title;
}
