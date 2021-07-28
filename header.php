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

	<header class="header">
		<div class="container">
			<div class="header__inner">
				<div class="header__left">
					<nav class="nav nav--left">
						<ul>
							<li>
								<a href="#">Проекти</a>
							</li>

							<li>
								<a href="#">Услуги</a>
							</li>

							<li>
								<a href="#">Планиране</a>
							</li>
						</ul>
					</nav><!-- /.nav -->
				</div><!-- /.header__left -->

				<div class="header__center">
					<a href="<?php echo home_url('/') ?>" class="logo"></a>

					<!-- <a href="?php echo home_url('/') ?>" class="dot"></a> -->
				</div><!-- /.header__center -->

				<div class="header__right">
					<nav class="nav nav--right">
						<ul>
							<li>
								<a href="#">За Нас</a>
							</li>

							<li>
								<a href="#">Блог</a>
							</li>

							<li>
								<a href="#">Контакти</a>
							</li>
						</ul>
					</nav><!-- /.nav -->
				</div><!-- /.header__right -->

				<div class="header__menu-mobile">
					<div class="header__menu-toggle">
						<div></div>

						<div></div>

						<div></div>
					</div><!-- /.header__menu-toggle -->

					<nav class="nav-mobile">
						<ul>
							<li>
								<a href="#">Проекти</a>
							</li>

							<li>
								<a href="#">Услуги</a>
							</li>

							<li>
								<a href="#">Планиране</a>
							</li>

							<li>
								<a href="#">За Нас</a>
							</li>

							<li>
								<a href="#">Блог</a>
							</li>

							<li>
								<a href="#">Контакти</a>
							</li>
						</ul>
					</nav><!-- /.nav-mobile -->
				</div><!-- /.header__menu-mobile -->
			</div><!-- /.header__inner -->
		</div><!-- /.container -->
	</header><!-- /.header -->

	<main class="main">