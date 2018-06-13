<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #wrapper div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Massively_WP
 */

?>

		</div><!-- #main -->

		<!-- Footer plugin -->

		<!-- Copyright -->
		<div id="copyright">
			<ul>
				<li>&copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo"><?php bloginfo( 'name' ); ?></a></li>
				<li>Design: <a href="<?php echo esc_url( __( 'https://html5up.net', 'massively-wp' ) ); ?>"><?php printf( __( 'HTML5 UP', 'massively-wp' ) ); ?></a></li>
				<li>WordPress: <a href="<?php echo esc_url( __( 'https://bailylex.github.io/portfolio/', 'massively-wp' ) ); ?>"><?php printf( __( 'Alex Fedorov', 'massively-wp' ) ); ?></a></li>
			</ul>
		</div>

	</div><!-- #wrapper -->

	<?php wp_footer(); ?>

</body>
</html>
