<?php 
$style = '';
if ( !empty( $args['background_image'] ) ) {
	$background_image_url = wp_get_attachment_url( $args['background_image'], 'full' );

	$style = ' style="background-image: url(' . $background_image_url . ')"';
}
?>

<div class="section-txt-cols-with-image"<?php echo $style ?>>
	<div class="container">
		<div class="section-cols section-cols--two">
			<div class="section__col">
				<?php if ( !empty( $args['text_left'] ) ) {
					echo apply_filters( 'the_content', $args['text_left'] );
				} ?>
			</div><!-- /.section__col -->

			<div class="section__col">
				<?php if ( !empty( $args['text_left'] ) ) {
					echo apply_filters( 'the_content', $args['text_right'] );
				} ?>
			</div><!-- /.section__col -->
		</div><!-- /.section-two-cols -->
	</div><!-- /.container -->
</div><!-- /.section-txt-cols-with-image -->