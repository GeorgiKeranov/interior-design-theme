<div class="section-contact-txt-with-form">
	<div class="container">
		<div class="section__cols">
			<div class="section__content">
				<?php
				if ( !empty( $args['add_breadcrumbs'] ) ) {
					idt_the_breadcrumbs();
				}

				echo apply_filters( 'the_content', $args['text'] );

				if ( !empty( $args['phone'] ) ) :
					$phone_number = esc_html( $args['phone'] );
					$ready_to_call_phone_number = idt_filter_phone_number( $phone_number ); ?>

					<p><a href="tel:<?php echo $ready_to_call_phone_number ?>"><?php echo idt_get_svg('icon-phone') . ' ' . $phone_number ?></a></p>
				<?php endif; ?>
				
				<?php if ( !empty( $args['email'] ) ) :
					$email = antispambot( esc_html( $args['email'] ) ); ?>

					<p><a href="mailto:<?php echo $email ?>"><?php echo idt_get_svg('icon-mail') . ' ' . $email ?></a></p>
				<?php endif; ?>
				
				<?php get_template_part( 'template-parts/socials' ) ?>

				<?php if ( !empty( $args['work_time_title'] ) ) : ?> 
					<h4><?php echo esc_html( $args['work_time_title'] ) ?></h4>
				<?php endif; ?>

				<?php if ( !empty( $args['work_time_rows'] ) ) : ?>
					<?php foreach ( $args['work_time_rows'] as $row ) : ?>
						<div class="section__work-time">
							<div class="section__left">
								<?php if ( !empty( $row['text_left'] ) ) : ?>
									<p><?php echo esc_html( $row['text_left'] ) ?></p>
								<?php endif; ?>
							</div><!-- /.section__left -->

							<div class="section__right">
								<?php if ( !empty( $row['text_right'] ) ) : ?>
									<p><?php echo esc_html( $row['text_right'] ) ?></p>
								<?php endif; ?>
							</div><!-- /.section__right -->
						</div><!-- /.section__work-time -->
					<?php endforeach; ?>
				<?php endif; ?>
			</div><!-- /.section__content -->

			<div class="section__form">
				<div class="section-form">
					<div class="section__text">
						<?php echo apply_filters( 'the_content', $args['form_text'] ) ?>
					</div><!-- /.section__text -->

					<?php echo do_shortcode( $args['form_shortcode'] ) ?>
				</div><!-- /.section-form -->
			</div><!-- /.section__form -->
		</div><!-- /.section__cols -->
	</div><!-- /.container -->
</div><!-- /.section-txt-with-form -->