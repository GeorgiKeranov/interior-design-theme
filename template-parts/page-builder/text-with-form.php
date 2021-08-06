<div class="section-txt-with-form">
	<div class="section__form">
		<div class="section__content">
			<?php echo apply_filters( 'the_content', $args['text'] ) ?>
		</div><!-- /.section__content -->
		<?php echo do_shortcode( $args['form_shortcode'] ) ?>
	</div><!-- /.section__form -->
</div><!-- /.section-txt-with-form -->