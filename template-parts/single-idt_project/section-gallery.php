<?php 
$gallery = carbon_get_the_post_meta( 'idt_gallery' );

if ( empty( $gallery ) ) {
	return;
}

get_template_part('template-parts/pswp-static-html');
?>

<div class="section-gallery">
	<div class="container">
		<div class="section__columns">
			<?php foreach ( $gallery as $image ) :
				$image_full_size_src = wp_get_attachment_image_src( $image, '2048x2048' );
				$image_full_size_url = $image_full_size_src[0];
				$image_full_size_width_and_height = $image_full_size_src[1] . 'x' . $image_full_size_src[2];

				$image_small_url = wp_get_attachment_image_url( $image, 'medium_large' ); ?>
				
				<figure>
					<a href="<?php echo $image_full_size_url ?>" data-size="<?php echo $image_full_size_width_and_height ?>" style="background-image: url(<?php echo $image_small_url ?>)">
					</a>
				</figure>
			<?php endforeach; ?>
		</div><!-- /.section__columns -->
	</div><!-- /.container -->
</div><!-- /.section-gallery -->
