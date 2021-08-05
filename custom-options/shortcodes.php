<?php

/**
 * Returns current year
 *
 * @uses [year]
 */
add_shortcode( 'year', 'idt_shortcode_year' );
function idt_shortcode_year() {
	return date( 'Y' );
}

/**
 * Button Shortcode
 */
add_shortcode( 'button', 'idt_shortcode_example' );
function idt_shortcode_example( $atts, $content ) {
	$atts = shortcode_atts( array(
			'link' => '#',
		), $atts, 'button'
	);

	ob_start();
	?>
	<a class="btn" href="<?php echo esc_url( $atts['link'] ) ?>"><?php echo $content ?></a>
	<?php
	$html = ob_get_clean();

	return $html;
}
