<?php $projects = $args['idt_selected_projects']; ?>

<section class="section-projects">
	<div class="section__content">
		<?php foreach ( $projects as $project ) :
			$project_id = $project['id'];
			$project_permalink = get_the_permalink( $project_id );
			$project_thumbnail_id = get_post_thumbnail_id( $project_id );
			?>
			<div class="section__project">
				<?php if ( !empty( $project_thumbnail_id ) ) : ?>
					<div class="section__thumbnail">
						<?php echo wp_get_attachment_image( $project_thumbnail_id, 'medium_large_fixed' ) ?>
					</div><!-- /.section__thumbnail -->
				<?php endif; ?>

				<a href="<?php echo $project_permalink ?>"></a>

				<div class="section__view-project">
					<a href="<?php echo $project_permalink ?>"><?php _e( 'Виж проект', 'idt' ) ?> <?php echo file_get_contents( get_template_directory_uri() . '/images/icon-arrow-right.svg' ) ?></a>
				</div><!-- /.section__view-project -->
			</div><!-- /.section__project -->
		<?php endforeach; ?>
	</div><!-- /.section__content -->

	<div class="section__cta">
		<div class="container">
			<a href="<?php echo get_post_type_archive_link( 'idt_project' ) ?>" class="btn"><?php _e( 'Разгледай всички проекти', 'idt' ) ?></a>
		</div><!-- /.container -->
	</div><!-- /.section__cta -->
</section><!-- /.section-projects -->