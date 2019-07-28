<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

get_header(); ?>

<div id="primary" class="content__area">
	<main id="main" class="site__main">

		<section class="error__404">
			<header class="page__header">
				<h2 class="page__title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dockerpress' ); ?></h2>	
			</header><!-- .page-header -->

			<div class="page__content">
				<p class="error__message"><?php sprintf( esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dockerpress' ), convert_smilies( ':)' ) ); ?></p>
				<p class="error__404"><?php esc_html_e( '404', 'dockerpress' ); ?></h6>	
			</div><!-- .page__content -->
		</section><!-- .error_404 -->

	</main><!-- #main -->
</div>

<?php
get_footer();
