<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			test_posted_on();
			test_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-header -->

	<?php test_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<div class="entry-footer">
		<?php test_entry_footer(); ?>
	</div><!-- .entry-footer -->
</div><!-- #post-<?php the_ID(); ?> -->
