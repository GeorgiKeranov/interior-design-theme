<div class="section-txt-with-img">
	<div class="container">
		<div class="section-cols section-cols--two">
			<div class="section__col">
				<?php if ( !empty( $args['text'] ) ) {
					echo apply_filters( 'the_content', $args['text'] );
				} ?>
			</div><!-- /.section__col -->

			<div class="section__col">
				<?php if ( !empty( $args['image'] ) ) {
					echo wp_get_attachment_image( $args['image'], 'large' );
				} ?>
			</div><!-- /.section__col -->
		</div><!-- /.section-cols section-cols--two -->
	</div><!-- /.container -->
</div><!-- /.section-txt-with-img -->