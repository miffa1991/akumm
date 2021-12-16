<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akumm
 */

get_header();
?>

<div id="primary" class="container">
	<?php
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<ul id="breadcrumbs" class="breadcrumb">','</ul>' );

		the_archive_title( '<h1 class="page-title">', '</h1>' );
	}
	?>

	<div class="previews">
		<?php if ( have_posts() ) : ?>
	

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			wp_corenavi();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
	</div>
</div><!-- #primary -->

<?php
get_footer();
