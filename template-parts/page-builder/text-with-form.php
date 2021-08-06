<div class="section-txt-with-form">
	<div class="section-form">
		<div class="section__text">
			<?php echo apply_filters( 'the_content', $args['text'] ) ?>
		</div><!-- /.section__text -->
		
		<?php echo do_shortcode( $args['form_shortcode'] ) ?>
	</div><!-- /.section-form -->
</div><!-- /.section-txt-with-form -->