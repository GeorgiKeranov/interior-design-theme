<div class="section-text-with-wide-image<?php echo !empty( $args['swap_columns'] ) ? ' section-text-with-wide-image--swap' : '' ?>">
	<div class="section__content">
		<?php
		if ( !empty( $args['add_breadcrumbs'] ) ) {
			idt_the_breadcrumbs();
		}

		echo do_shortcode( apply_filters( 'the_content', $args['text'] ) );
		?>
	</div><!-- /.section__content -->

	<div class="section__image" style="background-image: url(<?php echo wp_get_attachment_image_url( $args['image'], 'large' ) ?>)">
	</div><!-- /.section__image -->
</div><!-- /.section-text-with-wide-image -->