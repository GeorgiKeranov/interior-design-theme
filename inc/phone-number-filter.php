<?php

function idt_filter_phone_number( $phone ) {
	return preg_replace('/[^0-9\-\_\+]*/', '', $phone);
}
