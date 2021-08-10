<?php
$projects = $args['idt_selected_projects'];

$projects_ids = array();

foreach ( $projects as $project ) {
	$projects_ids[] = $project['id'];
}
?>

<section class="section-projects">
	<div class="section__content">
		<?php get_template_part( 'template-parts/projects-from-listing', null, $projects_ids ) ?>
	</div><!-- /.section__content -->

	<div class="section__cta">
		<div class="container">
			<a href="<?php echo get_post_type_archive_link( 'idt_project' ) ?>" class="btn"><?php _e( 'Разгледай всички проекти', 'idt' ) ?></a>
		</div><!-- /.container -->
	</div><!-- /.section__cta -->
</section><!-- /.section-projects -->