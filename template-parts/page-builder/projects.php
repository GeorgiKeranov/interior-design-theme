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

	<?php if ( !empty( $projects ) ) : ?>
		<div class="section__content">
			<?php foreach ( $projects as $project_id ) :
				$project_title = get_the_title( $project_id );
				$project_permalink = get_the_permalink( $project_id );
				$project_thumbnail_id = get_post_thumbnail_id( $project_id ); ?>

				<div class="section__project">
					<?php if ( !empty( $project_thumbnail_id ) ) : ?>
						<div class="section__thumbnail">
							<?php echo wp_get_attachment_image( $project_thumbnail_id, 'medium_large_fixed' ) ?>
						</div><!-- /.section__thumbnail -->
					<?php endif; ?>

					<a href="<?php echo $project_permalink ?>"></a>

					<div class="section__title">
						<h2><a href="<?php echo $project_permalink ?>"><?php echo esc_html( $project_title ) ?></a></h2>
					</div><!-- /.section__title -->
					
					<div class="section__view-project">
						<a href="<?php echo $project_permalink ?>"><?php _e( 'Виж проект', 'idt' ) ?> <?php echo idt_get_svg('icon-arrow-right') ?></a>
					</div><!-- /.section__view-project -->
				</div><!-- /.section__project -->
			<?php endforeach; ?>
		</div><!-- /.section__content -->
	<?php endif; ?>
</div><!-- /.section-projects -->