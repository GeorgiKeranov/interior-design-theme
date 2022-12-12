<?php 
$modifier_classes = '';

if ( !empty( $args['swap_columns'] ) ) {
	$modifier_classes .= ' section-txt-with-wide-img--swap';
}

if ( !empty( $args['add_breadcrumbs'] ) ) {
	$modifier_classes .= ' section-txt-with-wide-img--breadcrumbs';
}
?>

<div class="section-txt-with-wide-img<?php echo $modifier_classes ?>">
	<div class="section__content">
		<?php
		if ( !empty( $args['add_breadcrumbs'] ) ) {
			idt_the_breadcrumbs();
		}

		echo do_shortcode( apply_filters( 'the_content', $args['text'] ) );
		?>
	</div><!-- /.section__content -->

	<div class="section__image section-fade">
		<div class="section__background" style="background-image: url(<?php echo wp_get_attachment_image_url( $args['image'], 'large' ) ?>)"></div><!-- /.section__background -->
	</div><!-- /.section__image -->
</div><!-- /.section-text-with-wide-image -->