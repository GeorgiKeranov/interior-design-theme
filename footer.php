<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Interior_Design_Theme
 */

?>
	</main><!-- /.main -->

	<footer class="footer">
		<div class="container">
			<div class="footer__main">
				<div class="footer__logo">
					<a href="<?php echo home_url('/') ?>" class="logo logo--white"></a>
				</div><!-- /.footer__logo -->

				<div class="footer__menu">
					<nav class="nav-footer">
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
					</nav>
				</div><!-- /.footer__menu -->

				<div class="footer__contacts">
					<ul>
						<li>
							<a href="tel:359123456789"><?php echo idt_get_svg('icon-phone') ?> +359 12 345 6789</a>
						</li>

						<li>
							<a href="mailto:radoslava_design@gmail.com"><?php echo idt_get_svg('icon-mail') ?> radoslava_design@gmail.com</a>
						</li>
					</ul>
				</div><!-- /.footer__contacts -->

				<div class="footer__socials">
					<ul>
						<li>
							<a href="https://www.facebook.com"><?php echo idt_get_svg('icon-facebook') ?></a>
						</li>

						<li>
							<a href="https://www.instagram.com"><?php echo idt_get_svg('icon-instagram') ?></a>
						</li>

						<li>
							<a href="https://www.youtube.com"><?php echo idt_get_svg('icon-youtube') ?></a>
						</li>
					</ul><!-- /.socials -->
				</div><!-- /.footer__socials -->
			</div><!-- /.footer__main -->

			<div class="footer__bottom">
				<p class="copyright">© Radoslava Design. Всички права запазени.</p>
			</div><!-- /.footer__bottom -->
		</div><!-- /.container -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
