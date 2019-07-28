<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>
	<div id="primary" class="content__area">
		<main id="main" class="site__main">

		<?php
		// Show the selected front page content.
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'loop' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.

			the_posts_navigation(
				array(
				'prev_text' => __( 'Prev', 'dockerpress' ),
				'next_text' => __( 'Next', 'dockerpress' ),
			));
			
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>

		</main><!-- #main -->	
	</div><!-- #primary -->
<?php
get_footer();
