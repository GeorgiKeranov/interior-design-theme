<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Interior_Design_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'idt' ); ?></a>

	<header class="header<?php echo is_front_page() ? ' header--transparent' : '' ?>">
		<div class="container">
			<div class="header__inner">
				<div class="header__left">
					<?php if ( has_nav_menu( 'desktop-header-left' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'desktop-header-left',
							'container' => 'nav',
							'container_class' => 'nav nav--left'
						) );
					} ?>
				</div><!-- /.header__left -->

				<div class="header__center">
					<a href="<?php echo home_url('/') ?>" class="logo logo--header"></a>
				</div><!-- /.header__center -->

				<div class="header__right">
					<?php if ( has_nav_menu( 'desktop-header-right' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'desktop-header-right',
							'container' => 'nav',
							'container_class' => 'nav nav--right'
						) );
					} ?>
				</div><!-- /.header__right -->

				<?php if ( has_nav_menu( 'tablet-mobile-header' ) ) : ?>
					<div class="header__menu-mobile">
						<div class="header__menu-toggle">
							<div></div>

							<div></div>

							<div></div>
						</div><!-- /.header__menu-toggle -->
						
						<?php wp_nav_menu( array(
							'theme_location' => 'tablet-mobile-header',
							'container' => 'nav',
							'container_class' => 'nav-mobile'
						) ); ?>
					</div><!-- /.header__menu-mobile -->
				<?php endif; ?>
			</div><!-- /.header__inner -->
		</div><!-- /.container -->
	</header><!-- /.header -->

	<main class="main">