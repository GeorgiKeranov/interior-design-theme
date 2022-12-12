<?php
$projects_query = new WP_Query( array(
	'post_type' => 'idt_project',
	'post_status' => 'publish',
	'posts_per_page' => '12',
	'fields' => 'ids',
) );
?>

<div class="section-projects section-projects--js-ajax section-fade" data-max-pages="<?php echo $projects_query->max_num_pages ?>">
	<div class="section__categories">
		<?php get_template_part('template-parts/taxonomy-categories', null, array(
			'taxonomy' => 'idt_project_category'
		) ); ?>
	</div><!-- /.section__categories -->

	<div class="section__content">
		<?php get_template_part( 'template-parts/projects-from-listing', null, $projects_query->posts ) ?>
	</div><!-- /.section__content -->

	<div class="section__content-loading">
		<?php echo idt_get_svg('icon-loading') ?>
	</div><!-- /.section__content-loading -->
</div><!-- /.section-projects -->