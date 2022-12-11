<?php 
$style = '';
if ( !empty( $args['background_image'] ) ) {
	$background_image_url = wp_get_attachment_url( $args['background_image'], 'full' );

	$style = ' style="background-image: url(' . $background_image_url . ')"';
}
?>

<div id="consultation" class="section-txt-with-background-image"<?php echo $style ?>>
	<div class="container">
		<?php echo apply_filters( 'the_content', $args['text'] ); ?>
	</div><!-- /.container -->
</div><!-- /.section-txt-with-background-image -->