<?php 
$background_image = '';

if ( !empty( $args['background_image'] ) ) {
	$background_image = ' style="background-image:url(' . wp_get_attachment_image_url( $args['background_image'], 'full' ) . ')"';
}
?>

<div class="section-columns-with-icon-and-text"<?php echo $background_image ?>>
	<div class="container">
		<?php if ( !empty( $args['title'] ) ) : ?>
			<h2><?php echo esc_html( $args['title'] ) ?></h2>
		<?php endif; ?>

		<div class="section-cols section-cols--three">
			<?php foreach ( $args['columns'] as $column ) : ?>
				<div class="section__col">
					<?php if ( !empty( $column['icon'] ) ) : ?>
						<div class="section__icon">
							<?php echo wp_get_attachment_image( $column['icon'] ) ?>
						</div><!-- /.section__icon -->
					<?php endif; ?>

					<?php if ( !empty( $column['text'] ) ) : ?>
						<div class="section__text">
							<?php echo apply_filters( 'the_content', $column['text'] ) ?>
						</div><!-- /.section__text -->
					<?php endif; ?>
				</div><!-- /.section__col -->
			<?php endforeach; ?>
		</div><!-- /.section-cols section-cols--three -->

		<div class="section__actions">
			<?php idt_render_button( $args['btn_text'], $args['btn_link'], $args['btn_new_tab'], 'btn-alt' ) ?>
		</div><!-- /.section__actions -->
	</div><!-- /.container -->
</div><!-- /.section-columns-with-icon-and-text -->