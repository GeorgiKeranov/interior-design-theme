<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Interior_Design_Theme
 */

get_header();

if ( is_single() ) {
	get_template_part( 'template-parts/single', 'content' );
} else {
	get_template_part( 'template-parts/archive', 'content' );
}

get_footer();
