<?php
if ( empty( $args['idt_selected_projects'] ) ) {
	return;
}

$projects = $args['idt_selected_projects'];
?>

<section class="section-projects">
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
</section><!-- /.section-projects -->