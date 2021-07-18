<?php
/**
 * Template Name: Page Builder
 */

the_post();


get_header();

$sections = carbon_get_the_post_meta( 'idt_page_builder_sections' );

foreach ( $sections as $section ) {
	$template_path = 'template-parts/page-builder/' . $section['_type'];

	get_template_part($template_path, null, $section );
}

get_footer();
