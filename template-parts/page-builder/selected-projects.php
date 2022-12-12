<?php
$projects = $args['idt_selected_projects'];

$projects_ids = array();

foreach ( $projects as $project ) {
	$projects_ids[] = $project['id'];
}
?>

<section class="section-projects section-projects--alt">
	<div class="section__content">
		<?php get_template_part( 'template-parts/projects-from-listing', null, $projects_ids ) ?>
	</div><!-- /.section__content -->

	<div class="section__cta section-fade">
		<div class="container">
			<?php idt_render_button( $args['btn_text'], $args['btn_link'], $args['btn_new_tab'], 'btn' ) ?>
		</div><!-- /.container -->
	</div><!-- /.section__cta -->
</section><!-- /.section-projects -->