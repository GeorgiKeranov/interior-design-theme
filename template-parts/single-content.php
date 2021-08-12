<div class="section-page">
	<div class="container">
		<?php idt_the_breadcrumbs(); ?>

		<div class="section__title">
			<h1><?php the_title() ?></h1>
		</div><!-- /.section__title -->

		<div class="section__content">
			<?php the_content() ?>
		</div><!-- /.section__content -->
	</div><!-- /.container -->
</div><!-- /.section-page -->

<?php
// Render releated posts if this page is single of the 'post' post type
if ( is_singular( 'post' ) ) {
	get_template_part('template-parts/section-related-posts', null, array(
		'title' => __( 'Други постове', 'idt' ),
		'taxonomy' => 'category',
	) );
}
