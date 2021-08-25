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
					<?php idt_the_footer_logo(); ?>
				</div><!-- /.footer__logo -->

				<div class="footer__menu">
					<?php if ( has_nav_menu( 'footer' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'container' => 'nav',
							'container_class' => 'nav-footer'
						) );
					} ?>
				</div><!-- /.footer__menu -->

				<?php
				$phone = carbon_get_theme_option( 'idt_phone' );
				$email = carbon_get_theme_option( 'idt_email' );
				$copyright = carbon_get_theme_option( 'idt_copyright' );
				?>

				<div class="footer__contacts">
					<ul>
						<?php if ( !empty( $phone ) ) :
							$phone = esc_html( $phone );
							$ready_to_call_phone_number = idt_filter_phone_number( $phone ); ?>

							<li>
								<a href="tel:<?php echo $ready_to_call_phone_number ?>"><?php echo idt_get_svg('icon-phone') ?> <?php echo $phone ?></a>
							</li>
						<?php endif; ?>

						<?php if ( !empty( $email ) ) :
							$email = antispambot( esc_html( $email ) ); ?>

							<li>
								<a href="mailto:<?php echo $email ?>"><?php echo idt_get_svg('icon-mail') ?> <?php echo $email ?></a>
							</li>
						<?php endif; ?>
					</ul>
				</div><!-- /.footer__contacts -->

				<div class="footer__socials">
					<?php get_template_part( 'template-parts/socials' ) ?>
				</div><!-- /.footer__socials -->
			</div><!-- /.footer__main -->

			<?php if ( !empty( $copyright ) ) : ?>
				<div class="footer__bottom">
					<p class="copyright"><?php echo esc_html( $copyright ) ?></p>
				</div><!-- /.footer__bottom -->
			<?php endif; ?>
		</div><!-- /.container -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
