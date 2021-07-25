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
				Field::make( 'association', 'idt_selected_projects', __( 'Избери проекти', 'idt' ) )
					->set_types( array(
						array(
							'type' =>'post',
							'post_type' => 'idt_project'
						)
					) )
			) )

			/**
			 * Text Columns With Background Image
			 */
			->add_fields( 'text-columns-with-background-image', __( 'Текстови колони със снимка за фон ', 'idt' ), array(
				Field::make( 'image', 'background_image', __( 'Снимка за фон', 'idt' ) ),
				Field::make( 'rich_text', 'text_left', __( 'Текст в лява колона', 'idt' ) )
					->set_width( 50 ),
				Field::make( 'rich_text', 'text_right', __( 'Текст в дясна колона', 'idt' ) )
					->set_width( 50 ),
			) )
	) );
