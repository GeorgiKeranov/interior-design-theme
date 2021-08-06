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

			/**
			 * Text With Form
			 */
			->add_fields( 'text-with-form', __( 'Текст със форма', 'idt' ), array(
				Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) ),
				Field::make( 'text', 'form_shortcode', __( 'Форма шорткод', 'idt' ) )
					->set_help_text( 'Шорткода на формата можете да намерите в Админ панел -> WPForms -> Shortcode' ),
			) )

			/**
			 * Contact text with form
			 */
			->add_fields( 'contact-text-with-form', __( 'Контакти текст с форма', 'idt' ), array(
				Field::make( 'checkbox', 'add_breadcrumbs', __( 'Добави линкове за страници' ) ),
				Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) ),
				Field::make( 'text', 'phone', __( 'Телефон', 'idt' ) ),
				Field::make( 'text', 'email', __( 'Имейл', 'idt' ) ),
				Field::make( 'text', 'work_time_title', __( 'Заглави за работно време', 'idt' ) ),
				Field::make( 'complex', 'work_time_rows', __( 'Работно време редове', 'idt' ) )
					->set_layout( 'tabbed-vertical' )
					->add_fields( array(
						Field::make( 'text', 'text_left', __( 'Текст в ляво', 'idt' ) )
							->set_width( 50 ),
						Field::make( 'text', 'text_right', __( 'Текст в дясно', 'idt' ) )
							->set_width( 50 ),
					) )
					->set_header_template( '<%- text_left %>' ),
				Field::make( 'rich_text', 'form_text', __( 'Текст над формата', 'idt' ) ),
				Field::make( 'text', 'form_shortcode', __( 'Форма шорткод', 'idt' ) )
					->set_help_text( 'Шорткода на формата можете да намерите в Админ панел -> WPForms -> Shortcode' )
			) )

			/**
			 * Image with tabs
			 */
			->add_fields( 'image-with-tabs', __( 'Снимка с табове', 'idt' ), array(
				Field::make( 'checkbox', 'add_breadcrumbs', __( 'Добави линкове за страници' ) ),
				Field::make( 'image', 'image', __( 'Снимка', 'idt' ) ),
				Field::make( 'complex', 'tabs', __( 'Табове', 'idt' ) )
					->set_layout( 'tabbed-vertical' )
					->add_fields( array(
						Field::make( 'text', 'title', __( 'Заглавие', 'idt' ) )
							->set_required( true ),
						Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) )
							->set_required( true ),
					) )
					->set_header_template( '<%- title %>' ),
			) )

			/**
			 * Columns with icon and text
			 */
			->add_fields( 'columns-with-icon-and-text', __( 'Колони с иконка и текст', 'idt' ), array(
				Field::make( 'image', 'background_image', __( 'Снимка на фон', 'idt' ) ),
				Field::make( 'text', 'title', __( 'Заглавие', 'idt' ) ),
				Field::make( 'complex', 'columns', __( 'Колони', 'idt' ) )
					->set_layout( 'tabbed-horizontal' )
					->set_min( 3 )
					->set_max( 3 )
					->add_fields( array(
						Field::make( 'image', 'icon', __( 'Иконка', 'idt' ) ),
						Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) )
					) ),
				Field::make( 'text', 'btn_text', __( 'Текст на бутон', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'text', 'btn_link', __( 'Линк на бутон', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'select', 'btn_new_tab', __( 'Да се отваря ли линкът на бутона в нов таб', 'idt' ) )
					->set_options( array(
						'no' => __( 'Не', 'idt' ),
						'yes' => __( 'Да', 'idt' ),
					) )
					->set_width( 33 ),
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
