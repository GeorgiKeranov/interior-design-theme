<div class="section-testimonials-slider">
	<div class="container">
		<?php if ( !empty( $args['title'] ) ) : ?>
			<div class="section__text">
				<h2><?php echo esc_html( $args['title'] ) ?></h2>
			</div><!-- /.section__text -->
		<?php endif; ?>

		<?php if ( !empty( $args['slides'] ) ) : ?>
			<div class="section__slider section-fade">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php foreach ( $args['slides'] as $slide ) : ?>
							<div class="swiper-slide">
								<div class="swiper-slide__inner">
									<div class="swiper-slide__inner-inner">
										<?php if ( !empty( $slide['image'] ) ) :
											$image_url = wp_get_attachment_image_url( $slide['image'] );
											$style = 'style="background-image:url(' . $image_url . ')"'; ?>

											<div class="swiper-slide__image">
												<div class="swiper-slide__image-background" <?php echo $style ?>>
												</div><!-- /.swiper-slide__image-background -->
											</div><!-- /.swiper-slide__image -->
										<?php endif; ?>

										<div class="swiper-slide__content">
											<?php if ( !empty( $slide['testimonial'] ) ) : ?>
												<div class="swiper-slide__text">
													<p><span>“</span><?php echo esc_html( $slide['testimonial'] ) ?></p>
												</div><!-- /.swiper-slide__text -->
											<?php endif; ?>

											<div class="swiper-slide__footer">
												<?php if ( !empty( $slide['add_btn'] ) && ( !empty( $slide['btn_text'] ) && !empty( $slide['btn_link'] ) ) ) : ?>
													<div class="swiper-slide__actions">
														<?php idt_render_button( $slide['btn_text'], $slide['btn_link'], $slide['btn_new_tab'], 'btn' ) ?>
													</div><!-- /.swiper-slide__actions -->
												<?php endif; ?>

												<?php if ( !empty( $slide['name'] ) ) : ?>
													<div class="swiper-slide__author">
														<h3>- <?php echo esc_html( $slide['name'] ) ?></h3>
													</div><!-- /.swiper-slide__author -->
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div><!-- /.swiper-slide__inner -->
							</div>
						<?php endforeach; ?>
					</div>

					<div class="swiper-pagination"></div>

					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div><!-- /.section__slider -->
		<?php endif; ?>
	</div><!-- /.container -->
</div><!-- /.section-testimonials-slider -->