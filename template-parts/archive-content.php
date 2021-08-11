<div class="section-heading">
	<div class="container">
		<?php idt_the_breadcrumbs(); ?>
		
		<h1><?php echo idt_get_title() ?></h1>

		<?php
		// Check if we are on the blog page
		if ( is_home() ) {
			$blog_page_id = get_option( 'page_for_posts' );
			$blog_content = get_post_field( 'post_content', $blog_page_id );

			if ( !empty( $blog_page_id ) ) {
				// Render the content from the blog page
				echo apply_filters( 'apply_filters', $blog_content );
			}
		}
		?>
	</div><!-- /.container -->
</div><!-- /.section-heading -->

<div class="section-posts">
	<div class="section__categories">
		<?php get_template_part('template-parts/taxonomy-categories', null, array(
			'taxonomy' => 'category'
		) ); ?>
	</div><!-- /.section__categories -->

	<div class="section__posts">
		<?php
		global $wp_query;

		if ( !empty( $wp_query ) && property_exists( $wp_query, 'posts' ) ) {
			get_template_part( 'template-parts/posts-from-listing', null, $wp_query->posts );
		} ?>
	</div><!-- /.section__posts -->
</div><!-- /.section-posts -->