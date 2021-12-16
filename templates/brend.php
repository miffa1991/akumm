<?php
/**
 * Template name: Бренды
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akumm
 */

get_header();
?>
<!--main-->
<div id="main" class="clearfix">
	<div class="container">
		<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<ul id="breadcrumbs" class="breadcrumb">','</ul>' );
			the_title( '<h1 class="breadcrumb__current">','</h1>' );
		}
		wp_nav_menu( array(
			'theme_location' => 'menu-brend',
			'walker'=> new True_Walker_Nav_Menu()
		) );
		?>
		<div class="article">
			<?php the_content(); ?>
		</div>
	</div>
</div>




<?php
get_footer();
