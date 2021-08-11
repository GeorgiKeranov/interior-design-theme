<?php
if ( empty( $args['taxonomy'] ) ) {
	return;
}

$term_args = array(
	'taxonomy' => $args['taxonomy'],
	'hide_empty' => false,
);

// Exclude 'Uncategorized' term if we are getting the default category terms
if ( $args['taxonomy'] === 'category' ) {
	$term_args['exclude'] = array( 1 );
}

$terms = get_terms( $term_args );

if ( empty( $terms ) ) {
	return;
}
?>

<ul class="categories">
	<li>
		<a href="all" class="active"><?php _e( 'Всички Проекти' ) ?></a>
	</li>

	<?php foreach ( $terms as $term ) : ?>
		<li>
			<a href="<?php echo $term->term_id ?>"><?php echo esc_html( $term->name ) ?></a>
		</li>
	<?php endforeach; ?>
</ul><!-- /.categories -->
