<?php
/**
 * Template Name: Page Builder
 */

the_post();

get_header();

$sections = carbon_get_the_post_meta( 'idt_page_builder_sections' );

foreach ( $sections as $section ) {
	$template_path = 'template-parts/page-builder/' . $section['_type'];

	/**
	 * Remove '_type' element from the array so in the section template we
	 * can easily detect if all of the fields are empty
	 */
	unset( $section['_type'] );

	/**
	 * Remove empty fields from array so we can check if there are any filled fields
	 */
	$section = array_filter( $section );

	/**
	 * Do not import the section in the page if all of the fields for it are empty
	 */
	if ( empty( $section ) ) {
		continue;
	}

	get_template_part( $template_path, null, $section );
}

get_footer();
