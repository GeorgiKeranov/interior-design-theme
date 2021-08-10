<?php
if ( empty( $args ) ) : ?>
	<div class="container">
		<h2><?php _e( 'Няма намерени проекти в тази категория', 'idt' ); ?></h2>
	</div>

	<?php return;
endif;

$projects = $args;

foreach ( $projects as $project_id ) :
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
