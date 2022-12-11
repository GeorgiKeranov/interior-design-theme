<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Page Builder
 */
Container::make( 'post_meta', 'idt_page_builder', __( 'Елементи на страница', 'idt' ) )
	->where( 'post_template', '=', 'templates/page-builder.php' )
	->add_fields( array(
		Field::make( 'complex', 'idt_page_builder_sections', '' )
			->set_layout( 'tabbed-vertical' )
			
			/**
			 * Heading
			 */
			->add_fields( 'heading', __( 'Заглавие', 'idt' ), array(
				Field::make( 'checkbox', 'add_breadcrumbs', __( 'Добави линкове за страници' ) ),
				Field::make( 'text', 'title', __( 'Заглавие', 'idt' ) ),
				Field::make( 'textarea', 'description', __( 'Описание', 'idt' ) ),
			) )

			/**
			 * Intro
			 */
			->add_fields( 'intro', __( 'Интро', 'idt' ), array(
				Field::make( 'image', 'background_image', __( 'Снимка за фон', 'idt' ) ),
				Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) ),
				Field::make( 'separator', 'btn_left', __( 'Ляв бутон', 'idt' ) ),
				Field::make( 'text', 'btn_left_text', __( 'Текст на бутон', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'text', 'btn_left_link', __( 'Линк на бутон', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'select', 'btn_left_new_tab', __( 'Да се отваря ли линкът на бутона в нов таб', 'idt' ) )
					->set_options( array(
						'no' => __( 'Не', 'idt' ),
						'yes' => __( 'Да', 'idt' ),
					) )
					->set_width( 33 ),
				Field::make( 'separator', 'btn_right', __( 'Десен бутон', 'idt' ) ),
				Field::make( 'text', 'btn_right_text', __( 'Текст на бутон', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'text', 'btn_right_link', __( 'Линк на бутон', 'idt' ) )
					->set_width( 33 ),
				Field::make( 'select', 'btn_right_new_tab', __( 'Да се отваря ли линкът на бутона в нов таб', 'idt' ) )
					->set_options( array(
						'no' => __( 'Не', 'idt' ),
						'yes' => __( 'Да', 'idt' ),
					) )
					->set_width( 33 ),
			) )

			/**
			 * Selected Projects
			 */
			->add_fields( 'selected-projects', __( 'Само избрани проекти', 'idt' ), array(
				Field::make( 'association', 'idt_selected_projects', __( 'Избери проекти', 'idt' ) )
					->set_types( array(
						array(
							'type' =>'post',
							'post_type' => 'idt_project'
						)
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

			/**
			 * Projects
			 */
			->add_fields( 'projects', __( 'Всички проекти', 'idt' ), array(
				Field::make( 'separator', 'projects_separator', __( 'Всички категории на проекти и проекти ще бъдат генерирани автоматично', 'idt' ) )
			) )

			/**
			 * Prices
			 */
			->add_fields( 'prices', __( 'Цени', 'idt' ), array(
				Field::make( 'text', 'title', __( 'Заглавие', 'idt' ) ),
				Field::make( 'complex', 'prices', __( 'Ценови колони', 'idt' ) )
					->set_max(3)
					->set_layout( 'tabbed-horizontal' )
					->add_fields( array(
						Field::make( 'text', 'title', __( 'Заглавие', 'idt' ) ),
						Field::make( 'text', 'price', __( 'Цена', 'idt' ) ),
						Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) ),
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
					->set_header_template( '<%- title %>' ),
					Field::make( 'text', 'calculator_title', __( 'Заглавие на калкулатор', 'idt' ) ),
					Field::make( 'text', 'calculator_text', __( 'Текст преди да е въведена квадратура', 'idt' ) ),
			) )

			/**
			 * Text With Background Image
			 */
			->add_fields( 'text-with-background-image', __( 'Текст със снимка за фон', 'idt' ), array(
				Field::make( 'image', 'background_image', __( 'Снимка за фон', 'idt' ) ),
				Field::make( 'rich_text', 'text', __( 'Текст', 'idt' ) )
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
			 * Contacts
			 */
			->add_fields( 'contact-text-with-form', __( 'Контакти', 'idt' ), array(
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

			/**
			 * Testimonials Slider
			 */
			->add_fields( 'testimonials-slider', __( 'Слайдер с препоръки', 'idt' ), array(
				Field::make( 'text', 'title', __( 'Заглавие', 'idt' ) ),
				Field::make( 'complex', 'slides', __( 'Слайдове', 'idt' ) )
					->set_layout( 'tabbed-horizontal' )
					->add_fields( array(
						Field::make( 'image', 'image', __( 'Снимка на автор', 'idt' ) ),
						Field::make( 'textarea', 'testimonial', __( 'Препоръка', 'idt' ) ),
						Field::make( 'text', 'name', __( 'Име на автор', 'idt' ) ),
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
					) ),
			) )
	) );


/**
 * Single Project
 */
Container::make( 'post_meta', 'idt_single_project', __( 'Настройки', 'idt' ) )
	->where( 'post_type', '=', 'idt_project' )
	->add_fields( array(
		Field::make( 'media_gallery', 'idt_gallery', __( 'Галерия', 'idt' ) )
		    ->set_type( array( 'image' ) )
	) );
