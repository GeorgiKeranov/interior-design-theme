<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', 'idt_theme_options', __( 'Опции на Темата', 'idt' ) )
	->set_page_file( 'idt-theme-options.php' )
	->add_tab( __( 'Заглавна част (най-отгоре на сайта)', 'idt' ), array(
		Field::make( 'image', 'idt_header_logo', __( 'Лого', 'idt' ) )
			->set_help_text( 'Препоръчително е височината и ширината да са число което се дели на две', 'idt' ),
	) )
	->add_tab( __( 'Долен колунтитул (най-отдолу на сайта)', 'idt' ), array(
		Field::make( 'image', 'idt_footer_logo', __( 'Лого', 'idt' ) )
			->set_help_text( 'Препоръчително е височината и ширината да са число което се дели на две', 'idt' ),
		Field::make( 'text', 'idt_phone', __( 'Телефон', 'idt' ) ),
		Field::make( 'text', 'idt_email', __( 'Имейл', 'idt' ) ),
		Field::make( 'text', 'idt_facebook_link', __( 'Линк към Facebook', 'idt' ) ),
		Field::make( 'text', 'idt_instagram_link', __( 'Линк към Instagram', 'idt' ) ),
		Field::make( 'text', 'idt_youtube_link', __( 'Линк към Youtube', 'idt' ) ),
		Field::make( 'text', 'idt_copyright', __( 'Копирайт', 'idt' ) ),
	) );
