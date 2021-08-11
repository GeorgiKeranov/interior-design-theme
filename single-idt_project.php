<?php 

the_post();

get_header();

get_template_part('template-parts/single-idt_project/section-content');

get_template_part('template-parts/single-idt_project/section-gallery');

get_template_part('template-parts/section-related-posts', null, array(
	'title' => __( 'Други проекти', 'idt' ),
	'taxonomy' => 'idt_project_category',
) );

get_footer();
