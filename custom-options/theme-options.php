<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Опции на Темата', 'idt' ) )
	->set_page_file( 'idt-theme-options.php' )
	->add_tab( __( 'Долен колунтитул', 'idt' ), array(
		Field::make( 'text', 'idt_phone', __( 'Телефон', 'idt' ) ),
		Field::make( 'text', 'idt_email', __( 'Имейл', 'idt' ) ),
		Field::make( 'text', 'idt_facebook_link', __( 'Линк към Facebook', 'idt' ) ),
		Field::make( 'text', 'idt_instagram_link', __( 'Линк към Instagram', 'idt' ) ),
		Field::make( 'text', 'idt_youtube_link', __( 'Линк към Youtube', 'idt' ) ),
		Field::make( 'text', 'idt_copyright', __( 'Копирайт', 'idt' ) ),
	) );
