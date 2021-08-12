<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Interior_Design_Theme
 */

get_header();
?>

<div class="section-404">
	<div class="container">
		<div class="section__inner">
			<h1>404</h1>

			<h2><?php _e( 'Страницата не е намерена', 'idt' ) ?></h2>

			<p><?php _e( 'Моля, проверете URL адреса за правилно изписване. Ако имате проблем с намирането на страницата пробвайте да отворите началната страница', 'idt' ) ?>.</p>

			<a href="<?php echo home_url('/') ?>" class="btn"><?php _e( 'Начална страница' ) ?></a>
		</div><!-- /.section__inner -->
	</div><!-- /.container -->
</div><!-- /.section-404 -->

<?php
get_footer();
