<?php
$categories = get_terms( array(
    'taxonomy' => 'idt_project_category',
    'hide_empty' => false,
) );

$projects = get_posts( array(
	'post_type' => 'idt_project',
	'post_status' => 'publish',
	'posts_per_page' => '12',
	'fields' => 'ids',
) );
?>

<div class="section-projects">
	<?php if ( !empty( $categories ) ) : ?>
		<div class="section__categories">
			<ul class="categories">
				<li>
					<a href="all" class="active"><?php _e( 'Всички Проекти' ) ?></a>
				</li>

				<?php foreach ( $categories as $category ) : ?>
					<li>
						<a href="<?php echo $category->term_id ?>"><?php echo esc_html( $category->name ) ?></a>
					</li>
				<?php endforeach; ?>
			</ul><!-- /.categories -->
		</div><!-- /.section__categories -->
	<?php endif; ?>

	<div class="section__content">
		<?php get_template_part( 'template-parts/projects-from-listing', null, $projects ) ?>		
	</div><!-- /.section__content -->

	<div class="section__content-loading">
		<?php echo idt_get_svg('icon-loading') ?>
	</div><!-- /.section__content-loading -->
</div><!-- /.section-projects -->