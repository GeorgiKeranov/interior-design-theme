<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Page Builder
 */
Container::make( 'post_meta', __( 'Елементи на страница', 'idt' ) )
	->where( 'post_template', '=', 'templates/page-builder.php' )
	->add_fields( array(
		Field::make( 'complex', 'idt_page_builder_sections', '' )

			/**
			 * Selected Projects
			 */
			->add_fields( 'selected-projects', __( 'Селектирани Проекти', 'idt' ), array(
				Field::make( 'text', 'title', __('Заглавие', 'idt') )
			) )
	) );
