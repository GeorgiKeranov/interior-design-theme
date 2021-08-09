<?php
$socials = array(
	'facebook' => carbon_get_theme_option( 'idt_facebook_link' ),
	'instagram' => carbon_get_theme_option( 'idt_instagram_link' ),
	'youtube' => carbon_get_theme_option( 'idt_youtube_link' ),
);

// Clear array elements for empty social links
$socials = array_filter( $socials );

if ( empty( $socials ) ) {
	return;
}
?>

<ul>
	<?php foreach ( $socials as $name => $link ) : ?>
		<li>
			<a href="<?php echo esc_url( $link ) ?>" target="_blank"><?php echo idt_get_svg('icon-' . $name) ?></a>
		</li>
	<?php endforeach; ?>
</ul><!-- /.socials -->