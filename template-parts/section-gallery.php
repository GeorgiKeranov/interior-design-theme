<?php 
$gallery = carbon_get_the_post_meta( 'idt_gallery' );

if ( empty( $gallery ) ) {
	return;
}

get_template_part('template-parts/pswp-static-html');
?>

<div class="section-gallery">
	<div class="section__columns">
		<?php foreach ( $gallery as $image ) :
			$image_full_size_src = wp_get_attachment_image_src( $image, 'full' );
			$image_full_size_url = $image_full_size_src[0];
			$image_full_size_width_and_height = $image_full_size_src[1] . 'x' . $image_full_size_src[2];

			$image_small = wp_get_attachment_image( $image, 'medium_fixed' );
			?>
			<figure>
				<a href="<?php echo $image_full_size_url ?>" data-size="<?php echo $image_full_size_width_and_height ?>">
					<?php echo $image_small ?>
				</a>
			</figure>
		<?php endforeach; ?>
	</div><!-- /.section__columns -->
</div><!-- /.section-gallery -->
