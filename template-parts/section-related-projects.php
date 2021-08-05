<?php
$related_projects = idt_get_related_posts( get_the_ID(), 'idt_project_category' );

if ( empty( $related_projects ) ) {
	return;
}
?>

<div class="section-related-projects">
	<div class="container">
		<h2><?php _e( 'Други проекти', 'idt' ) ?></h2>

		<div class="section__projects">
			<div class="section-cols section-cols--three">
				<?php foreach ( $related_projects as $project_id ) :
					$thumbnail_id = get_post_thumbnail_id( $project_id );
					$title = get_the_title( $project_id );
					$permalink = get_the_permalink( $project_id );
					$date_created = get_the_date( 'd.m.Y г.', $project_id );
					?>
					<div class="section__col">
						<?php if ( !empty( $thumbnail_id ) ) : ?>
							<div class="section__image">
								<a href="<?php echo $permalink ?>">
									<?php echo wp_get_attachment_image( $thumbnail_id ) ?>
								</a>
							</div><!-- /.section__image -->
						<?php endif; ?>

						<div class="section__details">
							<p><a href="<?php echo $permalink ?>"><?php echo esc_html( $title ) ?></a></p>

							<p><a href="<?php echo $permalink ?>"><?php echo $date_created ?></a></p>
						</div><!-- /.section__details -->
					</div><!-- /.section__col -->
				<?php endforeach; ?>
			</div><!-- /.section-cols section-cols--three -->
		</div><!-- /.section__projects -->
	</div><!-- /.container -->
</div><!-- /.section-related-projects -->
