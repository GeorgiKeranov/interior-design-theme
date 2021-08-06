<div class="section-txt-cols-with-checkboxes">
	<div class="container">
		<?php if ( !empty( $args['text_top'] ) ) : ?>
			<div class="section__top">
				<?php echo apply_filters( 'the_content', $args['text_top'] ); ?>
			</div><!-- /.section__top -->
		<?php endif; ?>

		<div class="section-cols section-cols--three">
			<?php $check_svg = idt_get_svg('icon-check') ?>

			<div class="section__col">
				<?php if ( !empty( $args['title_left'] ) ) : ?>
					<h3><?php echo $check_svg ?> <?php echo esc_html( $args['title_left'] ) ?></h3>
				<?php endif; ?>

				<?php if ( !empty( $args['text_left'] ) ) : ?>
					<p><?php echo nl2br( esc_html( $args['text_left'] ) ) ?></p>
				<?php endif; ?>					
			</div><!-- /.section__col -->

			<div class="section__col">
				<?php if ( !empty( $args['title_center'] ) ) : ?>
					<h3><?php echo $check_svg ?> <?php echo esc_html( $args['title_center'] ) ?></h3>
				<?php endif; ?>

				<?php if ( !empty( $args['text_center'] ) ) : ?>
					<p><?php echo nl2br( esc_html( $args['text_center'] ) ) ?></p>
				<?php endif; ?>	
			</div><!-- /.section__col -->

			<div class="section__col">
				<?php if ( !empty( $args['title_right'] ) ) : ?>
					<h3><?php echo $check_svg ?> <?php echo esc_html( $args['title_right'] ) ?></h3>
				<?php endif; ?>

				<?php if ( !empty( $args['text_right'] ) ) : ?>
					<p><?php echo nl2br( esc_html( $args['text_right'] ) ) ?></p>
				<?php endif; ?>	
			</div><!-- /.section__col -->
		</div><!-- /.section-cols section-cols--three -->

		<?php if ( !empty( $args['text_bottom'] ) ) : ?>
			<div class="section__bottom">
				<?php echo apply_filters( 'the_content', $args['text_bottom'] ); ?>
			</div><!-- /.section__bottom -->
		<?php endif; ?>

		<?php if ( !empty($args['add_image_cols'] ) ) : ?>
			<div class="section__images">
				<div class="section-cols section-cols--three">
					<div class="section__col">
						<?php
						if ( !empty( $args['image_left'] ) ) {
							echo wp_get_attachment_image( $args['image_left'], 'large' );
						}

						echo apply_filters( 'the_content', $args['image_text_left'] );
						?>
					</div><!-- /.section__col -->

					<div class="section__col">
						<?php
						if ( !empty( $args['image_center'] ) ) {
							echo wp_get_attachment_image( $args['image_center'], 'large' );
						}

						echo apply_filters( 'the_content', $args['image_text_center'] );
						?>
					</div><!-- /.section__col -->

					<div class="section__col">
						<?php
						if ( !empty( $args['image_right'] ) ) {
							echo wp_get_attachment_image( $args['image_right'], 'large' );
						}

						echo apply_filters( 'the_content', $args['image_text_right'] );
						?>
					</div><!-- /.section__col -->
				</div><!-- /.section-cols section-cols--three -->
			</div><!-- /.section__images -->
		<?php endif; ?>
	</div><!-- /.container -->
</div><!-- /.section-txt-cols-with-checkboxes -->