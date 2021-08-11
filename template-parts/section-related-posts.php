<?php
$taxonomy = '';

if ( !empty( $args['taxonomy'] ) ) {
	$taxonomy = $args['taxonomy'];
}

$related_posts = idt_get_related_posts( get_the_ID(), $taxonomy );

if ( empty( $related_posts ) ) {
	return;
}
?>

<div class="section-related-posts">
	<div class="container">
		<?php if ( !empty( $args['title'] ) ) : ?>
			<h2><?php echo esc_html( $args['title'] ) ?></h2>
		<?php endif; ?>

		<div class="section__posts">
			<div class="section-cols section-cols--three">
				<?php foreach ( $related_posts as $project_id ) :
					$thumbnail_id = get_post_thumbnail_id( $project_id );
					$title = get_the_title( $project_id );
					$permalink = get_the_permalink( $project_id );
					$date_created = get_the_date( 'd.m.Y г.', $project_id );
					?>
					<div class="section__col">
						<?php if ( !empty( $thumbnail_id ) ) : ?>
							<div class="section__image">
								<a href="<?php echo $permalink ?>" style="background-image: url(<?php echo wp_get_attachment_image_url( $thumbnail_id ) ?>)"></a>
							</div><!-- /.section__image -->
						<?php endif; ?>

						<div class="section__details">
							<h3><a href="<?php echo $permalink ?>"><?php echo esc_html( $title ) ?></a></h3>

							<p><a href="<?php echo $permalink ?>"><?php echo $date_created ?></a></p>
						</div><!-- /.section__details -->
					</div><!-- /.section__col -->
				<?php endforeach; ?>
			</div><!-- /.section-cols section-cols--three -->
		</div><!-- /.section__posts -->
	</div><!-- /.container -->
</div><!-- /.section-related-posts -->
