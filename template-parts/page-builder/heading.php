<div class="section-heading">
	<div class="container">
		<?php if ( $args['add_breadcrumbs'] ) {
			idt_the_breadcrumbs();
		}

		if ( !empty( $args['title'] ) ) : ?>
			<h1><?php echo esc_html( $args['title'] ) ?></h1>
		<?php endif;

		if ( !empty( $args['description'] ) ) : ?>
			<p><?php echo esc_html( $args['description'] ) ?></p>
		<?php endif; ?>
	</div><!-- /.container -->
</div><!-- /.section-heading -->