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
				Field::make( 'checkbox', 'add_image_cols', __( 'Добави колони със снимки', 'idt' ) ),
				Field::make( 'image', 'image_left', __( 'Снимка в лява колона', 'idt' ) )
					->set_width( 33 )
					->set_conditional_logic( array(
						array(
							'field' => 'add_image_cols',
							'value' => true,
							'compare' => '='
						)
					) ),
				Field::make( 'image', 'image_center', __( 'Снимка в централна колона', 'idt' ) )
					->set_width( 33 )
					->set_conditional_logic( array(
						array(
							'field' => 'add_image_cols',
							'value' => true,
							'compare' => '='
						)
					) ),
				Field::make( 'image', 'image_right', __( 'Снимка в дясна колона', 'idt' ) )
					->set_width( 33 )
					->set_conditional_logic( array(
						array(
							'field' => 'add_image_cols',
							'value' => true,
							'compare' => '='
						)
					) ),
				Field::make( 'rich_text', 'image_text_left', __( 'Текст под снимка в лява колона', 'idt' ) )
					->set_width( 33 )
					->set_conditional_logic( array(
						array(
							'field' => 'add_image_cols',
							'value' => true,
							'compare' => '='
						)
					) ),
				Field::make( 'rich_text', 'image_text_center', __( 'Текст под снимка в централна колона', 'idt' ) )
					->set_width( 33 )
					->set_conditional_logic( array(
						array(
							'field' => 'add_image_cols',
							'value' => true,
							'compare' => '='
						)
					) ),
				Field::make( 'rich_text', 'image_text_right', __( 'Текст под снимка в дясна колона', 'idt' ) )
					->set_width( 33 )
					->set_conditional_logic( array(
						array(
							'field' => 'add_image_cols',
							'value' => true,
							'compare' => '='
						)
					) ),
			) )

			/**
			 * Text With Image
			 */
			->add_fields( 'text-with-image', __( 'Текст със снимка', 'idt' ), array(
				Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) )
					->set_width( 50 ),
				Field::make( 'image', 'image', __( 'Снимка', 'idt' ) )
					->set_width( 50 ),
			) )

			/**
			 * Text With Wide Image
			 */
			->add_fields( 'text-with-wide-image', __( 'Текст със широка снимка', 'idt' ), array(
				Field::make( 'checkbox', 'add_breadcrumbs', __( 'Добави линкове за страници' ) ),
				Field::make( 'checkbox', 'swap_columns', __( 'Размени колоните на текста и снимката', 'idt' ) ),
				Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) )
					->set_width( 50 ),
				Field::make( 'image', 'image', __( 'Снимка', 'idt' ) )
					->set_width( 50 )
					->set_required( true ),
			) )
	) );


/**
 * Single Project
 */
Container::make( 'post_meta', __( 'Настройки', 'idt' ) )
	->where( 'post_type', '=', 'idt_project' )
	->add_fields( array(
		Field::make( 'media_gallery', 'idt_gallery', __( 'Галерия', 'idt' ) )
		    ->set_type( array( 'image' ) )
	) );
