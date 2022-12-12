<?php

add_action( 'login_head', 'idt_add_custom_login_styles' );
function idt_add_custom_login_styles() {
	echo '<link rel="stylesheet" type="text/css" href="'. get_bloginfo( 'stylesheet_directory' ) . '/admin-login.css" />';
}
