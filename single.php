<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package akumm
 */

get_header();
?>

<div id="primary" class="container">
	<?php
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<ul id="breadcrumbs" class="breadcrumb">','</ul>' );
the_title( '<h1 class="breadcrumb__current">','</h1>' );
	}
	?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-article', get_post_type() );

		endwhile; // End of the loop.
		?>

	
	</div><!-- #primary -->

<?php
get_footer();
