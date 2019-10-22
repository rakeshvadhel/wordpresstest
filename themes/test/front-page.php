<?php
/**
 * Template Name: Homepage
 */

get_header();
?>

    <!--<a href="#contact" title="request info" class="sticky-btn">
        <span>Request Info</span>
    </a>-->

   	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			//get_template_part( 'template-parts/content', 'page' );
			get_template_part( 'template-parts/content', 'home' );
			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();