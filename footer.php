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
			<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
			<li>WordPress: <a href="">Alex Fedorov</a></li>
		</ul>
	</div>

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>
