<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	</div><!-- #content -->

	<footer id="" class="site__footer">
		<nav class="navbar navbar--footer">
			<a class="nav__link" href="https://wordpress.org/" target="_blank" title="Wordpress.com">Powered by WordPress</a>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'ul',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar__nav navbar__nav--center',
			) );
			?>
			<a class="nav__link" href="https://wsiso.com/" target="_blank" title="Wilhelm Siso">Developed by: Wilhelm</a>
		</nav>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
