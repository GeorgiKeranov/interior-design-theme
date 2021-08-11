<?php
if ( empty( $posts ) ) {
	return;
}

foreach ( $posts as $post ) :
	$post_id = $post->ID;
	$post_title = $post->post_title;
	$post_thumbnail = get_the_post_thumbnail_url( $post_id, 'medium_large_fixed' );
	$post_permalink = get_the_permalink( $post_id ); ?>
	
	<div class="section__post">
		<div class="section__image">
			<div class="section__image-background" style="background-image: url(<?php echo $post_thumbnail ?>)">
			</div><!-- /.section__image-background -->

			<div class="section__title">
				<h2><a href="<?php echo $post_permalink ?>"><?php echo esc_html( $post_title ) ?></a></h2>
			</div><!-- /.section__title -->
			
			<div class="section__view-post">
				<a href="<?php echo $post_permalink ?>"><?php _e( 'НАУЧЕТЕ ПОВЕЧЕ', 'idt' ) ?> <?php echo idt_get_svg('icon-arrow-right') ?></a>
			</div><!-- /.section__view-post -->
		</div><!-- /.section__image -->
	</div><!-- /.section__post -->
<?php endforeach; ?>