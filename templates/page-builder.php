<?php
/**
 * Template Name: Page Builder
 */

the_post();

get_header();

$sections = carbon_get_the_post_meta( 'idt_page_builder_sections' );

$sections_without_fields = array(
	'projects',
);

foreach ( $sections as $section ) {
	$section_type = $section['_type'];

	$template_path = 'template-parts/page-builder/' . $section_type;

	/**
	 * Remove '_type' element from the array so in the section template we
	 * can easily detect if all of the fields are empty
	 */
	unset( $section_type );

	/**
	 * Remove empty fields from array so we can check if there are any filled fields
	 */
	$section = array_filter( $section );

	/**
	 * Do not import the section in the page if all of the fields for it are empty
	 *
	 * Exceptions to this rule are the sections that are declared without fields
	 */
	if ( empty( $section ) && !in_array( $section_type, $sections_without_fields ) ) {
		continue;
	}

	get_template_part( $template_path, null, $section );
}

get_footer();
