<?php
$background_image = '';

if ( !empty( $args['background_image'] ) ) {
	$background_image = ' style="background-image:url(' . wp_get_attachment_image_url( $args['background_image'], 'full' ) . ')"';
}
?>

<div class="section-intro"<?php echo $background_image ?>>
  <div class="container">
    <div class="section__text">
      <?php echo apply_filters( 'the_content', $args['text'] ) ?>
    </div>

		<div class="section__actions">
      <?php idt_render_button( $args['btn_left_text'], $args['btn_left_link'], $args['btn_left_new_tab'], 'btn-alt' ) ?>

      <?php idt_render_button( $args['btn_right_text'], $args['btn_right_link'], $args['btn_right_new_tab'], 'btn-alt' ) ?>
    </div>
	</div><!-- /.container-small -->
</div><!-- /.section-intro -->