<div class="section-image-with-tabs">
	<?php if ( !empty( $args['image'] ) ) : ?>
		<div class="section__image">
			<div class="section__image-background" style="background-image: url(<?php echo wp_get_attachment_image_url( $args['image'], 'large' ) ?>)">
			</div><!-- /.section__image-background -->
		</div><!-- /.section__image -->
	<?php endif; ?>

	<?php if ( !empty( $args['tabs'] ) ) : ?>
		<div class="section__tabs">
			<?php if ( !empty( $args['add_breadcrumbs'] ) ) {
				idt_the_breadcrumbs();
			} ?>

			<div class="section__columns">
				<ul class="section__tabs-titles">
					<?php foreach ( $args['tabs'] as $index => $tab ) : ?>
						<li<?php echo $index === 0 ? ' class="active"' : '' ?>>
							<a href="<?php echo $index ?>"><?php echo esc_html( $tab['title'] ) ?></a>
						</li>
					<?php endforeach; ?>
				</ul><!-- /.section__tabs-titles -->

				<div class="section__tabs-content">
					<?php foreach ( $args['tabs'] as $index => $tab ) : ?>
						<div class="section__tab-content<?php echo $index === 0 ? ' section__tab-content--active' : '' ?>" data-tab-index="<?php echo $index ?>">
							<?php echo apply_filters( 'the_content', $tab['text'] ); ?>
						</div><!-- /.section__tab-content -->
					<?php endforeach; ?>
				</div><!-- /.section__tab-content -->
			</div><!-- /.section__columns -->
		</div><!-- /.section__tabs -->
	<?php endif; ?>
</div><!-- /.section-image-with-tabs -->