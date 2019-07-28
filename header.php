<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="" class="site">
	<header id="" class="site__header">
		<nav class="navbar navbar--main">
			<div class="nav__brand">
			<?php
			// retrieve logo set in theme customizer
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'thumbnail' );
			?>
				<a class="brand__name brand__name--dockerpress" href="<?php echo get_site_url(); ?>" title="<?php echo get_bloginfo('name'); ?>">
					<?php // Display logo uploaded on wp-admin ?>
					<?php
					/*
					 * <img class="brand__logo" src="<?php echo esc_url( $custom_logo_url ); ?>" alt="Logo">
					 */
					?>
					<?php echo get_bloginfo('name'); ?>
				</a>
			</div>

			<div class="navbar__elements">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => 'ul',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar__nav navbar__nav--left',
				) );
				?>
				<?php
				/**
				 * searchform.php
				 * 
				 */?>
				<?php get_search_form(); ?>
			</div>
		</nav>
	</header><!-- #masthead -->
	<div id="" class="site__content">
