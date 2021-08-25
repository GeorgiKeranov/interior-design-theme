<?php

function idt_the_header_logo() {
	$header_logo_id = carbon_get_theme_option( 'idt_header_logo' );

	$header_logo_details = idt_get_logo_details( $header_logo_id );

	// Change logo width and height to be 2 times smaller to look good on retina displays
	$header_logo_details['width'] = intval( $header_logo_details['width'] / 2 );
	$header_logo_details['height'] = intval( $header_logo_details['height'] / 2 ); ?>

	<a href="<?php echo home_url('/') ?>" class="logo" style="background-image:url(<?php echo $header_logo_details['url'] ?>); width: <?php echo $header_logo_details['width'] ?>px; height: <?php echo $header_logo_details['height'] ?>px;"></a>

	<?php
}

function idt_the_footer_logo() {
	$footer_logo_id = carbon_get_theme_option( 'idt_footer_logo' );

	$footer_logo_details = idt_get_logo_details( $footer_logo_id, 'white' );

	// Change logo width and height to be 2 times smaller to look good on mobile devices
	$footer_logo_width_mobile = intval( $footer_logo_details['width'] / 2 );
	$footer_logo_height_mobile = intval( $footer_logo_details['height'] / 2 );
	?>

	<style>
		.logo--footer {
			background-image:url(<?php echo $footer_logo_details['url'] ?>);
			width: <?php echo $footer_logo_details['width'] ?>px;
			height: <?php echo $footer_logo_details['height'] ?>px;
		}

		@media (max-width: 600px) {
			.logo--footer {
				width: <?php echo $footer_logo_width_mobile ?>px;
				height: <?php echo $footer_logo_height_mobile ?>px;
			}
		}
	</style>

	<a href="<?php echo home_url('/') ?>" class="logo logo--footer"></a>

	<?php
}


function idt_get_logo_details($logo_id, $placeholder_logo_color = 'black') {
	$logo_details = array(
		'url' => get_bloginfo( 'stylesheet_directory' ) . '/images/placeholder-logo-' . $placeholder_logo_color . '.png',
		'width' => 300, // Width of the static placeholder logos
		'height' => 62 // Height of the static placeholder logos
	);

	if ( !empty( $logo_id ) ) {
		$logo_src = wp_get_attachment_image_src( $logo_id, 'medium' );
		
		if ( !empty( $logo_src ) ) {
			$logo_details = array(
				'url' => $logo_src[0],
				'width' => $logo_src[1],
				'height' => $logo_src[2],
			);
		}
	}

	return $logo_details;
}
