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
			->add_fields( 'text-columns-with-background-image', __( 'Текстови колони със снимка за фон', 'idt' ), array(
				Field::make( 'image', 'background_image', __( 'Снимка за фон', 'idt' ) ),
				Field::make( 'rich_text', 'text_left', __( 'Текст в лява колона', 'idt' ) )
					->set_width( 50 ),
				Field::make( 'rich_text', 'text_right', __( 'Текст в дясна колона', 'idt' ) )
					->set_width( 50 ),
			) )

			/**
			 * Text Columns With Checkboxes
			 */
			->add_fields( 'text-columns-with-checkboxes', __( 'Текстови колони с отметки', 'idt' ), array(
				Field::make( 'rich_text', 'text_top', __( 'Текст отгоре', 'idt' ) ),
				Field::make( 'text', 'title_left', __( 'Заглавие в лява колона', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'text', 'title_center', __( 'Заглавие в централна колона', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'text', 'title_right', __( 'Заглавие в дясна колона', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'textarea', 'text_left', __( 'Текст в лява колона', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'textarea', 'text_center', __( 'Текст в централна колона', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'textarea', 'text_right', __( 'Текст в дясна колона', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'rich_text', 'text_bottom', __( 'Текст отдолу', 'idt' ) ),
			) )
	) );
