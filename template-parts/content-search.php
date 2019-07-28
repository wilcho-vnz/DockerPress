<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post post--loop' ); ?>>
	<header class="entry__header">
		<?php the_title( sprintf( '<h2 class="entry__title"><a class="" href="%s" rel="bookmark" title="%s">', esc_url( get_permalink() ), get_the_title() ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry__meta">
			<?php sprintf( '%s %s', dockerpress_posted_on(), dockerpress_posted_by() ) ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
				
	</header><!-- .entry-header -->

	<div class="entry__summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry__footer">
		
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
